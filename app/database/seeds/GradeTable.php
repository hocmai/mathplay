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
        $users = DB::table('users')->select(['id'])->get();
        $users = collect($users)->map(function($value){
            return $value->id;
        })->toArray();
        
        for ($i = 0; $i < $limit; $i++) {
            DB::table('grade')->insert([ //,
                'author' => $faker->randomElement($users),
                'title' => $faker->title,
                'description' => $faker->paragraph,
                'slug' => $faker->slug,
                'created' => time()+$i+5,
                'changed' => time()+$i+5,
            ]);
        }
    }
}
