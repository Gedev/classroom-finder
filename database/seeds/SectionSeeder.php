<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sections')->insert([
            [
                'id' => '1',
                'name' => 'Webdev',
            ],
            [
                'id' => '2',
                'name' => 'Bachelier en informatique de gestion',
            ],
            [
                'id' => '3',
                'name' => 'Anglais',
            ],
            [
                'id' => '4',
                'name' => 'Néerlandais',
            ],
            [
                'id' => '5',
                'name' => 'Bachelier en gestion des ressources humaines',
            ],
            [
                'id' => '6',
                'name' => 'Bachelier en commerce extérieur',
            ]
        ]);
    }
}
