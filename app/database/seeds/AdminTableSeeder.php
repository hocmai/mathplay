<?php

class AdminTableSeeder extends Seeder {

	public function run()
	{
		Admin::create([
			'role_id' => 1,
			'email'=>'tantanb2@gmail.com',
			'password'=>Hash::make('123456'),
			'username'=> 'tantan',
		]);
	}

}