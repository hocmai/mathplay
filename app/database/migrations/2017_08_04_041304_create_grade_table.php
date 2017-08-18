<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grade', function (Blueprint $table) {
            $table->increments('grade_id');
            $table->integer('author')->unsigned();
            $table->string('title', 255);
            $table->longText('description')->nullable();
            $table->string('slug', 255)->unique();
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
        Schema::dropIfExists('grade');
    }
}
