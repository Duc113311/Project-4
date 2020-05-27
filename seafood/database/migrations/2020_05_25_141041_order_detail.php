<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrderDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_detail', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_order')->unsigned();
            $table->bigInteger('id_category')->unsigned();
            $table->tinyInteger('qty')->default(0);
            $table->integer('price')->default(0);
            $table->timestamps();
            $table->foreign('id_order')->references('id')->on('order');
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
        Schema::dropIfExists('order_detail');
    }
}
