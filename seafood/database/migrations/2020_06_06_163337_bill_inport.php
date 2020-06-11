<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BillInport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_inport', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_supplier')->unsigned();
            $table->bigInteger('id_user')->unsigned();
            $table->string('name_supplier')->nullable();
            $table->string('name_bill')->nullable();
            $table->string('image');
            $table->integer('totail');
            $table->date('day_inport');
            $table->timestamps();
            $table->foreign('id_supplier')->references('id')->on('supplier');
            $table->foreign('id_user')->references('id')->on('users');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bill_inport');
    }
}
