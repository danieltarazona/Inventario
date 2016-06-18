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
            $table->date('buy');
            $table->string('price');
            $table->integer('quantity');
            $table->integer('remain_life');
            $table->string('warranty');
            $table->date('warranty_expiration');
            $table->date('next_maintenance');
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
