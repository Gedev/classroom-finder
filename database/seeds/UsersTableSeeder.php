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
            'password' => 'test',
            ],
            [
                'name' => 'Professeur',
                'email' => 'professeur@example.com',
                'password' => 'test',
            ],
            [
                'name' => 'Directeur',
                'email' => 'directeur@example.com',
                'password' => 'test',
            ]
        ]);
    }
}
