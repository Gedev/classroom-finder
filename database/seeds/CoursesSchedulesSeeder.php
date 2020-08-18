<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoursesSchedulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schedules')->insert([
            [
                'id' => '1',
                'id_classroom' => '100',
                'section' => 'webdev',
                'course_name' => 'english',
                'start_at' => '9.00.00',
                'end_at' => '12',
                'day' => 'monday'
            ]
        ]);
    }
}
