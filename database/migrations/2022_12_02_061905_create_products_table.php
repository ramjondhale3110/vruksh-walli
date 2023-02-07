<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->increments('product_id');
            $table->string('product_name');
            $table->longText('product_description');
            $table->string('product_code');
            $table->string('product_colour');
            $table->string('product_attributs');
            $table->string('product_unit_price');
            $table->string('product_purchase_price');
            $table->string('product_tax');
            $table->string('product_discount');
            $table->string('product_qty');
            $table->string('product_order_qty');
            $table->string('product_shipping_cost');
            $table->unsignedInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('category_id')->on('categories');
            $table->unsignedInteger('sub_category_id')->unsigned();
            $table->foreign('sub_category_id')->references('sub_category_id')->on('sub_categories');
            $table->unsignedInteger('brand_id')->unsigned();
            $table->foreign('brand_id')->references('brand_id')->on('brands');
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
        Schema::dropIfExists('products');
    }
}
