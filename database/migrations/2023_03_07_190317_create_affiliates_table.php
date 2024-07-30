<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffiliatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affiliates', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->unsignedBigInteger('affiliate_look_up_id');
            $table->foreign('affiliate_look_up_id')->references('id')->on('affiliate_look_ups')->onDelete('cascade');
            $table->unsignedBigInteger('pet_id');
            $table->foreign('pet_id')->references('id')->on('pets')->onDelete('cascade');
            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('cascade');
            $table->unsignedBigInteger('sold_by_id');
            $table->foreign('sold_by_id')->references('id')->on('sold_bies')->onDelete('cascade');
            $table->unsignedBigInteger('delivery_id');
            $table->foreign('delivery_id')->references('id')->on('deliveries')->onDelete('cascade');
            $table->string('image');
            $table->string('name');
            $table->longText('description');
            $table->string('material');
            $table->string('spec_1');
            $table->string('spec_2');
            $table->string('spec_3');
            $table->string('spec_4');
            $table->string('spec_1_name');
            $table->string('spec_2_name');
            $table->string('spec_3_name');
            $table->string('spec_4_name');
            $table->string('price');
            $table->string('discountPrice');
            $table->string('star');
            $table->string('stock');
            $table->string('discount');
            $table->string('rank');
            $table->string('link');
            $table->string('keywords');
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
        Schema::dropIfExists('affiliates');
    }
}