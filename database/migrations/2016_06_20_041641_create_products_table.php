<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('serial');
            $table->string('warranty');
            $table->integer('stock')->unsigned();
            $table->string('year');
            $table->date('date');
            $table->decimal('price', 10, 2);
            $table->string('photo');
            $table->integer('views');
            $table->integer('category_id')->unsigned()->nullable();
            $table->integer('region_id')->unsigned()->nullable();
            $table->integer('city_id')->unsigned()->nullable();
            $table->integer('store_id')->unsigned()->nullable();
            $table->integer('provider_id')->unsigned()->nullable();
            $table->integer('state_id')->unsigned()->nullable();
            $table->integer('maintenance_id')->unsigned()->nullable();
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
        Schema::drop('products');
    }
}
