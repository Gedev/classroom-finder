<?php

use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert([
            [
                'id' => 1,
                'name' => 'anglais',
                'id_classroom' => 101,
            ],
            [
                'id' => 2,
                'name' => 'scripts_clients',
                'id_classroom' => 102,
            ],
            [
                'id' => 3,
                'name' => 'web_dynamique',
                'id_classroom' => 103,
            ]
        ]);
    }
}
