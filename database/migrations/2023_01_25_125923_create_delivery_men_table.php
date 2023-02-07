<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryMenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_men', function (Blueprint $table) {
            $table->increments('delivery_men_id');
            $table->string('deliveryman_name');
            $table->string('deliveryman_last_name');
            $table->string('deliveryman_email');
            $table->string('deliveryman_phone');
            $table->string('deliveryman_identity_type');
            $table->string('deliveryman_identity_no');
            $table->string('deliveryman_identity_img');
            $table->string('deliveryman_img');
            $table->string('delivery_password');
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
        Schema::dropIfExists('delivery_men');
    }
}
