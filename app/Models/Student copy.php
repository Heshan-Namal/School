<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = "Student";
    public function getass()
    {
        // need to declare relation and object tables
        return $this->hasMany(\App\Models\Student::class,\App\Models\Student_assesment::class);

    }
}