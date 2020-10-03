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
                'name' => 'Webdev_bloc1',
            ],
            [
                'name' => 'Webdev_bloc2',
            ],
            [
                'name' => 'Bachelier en informatique de gestion',
            ],
            [
                'name' => 'Anglais',
            ],
            [
                'name' => 'Néerlandais',
            ],
            [
                'name' => 'Bachelier en gestion des ressources humaines',
            ],
            [
                'name' => 'Bachelier en commerce extérieur',
            ]
        ]);
    }
}
