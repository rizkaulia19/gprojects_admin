<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ClickSpecializationsTableSeeder::class);
        $this->call(ProjectsTableSeeder::class);
        $this->call(ProjectSpecializationsTableSeeder::class);
        $this->call(ProjectApplicantsTableSeeder::class);
        $this->call(UserSpecializationsTableSeeder::class);
    }
}
