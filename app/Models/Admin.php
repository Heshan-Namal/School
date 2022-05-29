<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = "Admin";
    protected $fillable = ['id','name','email','password'];
    
    // get admin created teachers
    public function getteachers(){
        return $this->hasMany(\App\Models\Teacher::class);
    }

    //get admin created classrooms
    public function getclassrooms(){
        return $this->hasMany(\App\Models\Classroom::class);
    }
    //get admin created grades
    public function getgrades(){
        return $this->hasMany(\App\Models\Grade::class);
    }
    //get admin created subjects
    public function getsubjects(){
        return $this->hasMany(\App\Models\Subject::class);
    }

    //get admin created students
    public function getstudents(){
        return $this->hasMany(\App\Models\Student::class);
    }
    
}
