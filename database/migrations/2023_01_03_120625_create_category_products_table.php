<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_products', function (Blueprint $table) {
            $table->increments('category_product_id');
            
            $table->unsignedInteger('product_id')->unsigned();
            $table->foreign('product_id')->references('product_id')->on('products');

            $table->unsignedInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('category_id')->on('categories');

            $table->unsignedInteger('sub_category_id')->unsigned();
            $table->foreign('sub_category_id')->references('sub_category_id')->on('sub_categories');
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
        Schema::dropIfExists('category_products');
    }
}
