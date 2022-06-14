<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_Attentiveness_check extends Model
{
    use HasFactory;
    protected $table='student_attentiveness_check';
    protected $fillable = ['admission_no','A_check_id','total_points'];

}
