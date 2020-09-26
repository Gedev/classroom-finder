<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                'id_training' => 1,
            ],
            [
                'id' => 2,
                'name' => 'scripts_clients',
                'id_classroom' => 102,
                'id_training' => 1,
            ],
            [
                'id' => 3,
                'name' => 'web_dynamique',
                'id_classroom' => 103,
                'id_training' => 1,
            ],
            [
                'id' => 4,
                'name' => 'framework_poo',
                'id_classroom' => 104,
                'id_training' => 1,
            ]
        ]);
    }
}
