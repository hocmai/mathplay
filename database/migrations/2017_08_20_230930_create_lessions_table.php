<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lessions', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title', 225);
            $table->longText('description')->nullable();
            $table->integer('chapter_id')->unsigned();
            $table->integer('author_id')->unsigned();
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
		Schema::drop('lessions');
	}

}
