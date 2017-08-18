<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question', function (Blueprint $table) {
            $table->increments('qid');
            $table->string('title', 255);
            $table->string('type', 255);
            $table->longText('content')->nullable();
            $table->binary('config')->nullable();
            $table->integer('author')->unsigned();
            $table->integer('created')->nullable();
            $table->integer('changed')->nullable();
            $table->integer('weight')->nullable();
            $table->smallInteger('status')->default(1);
            
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
        Schema::dropIfExists('question');
    }
}
