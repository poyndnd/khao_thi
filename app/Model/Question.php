<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

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
