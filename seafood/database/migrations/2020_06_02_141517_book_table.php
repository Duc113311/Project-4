<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_table', function (Blueprint $table) {
            $table->id();
            $table->string('name_customer')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('Number_customer')->nullable();
            $table->bigInteger('id_table')->unsigned();
            $table->date('order_date');
            $table->time('Time_eat');
            $table->integer('min_price');
            $table->string('Note')->nullable();
            $table->tinyInteger('status')->default(0)->index();
            $table->timestamps();
            $table->foreign('id_table')->references('id')->on('tbl_table');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
}
