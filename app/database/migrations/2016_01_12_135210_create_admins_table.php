<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('admins', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('role_id')->nullable();
            $table->string('email', 256)->nullable();
            $table->string('password', 256)->nullable();
            $table->string('username', 256)->nullable();
            $table->string('remember_token', 256)->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->smallInteger('status')->default(1);
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('admins');
	}

}
