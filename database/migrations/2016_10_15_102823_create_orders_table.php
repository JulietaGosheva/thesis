<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration {

	public function up() {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
			$table->integer("user_id");
			$table->date("order_date");
			$table->string("dish_ids");
            $table->string('address');
            $table->string('processed')->default("false");
        });
    }

    public function down() {
        Schema::drop('orders');
    }
}
