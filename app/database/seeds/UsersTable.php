<?php
use App\Users;
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

        for ($i = 0; $i < 5; $i++) {
            Users::create([
                'name' => $faker->userName,
                'username'=> $faker->userName,
                'email' => $faker->unique()->email,
                'password' => Hash::make('123456'),
                'created' => time()+$i+5,
                'changed' => time()+$i+5,
            ]);
        }
    }
}
