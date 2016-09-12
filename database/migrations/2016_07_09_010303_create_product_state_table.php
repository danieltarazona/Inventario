<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductStateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_state', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('state_id')->unsigned()->index()->nullable();
            $table->integer('product_id')->unsigned()->index()->nullable();
            $table->integer('quantity')->unsigned()->index()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product_state');
    }
}
