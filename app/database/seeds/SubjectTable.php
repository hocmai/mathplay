<?php

use Illuminate\Database\Seeder;

class SubjectTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 2;
        $users = DB::table('users')->select(array('id'))->get();
        $users = collect($users)->map(function($value){
            return $value->id;
        })->toArray();

        $grade = DB::table('grade')->select(array('grade_id'))->get();
        $grade = collect($grade)->map(function($value){
            return $value->grade_id;
        })->toArray();
        
        for ($i = 0; $i < $limit; $i++) {
            DB::table('subject')->insert([ //,
                'author' => $faker->randomElement($users),
                'grade_id' => $faker->randomElement($grade),
                'title' => $faker->word,
                'description' => $faker->paragraph,
                'slug' => $faker->slug,
                'created' => time()+$i+5,
                'changed' => time()+$i+5,
            ]);
        }
    }
}
