<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FComment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('f_comment', function (Blueprint $table) {
            $table->id();
            $table->string('com_email')->unique();
            $table->string('com_name');
            $table->string('com_content');
            $table->bigInteger('com_category')->unsigned();
            $table->timestamps();
            $table->foreign('com_category')->references('id')->on('tbl_category');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('f_comment');
    }
}
