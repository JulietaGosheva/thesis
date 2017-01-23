<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder {

	public function run() {
        DB::table('users')->insert([
            'email' => 'administrator@gmail.com',
            'password' => bcrypt('passwordsalt'),
        	'firstname' => 'Super',
        	'lastname' => 'Administrator',
        	'phone' => '0888888888'
        ]);
    }
}