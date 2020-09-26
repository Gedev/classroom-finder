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
                'idCard' => '',
                'training' => rand(0, 6),
            ],
            [
                'name' => 'Étudiant',
                'email' => 'student00@example.com',
                'password' => bcrypt('student_classfi'),
                'role' => 'student',
                'idCard' => '',
                'training' => rand(0, 6),
            ],
            [
                'name' => 'student01',
                'email' => 'student01@example.com',
                'password' => bcrypt('student_classfi'),
                'role' => 'student',
                'idCard' => '',
                'training' => rand(0, 6),
            ],
            [
                'name' => 'student02',
                'email' => 'student02@example.com',
                'password' => bcrypt('student_classfi'),
                'role' => 'student',
                'idCard' => '',
                'training' => rand(0, 6),
            ],
            [
                'name' => 'Professeur',
                'email' => 'professeur@example.com',
                'password' => bcrypt('prof_classfi'),
                'role' => 'professor',
                'idCard' => 'àé§è&§"§éç',
                'training' => rand(0, 6),
            ],
            [
                'name' => 'Directeur',
                'email' => 'directeur@example.com',
                'password' => bcrypt('directeur_classfi'),
                'role' => 'director',
                'idCard' => '',
                'training' => rand(0, 6),
            ]
        ]);
    }
}
