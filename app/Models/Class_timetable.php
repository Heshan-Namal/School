<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Class_timetable extends Model
{
    use HasFactory;
    protected $table = "class_timetable";
    protected $guarded=[];

    public $timestamps=false;

}