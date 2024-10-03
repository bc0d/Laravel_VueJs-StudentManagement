<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'class_id',
        'division_id'
    ];

    protected $with = [
        'class',
        'division',
    ];

    public function class() {

        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function division() {

        return $this->belongsTo(Division::class);
    }
}
