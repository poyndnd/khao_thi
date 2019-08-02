<?php

use Illuminate\Database\Seeder;

class UsersSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
    		['name' => 'Duong', 
    		'user_name' => 'poyndnd', 
    		'email' => 'duong@duong.com', 
    		'password' => 'anhduong', 
    		'role_id' => '1'],
    	]);
    }
}
