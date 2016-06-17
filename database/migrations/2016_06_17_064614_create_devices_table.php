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
            $table->string('serial');
            $table->string('model');
            $table->string('name');
            $table->date('date_buy');
            $table->string('price');
            $table->integer('state');
            $table->string('quantity');
            $table->integer('remain_life');
            $table->date('last_maintenance');
            $table->date('next_maintenance');
            $table->string('warranty');
            $table->string('warranty_expiration');
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
