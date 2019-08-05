<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Test_has_Question extends Model
{
	protected $table = 'test_has_questions';
    protected $fillable = [
    	'test_id',
    	'question_id',
    ];
}
