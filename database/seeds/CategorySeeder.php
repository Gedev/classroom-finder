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
            [
                'id' => '4',
                'name' => 'Développement Personnel',
            ],
            [
                'id' => '5',
                'name' => 'Orientation paramédicale',
            ],
            [
                'id' => '6',
                'name' => 'Section animalière',
            ],
            [
                'id' => '7',
                'name' => 'Section technique',
            ],
            [
                'id' => '8',
                'name' => 'Technique artisanat',
            ],
            [
                'id' => '9',
                'name' => 'Aide à la réussite',
            ],
        ]);
    }
}
