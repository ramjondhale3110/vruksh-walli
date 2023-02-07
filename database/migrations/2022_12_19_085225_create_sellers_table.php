<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->increments('seller_id');
            $table->string('seller_first_name');
            $table->string('seller_last_name');
            $table->string('seller_email');
            $table->string('seller_contact_no');
            $table->string('seller_password');
            $table->string('seller_repeat_password');
            $table->string('seller_upload_image');
            $table->string('seller_shop_name');
            $table->string('seller_address');
            $table->string('seller_logo_img');
            $table->string('seller_banner_img');
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
        Schema::dropIfExists('sellers');
    }
}
