<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBalansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('nalichnie');
            $table->integer('plastik_1');
            $table->integer('plastik_2');        
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
        Schema::dropIfExists('balans');
    }
}
