<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDaxodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daxod', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('summa');
            $table->integer('daxcategor_id')->unsigned();
            $table->char('mesto', 20); 
            $table->date('data');          
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('daxcategor_id')->references('id')->on('daxcategor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daxod');
    }
}
