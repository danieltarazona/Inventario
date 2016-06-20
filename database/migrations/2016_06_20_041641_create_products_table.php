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
            $table->integer('category_id')->unsigned();
            $table->integer('headquarter_id')->unsigned();
            $table->integer('manufacturer_id')->unsigned();
            $table->integer('owner_id')->unsigned();
            $table->integer('state_id')->unsigned();
            $table->integer('maintenance_id')->unsigned();
            $table->date('next_maintenance');
            $table->integer('stock');
            $table->string('serial');
            $table->string('year');
            $table->string('name');
            $table->date('buy');
            $table->string('price');
            $table->string('warranty');
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
