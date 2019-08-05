<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Test;
use App\Model\Test_has_Question;

class Question extends Model
{
    protected $fillable =[
    	'type',
    	'point',
    	'content',
    	'answer',
    	'user_id',
    ];
}
