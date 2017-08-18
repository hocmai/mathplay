<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudyHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('study_history', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('author')->unsigned()->index();
            $table->integer('grade_id')->unsigned()->index();
            $table->integer('subject_id')->unsigned()->index();
            $table->integer('chapter_id')->unsigned()->index();
            $table->integer('lession_id')->unsigned()->index();
            $table->integer('score')->nullable();
            $table->integer('current_question')->nullable();
            $table->integer('completed')->nullable();
            $table->integer('difficult')->nullable()->index();
            $table->integer('created')->nullable();
            $table->integer('time_use')->nullable();
            $table->smallInteger('status')->default(0);

            $table->foreign('author')->references('id')->on('users');
            $table->foreign('grade_id')->references('grade_id')->on('grade');
            $table->foreign('subject_id')->references('subject_id')->on('subject');
            $table->foreign('chapter_id')->references('chapter_id')->on('chapter');
            $table->foreign('lession_id')->references('lession_id')->on('lession');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('study_history');
    }
}
