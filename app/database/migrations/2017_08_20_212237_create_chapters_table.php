<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChaptersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('chapters', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('author_id')->nullable();
            $table->integer('subject_id')->nullable();
            $table->string('title', 255);
            $table->longText('description')->nullable();
            $table->string('slug', 255)->unique();
            $table->integer('weight')->nullable();
            $table->smallInteger('status')->default(1);
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
		Schema::drop('chapters');
	}

}
