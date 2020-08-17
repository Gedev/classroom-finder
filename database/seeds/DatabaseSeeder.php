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
        $this->call(CourseSeeder::class);
        $this->call(ClassroomSeeder::class);
        $this->call(CoursesSchedulesSeeder::class);
        $this->call(UsersTableSeeder::class);

        $this->command->info('Tables seeded!');
    }
}
