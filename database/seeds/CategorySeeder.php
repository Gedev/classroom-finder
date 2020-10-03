<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'id' => '1',
                'name' => 'Enseignement supérieur',
            ],
            [
                'id' => '2',
                'name' => 'Informatique / Bureautique',
            ],
            [
                'id' => '3',
                'name' => 'Langues',
            ],
        ]);
    }
}
