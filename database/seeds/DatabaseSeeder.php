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
        $this->call(CourseSeeder::class);
        $this->call(ClassroomSeeder::class);

        $this->command->info('User table seeded!');
    }
}
