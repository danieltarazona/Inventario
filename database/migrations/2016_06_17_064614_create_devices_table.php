<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned()->index();
            $table->integer('manufacturer_id')->unsigned()->index();
            $table->integer('state_id')->unsigned()->index();
            $table->date('next_maintenance');
            $table->string('serial');
            $table->string('model');
            $table->string('name');
            $table->date('date_buy');
            $table->string('price');
            $table->integer('quantity');
            $table->integer('remain_life');
            $table->string('warranty');
            $table->date('warranty_expiration');
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
        Schema::drop('devices');
    }
}
