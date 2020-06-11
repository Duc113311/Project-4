<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetailBillInport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_bill_inport', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_bill_inport')->unsigned();
            $table->bigInteger('id_resources')->unsigned();
            $table->integer('amount');
            $table->integer('weight');
            $table->integer('price');
            $table->timestamps();
            $table->foreign('id_bill_inport')->references('id')->on('bill_inport');
            $table->foreign('id_resources')->references('id')->on('resources');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_bill_inport');
    }
}
