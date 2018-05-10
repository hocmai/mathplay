<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldToLessionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('lessions', function($table)
		{
			$table->integer('subject_id')->after('chapter_id')->nullable();
			$table->integer('grade_id')->after('chapter_id')->nullable();
			
		});
		Schema::table('chapters', function($table)
		{
			$table->integer('grade_id')->after('subject_id')->nullable();
			
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('lessions', function($table)
		{
		    $table->dropColumn(['subject_id','grade_id']);
		});
		
		Schema::table('chapters', function($table)
		{
		    $table->dropColumn(['grade_id']);
		});
	}

}
