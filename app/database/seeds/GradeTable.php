<?php
use Illuminate\Database\Seeder;

class GradeTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 5;
        $users = User::select(['id'])->get();
        $user = [];
        foreach ($users as $key => $value) {
            $user[] = $value->id;
        }
        //print_r($faker->randomElement($user));
        
        for ($i = 0; $i < $limit; $i++) {
            GradeModel::create([
                'author' => $faker->randomElement($user),
                'title' => $faker->title,
                'description' => $faker->paragraph,
                'slug' => $faker->slug,
                'created' => time()+$i+5,
                'changed' => time()+$i+5,
            ]);
        }
    }
}
