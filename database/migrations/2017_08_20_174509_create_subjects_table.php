<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subjects', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('grade_id')->nullable();
            $table->integer('author_id')->nullable();
            $table->integer('status')->nullable();
            $table->integer('weight')->nullable();
            $table->string('title', 256)->nullable();
            $table->string('slug', 256)->nullable();
            $table->text('description')->nullable();
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
		Schema::drop('subjects');
	}

}
