<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject', function (Blueprint $table) {
            $table->increments('subject_id');
            $table->string('title', 225);
            $table->longText('description')->nullable();
            $table->integer('grade_id')->unsigned();
            $table->integer('author')->unsigned();
            $table->string('slug', 255)->unique();
            $table->integer('created')->nullable();
            $table->integer('changed')->nullable();
            $table->integer('weight')->nullable();
            $table->smallInteger('status')->default(1);
            
            $table->foreign('grade_id')->references('grade_id')->on('grade');
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
        Schema::dropIfExists('subject');
    }
}
