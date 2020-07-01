<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NewsFood extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_food', function (Blueprint $table) {
            $table->id();
            $table->string('title_news');
            $table->string('image_news');
            $table->string('content_news');
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
            $table->foreign('id_customer')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_food');
    }
}
