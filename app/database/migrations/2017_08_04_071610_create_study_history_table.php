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
            $table->integer('time_use')->nullable();
            $table->smallInteger('status')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('study_history');
    }
}
