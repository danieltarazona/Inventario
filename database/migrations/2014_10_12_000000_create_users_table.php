<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('state_id')->unsigned()->nullable();
          $table->integer('store_id')->unsigned()->nullable();
          $table->integer('role_id')->unsigned()->nullable();
          $table->integer('cart_id')->unsigned()->nullable();
          $table->integer('dni')->unsigned()->unique();
          $table->string('username')->unique();
          $table->string('email')->unique();
          $table->string('first_name');
          $table->string('last_name');
          $table->string('first_lastname');
          $table->string('last_lastname');
          $table->string('address');
          $table->string('telephone');
          $table->string('cellphone');
          $table->string('password');
          $table->string('photo');
          $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
