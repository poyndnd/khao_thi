<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User_has_Test extends Model
{
    protected $table = 'user_has_tests';
    protected $fillable = [
    	'test_id',
    	'user_id',
    	'point',
    ];
}
