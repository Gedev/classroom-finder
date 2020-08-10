<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        DB::table('classrooms')->insert([
            [
                'id' => 100,
                'floor' => 1,
                'nb_of_seats' => random_int(20,30),
                'has_whiteboard' => random_int(0, 1),
                'has_projector' => random_int(0,1)
            ],
            [
                'id' => 101,
                'floor' => 1,
                'nb_of_seats' => random_int(20,30),
                'has_whiteboard' => random_int(0, 1),
                'has_projector' => random_int(0,1)
            ],
            [
                'id' => 102,
                'floor' => 1,
                'nb_of_seats' => random_int(20,30),
                'has_whiteboard' => random_int(0, 1),
                'has_projector' => random_int(0,1)
            ],
            [
                'id' => 103,
                'floor' => 1,
                'nb_of_seats' => random_int(20,30),
                'has_whiteboard' => random_int(0, 1),
                'has_projector' => random_int(0,1)
            ],
            [
                'id' => 104,
                'floor' => 1,
                'nb_of_seats' => random_int(20,30),
                'has_whiteboard' => random_int(0, 1),
                'has_projector' => random_int(0,1)
            ],
            [
                'id' => 105,
                'floor' => 1,
                'nb_of_seats' => random_int(20,30),
                'has_whiteboard' => random_int(0, 1),
                'has_projector' => random_int(0,1)
            ],
            [
                'id' => 200,
                'floor' => 2,
                'nb_of_seats' => random_int(20,30),
                'has_whiteboard' => random_int(0, 1),
                'has_projector' => random_int(0,1)
            ],
            [
                'id' => 201,
                'floor' => 2,
                'nb_of_seats' => random_int(20,30),
                'has_whiteboard' => random_int(0, 1),
                'has_projector' => random_int(0,1)
            ],
            [
                'id' => 202,
                'floor' => 2,
                'nb_of_seats' => random_int(20,30),
                'has_whiteboard' => random_int(0, 1),
                'has_projector' => random_int(0,1)
            ],
            [
                'id' => 203,
                'floor' => 2,
                'nb_of_seats' => random_int(20,30),
                'has_whiteboard' => random_int(0, 1),
                'has_projector' => random_int(0,1)
            ],
            [
                'id' => 204,
                'floor' => 2,
                'nb_of_seats' => random_int(20,30),
                'has_whiteboard' => random_int(0, 1),
                'has_projector' => random_int(0,1)
            ],
            [
                'id' => 205,
                'floor' => 2,
                'nb_of_seats' => random_int(20,30),
                'has_whiteboard' => random_int(0, 1),
                'has_projector' => random_int(0,1)
            ],
            ]
        );
    }
}
