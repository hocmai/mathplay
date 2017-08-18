<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lession', function (Blueprint $table) {
            $table->increments('lession_id');
            $table->string('title', 225);
            $table->longText('description')->nullable();
            $table->integer('chapter_id')->unsigned();
            $table->integer('author')->unsigned();
            $table->string('slug', 255)->unique();
            $table->integer('created')->nullable();
            $table->integer('changed')->nullable();
            $table->integer('weight')->nullable();
            $table->smallInteger('status')->default(1);
            
            $table->foreign('chapter_id')->references('chapter_id')->on('chapter');
            $table->foreign('author')->references('id')->on('users');
            $table->index(['chapter_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lession');
    }
}
