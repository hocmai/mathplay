<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDifficulty extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('difficulty', function (Blueprint $table) {
            $table->increments('diff_id');
            $table->string('title', 225);
            $table->longText('description')->nullable();
            $table->integer('author')->unsigned();
            $table->integer('created')->nullable();
            $table->integer('changed')->nullable();
            
            $table->foreign('author')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('difficulty');
    }
}
