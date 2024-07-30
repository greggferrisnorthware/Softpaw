<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHabitatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habitats', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->unsignedBigInteger('pet_id');
            $table->foreign('pet_id')->references('id')->on('pets')->onDelete('cascade');
            $table->string('meta_robot');
            $table->longText('meta_description');
            $table->string('meta_keywords');
            $table->string('meta_author');
            $table->string('image');
            $table->string('name');
            $table->string('description');
            $table->string('specs');
            $table->string('price');
            $table->string('discountPrice');
            $table->string('status');
            $table->string('star');
            $table->string('stock');
            $table->string('discount');
            $table->string('rank');
            $table->string('link');
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
        Schema::dropIfExists('habitats');
    }
}