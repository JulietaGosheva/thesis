<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder {

	public function run() {
        DB::table('roles')->insert([
            'name' => 'Administrator',
        ]);
        
        DB::table('roles')->insert([
        	'name' => 'Customer',
        ]);
    }
}