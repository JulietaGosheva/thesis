<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDishTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dishes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('weight');
            $table->string('description');
            $table->string('image_name');
            $table->float('price');
            $table->enum('type', ['Soup', 'Main', 'Dessert', 'Salat']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('dish');
    }
}
