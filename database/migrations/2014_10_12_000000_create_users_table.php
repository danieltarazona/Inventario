<?php

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

            $table->integer('city_id')->unsigned()->index();
            $table->integer('program_id')->unsigned()->index();
            $table->integer('headquarter_id')->unsigned()->index();

            $table->integer('dni')->unsigned()->unique();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('email_alt')->unique();
            $table->string('status');
            $table->string('state');
            $table->string('reserve');
            $table->string('loan');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('first_lastname');
            $table->string('last_lastname');
            $table->string('adress');
            $table->string('telephone');
            $table->string('cellphone');
            $table->string('password');
            $table->string('url');
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
        Schema::drop('users');
    }
}
