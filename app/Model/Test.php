<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Question;
use App\Model\Test_has_Question;

class Test extends Model
{
    protected $fillable =[
    	'name',
    	'time',
    	'teacher_id',
    	'total_point',
    ];
}
