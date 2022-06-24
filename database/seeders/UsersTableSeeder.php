<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash; 

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$hashed = Hash::make('password');
        DB::table('users')->insert(array('name' => 'admin', 'email' => 'admin@gmail.com', 'password' => $hashed));	
    }
}
