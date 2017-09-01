<?php
class UsersTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $faker = Faker\Factory::create();
        User::create([
            'username'=> $faker->unique()->userName,
            'email' => $faker->unique()->email,
            'password' => Hash::make('123456'),
        ]);
    }
}
