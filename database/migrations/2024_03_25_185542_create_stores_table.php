<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category_id');
            $table->string('img');
            $table->text('description');
            $table->time('opening_time');
            $table->time('closing_time');
            $table->integer('lowest_price')->unsigned();
            $table->integer('highest_price')->unsigned();
            $table->string('post_code');
            $table->string('address');
            $table->string('phone_number');
            $table->string('holiday');
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
        Schema::dropIfExists('stores');
    }
};
