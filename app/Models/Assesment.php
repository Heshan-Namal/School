<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assesment extends Model
{
    use HasFactory;
    protected $table = "assessment";
    protected $guarded=[];


    public function getStudent()
    {
    	return $this->belongsToMany(\App\Models\Student::class);
    }
    public function getassstd()
    {
        // need to declare relation and object tables
        return $this->belongsToMany(\App\Models\Assesment::class,\App\Models\Student_assesment::class);

    }
}
