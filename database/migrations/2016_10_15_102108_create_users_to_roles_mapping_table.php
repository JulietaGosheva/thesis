<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersToRolesMappingTable extends Migration {
	
    public function up() {
        Schema::create('users_to_roles', function (Blueprint $table) {
            $table->increments('id');
			$table->integer("user_id");
			$table->integer("role_id");
        });
    }

    public function down() {
        Schema::drop('users_to_roles');
    }
}
