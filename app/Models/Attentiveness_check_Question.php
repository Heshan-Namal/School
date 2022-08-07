<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attentiveness_check_Question extends Model
{

    use HasFactory;
    protected $table='attentiveness_check_question';
    protected $guarded=[];

    public function getquiz(){
        return $this->belongsTo(\App\Models\Attentiveness_check::class,'a_check_id');
	}

}
