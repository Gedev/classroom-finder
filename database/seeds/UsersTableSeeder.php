<?php

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
            ],
            [
                'name' => 'Étudiant',
                'email' => 'student@example.com',
                'password' => bcrypt('student_classfi'),
                'role' => 'student',
            ],
            [
                'name' => 'Professeur',
                'email' => 'professeur@example.com',
                'password' => bcrypt('prof_classfi'),
                'role' => 'professor',
            ],
            [
                'name' => 'Directeur',
                'email' => 'directeur@example.com',
                'password' => bcrypt('directeur_classfi'),
                'role' => 'director',
            ]
        ]);
    }
}
