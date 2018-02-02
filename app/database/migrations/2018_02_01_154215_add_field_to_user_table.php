<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldToUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function($table)
		{
			$table->string('address', 255)->after('email')->nullable();
			$table->integer('phone')->after('email')->nullable();
			$table->integer('grade_id')->after('email')->nullable();
			$table->string('full_name', 125)->after('email')->nullable();
			$table->string('school', 225)->after('email')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function($table)
		{
		    $table->dropColumn(['address', 'phone', 'grade_id', 'full_name', 'school']);
		});
	}

}
