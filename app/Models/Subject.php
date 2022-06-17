<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $table = "subject";


    public function getclasses()
    {
        // need to declare relation and object tables
        return $this->belongsToMany(\App\Models\Subject::class,\App\Models\Subject_class::class);

    }
}
