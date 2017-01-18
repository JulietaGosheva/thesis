<?php

use Illuminate\Database\Seeder;

class UsersToRolesSeeder extends Seeder {

	public function run() {
        DB::table('users_to_roles')->insert([
            'user_id' => 1,
        	'role_id' => 1
        ]);
    }
}