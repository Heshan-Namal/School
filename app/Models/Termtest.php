<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Termtest extends Model
{
    use HasFactory;
    protected $table = 'exam_result';
    protected $guarded=[];
}
