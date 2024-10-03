<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Database\Eloquent\Factories\Sequence;

use App\Models\Classes;
use App\Models\Division;
use App\Models\Student;

class ClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Classes::factory()
            ->count(10)
            ->sequence(fn($sequence) => ['name' => 'Class' . $sequence->index + 1])
            ->has(
                Division::factory()
                    ->count(2)
                    ->state(
                        new Sequence(
                            ['name' => 'Division A'],
                            ['name' => 'Division B'],
                        )
                    )
                    ->has(
                        Student::factory()
                            ->count(5)
                            ->state(
                                function(array $attributes, Division $division) {
                                    return ['class_id' => $division->class_id];
                                }
                            )
                    )
            )
            ->create();
    }
}
