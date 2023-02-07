<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('order_id');
            $table->unsignedInteger('product_id')->unsigned();
            $table->foreign('product_id')->references('product_id')->on('products');
            $table->unsignedInteger('created_by')->unsigned();
            $table->foreign('created_by')->references('id')->on('users');
            $table->unsignedInteger('updated_by')->unsigned();
            $table->foreign('updated_by')->references('id')->on('users');
            $table->string('order_status');
            $table->string('amount');
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
        Schema::dropIfExists('orders');
    }
}
