<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('users', function ($table) {
        $table->foreign('city_id')->references('id')->on('cities')
          ->onDelete('cascade')->onUpdate('cascade');
        $table->foreign('program_id')->references('id')->on('programs')
          ->onDelete('cascade')->onUpdate('cascade');
        $table->foreign('headquarter_id')->references('id')->on('headquarters')
          ->onDelete('cascade')->onUpdate('cascade');
        $table->foreign('state_id')->references('id')->on('states')
          ->onDelete('cascade')->onUpdate('cascade');
      });

      Schema::table('headquarters', function ($table) {
        $table->foreign('city_id')->references('id')->on('cities')
          ->onDelete('cascade')->onUpdate('cascade');
      });

      Schema::table('maintenances', function ($table) {
        $table->foreign('owner_id')->references('id')->on('owners')
          ->onDelete('cascade')->onUpdate('cascade');
      });

      Schema::table('comments', function ($table) {
        $table->foreign('user_id')->references('id')->on('users')
          ->onDelete('cascade')->onUpdate('cascade');
      });

      Schema::table('issues', function ($table) {
        $table->foreign('user_id')->references('id')->on('users')
          ->onDelete('cascade')->onUpdate('cascade');
      });

      Schema::table('admins', function ($table) {
        $table->foreign('user_id')->references('id')->on('users')
          ->onDelete('cascade')->onUpdate('cascade');
      });

      Schema::table('owners', function ($table) {
        $table->foreign('user_id')->references('id')->on('users')
          ->onDelete('cascade')->onUpdate('cascade');
      });

      Schema::table('sales', function ($table) {
        $table->foreign('user_id')->references('id')->on('users')
          ->onDelete('cascade')->onUpdate('cascade');
        $table->foreign('owner_id')->references('id')->on('owners')
          ->onDelete('cascade')->onUpdate('cascade');
      });

      Schema::table('orders', function ($table) {
        $table->foreign('user_id')->references('id')->on('users')
          ->onDelete('cascade')->onUpdate('cascade');
        $table->foreign('owner_id')->references('id')->on('owners')
          ->onDelete('cascade')->onUpdate('cascade');
      });

      Schema::table('products', function ($table) {
        $table->foreign('category_id')->references('id')->on('categories')
          ->onDelete('cascade')->onUpdate('cascade');
        $table->foreign('headquarter_id')->references('id')->on('headquarters')
          ->onDelete('cascade')->onUpdate('cascade');
        $table->foreign('manufacturer_id')->references('id')->on('manufacturers')
          ->onDelete('cascade')->onUpdate('cascade');
        $table->foreign('owner_id')->references('id')->on('owners')
          ->onDelete('cascade')->onUpdate('cascade');
        $table->foreign('state_id')->references('id')->on('states')
          ->onDelete('cascade')->onUpdate('cascade');
        $table->foreign('maintenance_id')->references('id')->on('maintenances')
          ->onDelete('cascade')->onUpdate('cascade');
      });

      Schema::table('sale_product', function ($table) {
        $table->foreign('product_id')->references('id')->on('products')
          ->onDelete('cascade')->onUpdate('cascade');
        $table->foreign('sale_id')->references('id')->on('sales')
          ->onDelete('cascade')->onUpdate('cascade');
      });

      Schema::table('order_product', function ($table) {
        $table->foreign('product_id')->references('id')->on('products')
          ->onDelete('cascade')->onUpdate('cascade');
        $table->foreign('order_id')->references('id')->on('orders')
          ->onDelete('cascade')->onUpdate('cascade');
      });

      Schema::table('headquarter_program', function ($table) {
        $table->foreign('headquarter_id')->references('id')->on('headquarters')
          ->onDelete('cascade')->onUpdate('cascade');
        $table->foreign('program_id')->references('id')->on('programs')
          ->onDelete('cascade')->onUpdate('cascade');
      });

      Schema::table('maintenance_product', function ($table) {
        $table->foreign('maintenance_id')->references('id')->on('maintenances')
          ->onDelete('cascade')->onUpdate('cascade');
        $table->foreign('product_id')->references('id')->on('products')
          ->onDelete('cascade')->onUpdate('cascade');
      });

      Schema::table('product_sale', function ($table) {
        $table->foreign('product_id')->references('id')->on('products')
          ->onDelete('cascade')->onUpdate('cascade');
        $table->foreign('sale_id')->references('id')->on('sales')
          ->onDelete('cascade')->onUpdate('cascade');
      });

      Schema::table('product_order', function ($table) {
        $table->foreign('product_id')->references('id')->on('products')
          ->onDelete('cascade')->onUpdate('cascade');
        $table->foreign('order_id')->references('id')->on('orders')
          ->onDelete('cascade')->onUpdate('cascade');
      });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('foreign');
    }
}
