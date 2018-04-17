<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCourceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_course', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('hocmai_course_id', 512);
            $table->string('grade_slug', 512);
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
		Schema::dropIfExists('user_course');
	}

}
