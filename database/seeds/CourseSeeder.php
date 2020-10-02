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
                'name' => 'web1_AprocheDesign',
                'id_classroom' => 104,
                'id_training' => 1,
            ],
            [
                'id' => 7,
                'name' => 'web1_SitesWebStatiques',
                'id_classroom' => 103,
                'id_training' => 1,
            ],
            [
                'id' => 2,
                'name' => 'web2_scriptClients',
                'id_classroom' => 102,
                'id_training' => 1,
            ],
            [
                'id' => 3,
                'name' => 'web2_web_dynamique',
                'id_classroom' => 103,
                'id_training' => 1,
            ],
            [
                'id' => 4,
                'name' => 'web2_framework_poo',
                'id_classroom' => 104,
                'id_training' => 1,
            ],
            [
                'id' => 8,
                'name' => 'web2_AprocheDesign',
                'id_classroom' => 104,
                'id_training' => 1,
            ],
            [
                'id' => 5,
                'name' => 'web1_anglaisUE1',
                'id_classroom' => 101,
                'id_training' => 1,
            ],
            [
                'id' => 6,
                'name' => 'web1_anglaisUE2',
                'id_classroom' => 101,
                'id_training' => 1,
            ]
        ]);
    }
}
