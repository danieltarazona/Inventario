<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalendarEventTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('calendar_event', function(Blueprint $table) {
      $table->increments('id');
      $table->string('title');
      $table->dateTime('start');
      $table->dateTime('end');
      $table->boolean('is_all_day');
      $table->string('background_color')->nullable();
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
    Schema::drop('calendar_event');
  }
}
