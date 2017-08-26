<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        //$this->call(UsersTable);
        //$this->call(GradeTable);
        //$this->call(SubjectTable);

        $this->call(AdminTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(UsersTable::class);
    }
}
