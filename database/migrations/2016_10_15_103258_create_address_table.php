<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressTable extends Migration {
	
    public function up() {
        Schema::create('address', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('address');
        });
    }

    public function down() {
        Schema::drop('address');
    }
}
