<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRasxodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rasxod', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('summa');
            $table->integer('rascategor_id');
            $table->char('mesto', 20); 
            $table->date('data'); 
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
        Schema::dropIfExists('rasxod');
    }
}
