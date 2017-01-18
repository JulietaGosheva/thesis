<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	public function run() {
        Model::unguard();
        
        $this->call(RolesSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(UsersToRolesSeeder::class);
        
        Model::reguard();
    }
}
