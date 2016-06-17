<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDashboardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dashboards', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('reserve_id')->unsigned()->index();
            $table->integer('loan_id')->unsigned()->index();
            $table->integer('maintenance_id')->unsigned()->index();
            $table->integer('device_id')->unsigned()->index();
            $table->integer('log_id')->unsigned()->index();
            $table->integer('stat_id')->unsigned()->index();
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
        Schema::drop('dashboards');
    }
}
