<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'password' => bcrypt('john_classfi'),
                'role' => '',
                'card_id' => '',
                'section_id' => rand(0, 6),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Student',
                'email' => 'student00@example.com',
                'password' => bcrypt('student_classfi'),
                'role' => 'student',
                'card_id' => '',
                'section_id' => rand(0, 6),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Professor',
                'email' => 'professor@example.com',
                'password' => bcrypt('prof_classfi'),
                'role' => 'professor',
                'card_id' => 'àé§è&§"§éç',
                'section_id' => rand(0, 6),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Director',
                'email' => 'director@example.com',
                'password' => bcrypt('director_classfi'),
                'role' => 'director',
                'card_id' => '',
                'section_id' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        ]);


        // RANDOM DATA
        for ($i=0; $i < 100; $i++) {
            DB::table('users')->insert([
                [
                    'name' => 'student0'.($i+1),
                    'email' => 'student'.($i+1).'@example.com',
                    'password' => bcrypt('student_classfi'),
                    'role' => 'student',
                    'card_id' => '',
                    'section_id' => rand(0, 7),
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ]
            ]);
        }
    }
}
