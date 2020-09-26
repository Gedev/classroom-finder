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
            ],
            [
                'name' => 'student03',
                'email' => 'student03@example.com',
                'password' => bcrypt('student_classfi'),
                'role' => 'student',
                'idCard' => '',
                'training' => rand(0, 6),
            ],
            [
                'name' => 'student04',
                'email' => 'student04@example.com',
                'password' => bcrypt('student_classfi'),
                'role' => 'student',
                'idCard' => '',
                'training' => rand(0, 6),
            ],
            [
                'name' => 'student05',
                'email' => 'student05@example.com',
                'password' => bcrypt('student_classfi'),
                'role' => 'student',
                'idCard' => '',
                'training' => rand(0, 6),
            ],
            [
                'name' => 'student06',
                'email' => 'student06@example.com',
                'password' => bcrypt('student_classfi'),
                'role' => 'student',
                'idCard' => '',
                'training' => rand(0, 6),
            ],
            [
                'name' => 'student07',
                'email' => 'student07@example.com',
                'password' => bcrypt('student_classfi'),
                'role' => 'student',
                'idCard' => '',
                'training' => rand(0, 6),
            ],
            [
                'name' => 'student08',
                'email' => 'student08@example.com',
                'password' => bcrypt('student_classfi'),
                'role' => 'student',
                'idCard' => '',
                'training' => rand(0, 6),
            ],
            [
                'name' => 'student09',
                'email' => 'student09@example.com',
                'password' => bcrypt('student_classfi'),
                'role' => 'student',
                'idCard' => '',
                'training' => rand(0, 6),
            ],
            [
                'name' => 'student10',
                'email' => 'student10@example.com',
                'password' => bcrypt('student_classfi'),
                'role' => 'student',
                'idCard' => '',
                'training' => rand(0, 6),
            ],
            [
                'name' => 'student11',
                'email' => 'student11@example.com',
                'password' => bcrypt('student_classfi'),
                'role' => 'student',
                'idCard' => '',
                'training' => rand(0, 6),
            ],
            [
                'name' => 'student12',
                'email' => 'student12@example.com',
                'password' => bcrypt('student_classfi'),
                'role' => 'student',
                'idCard' => '',
                'training' => rand(0, 6),
            ],
            [
                'name' => 'student13',
                'email' => 'student13@example.com',
                'password' => bcrypt('student_classfi'),
                'role' => 'student',
                'idCard' => '',
                'training' => rand(0, 6),
            ],
        ]);
    }
}
