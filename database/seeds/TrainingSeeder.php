<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trainings')->insert([
            [
                'id' => '1',
                'name' => 'webdev',
                '' => '',
            ]
        ]);
    }
}