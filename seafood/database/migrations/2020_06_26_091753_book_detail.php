<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BookDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_detail', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_book_table')->unsigned();
            $table->bigInteger('id_category')->unsigned();
            $table->integer('qty');
            $table->integer('price_tb');
            $table->timestamps();
            $table->foreign('id_book_table')->references('id')->on('book_table');
            $table->foreign('id_category')->references('id')->on('tbl_category');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_detail');
    }
}
