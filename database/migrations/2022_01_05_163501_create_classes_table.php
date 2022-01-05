<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     * Create table classes. (id, title, price, chef_id, rating, number_of_reviews)
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 64);
            $table->decimal('price', 10, 2);
            $table->tinyInteger('rating');
            $table->integer('number_of_reviews')->default(0);
        });

        Schema::table('classes', function(Blueprint $table) {
            $table->foreign('chef_id')->references('id')->on('chefs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classes');
    }
}
