<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStarFieldToStudyHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('study_history', function($table)
		{
			$table->tinyInteger('star')->after('time_use')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('study_history', function($table)
		{
		    $table->dropColumn('star');
		});
	}

}
