<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;
    protected $table = "class";
    protected $guarded=[];

    public $timestamps=false;


    public function getsubjects()
    {
        // need to declare relation and object tables
        return $this->hasMany(\App\Models\Classroom::class,\App\Models\Subject_class::class);

    }
}
