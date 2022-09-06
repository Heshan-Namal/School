<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class _class_timetable_copy extends Model
{
    use HasFactory;
    protected $table = "_class_timetable_copy";
    protected $guarded=[];
    protected $fillable = ['day','period1','period2','period3','period4','period5','period6','period7','period8','class_id'];

    public $timestamps=false;
}