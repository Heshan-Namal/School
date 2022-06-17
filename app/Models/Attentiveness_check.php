<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attentiveness_check extends Model
{
    use HasFactory;
    protected $table = "attentiveness_check";
    protected $guarded=[];

    public function getquestions(){
        return $this->hasMany(\App\Models\Questions::class);
    }
}
