<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment_quiz_question extends Model
{
    use HasFactory;
    protected $table = "assessment_quiz_question";
    protected $guarded=[];
    public function getquiz(){
        return $this->belongsTo(\App\Models\Assessment::class,'assessment_id');
	}
}
