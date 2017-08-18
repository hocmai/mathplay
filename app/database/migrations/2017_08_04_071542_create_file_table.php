<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file', function (Blueprint $table) {
            $table->increments('fid');
            $table->integer('author')->unsigned();
            $table->string('filemime', 50);
            $table->string('filename', 255);
            $table->integer('filesize');
            $table->string('uri', 255)->unique();
            $table->integer('created')->nullable();
            $table->integer('changed')->nullable();
            
            $table->foreign('author')->references('id')->on('users');
            $table->index(['author']);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file');
    }
}
