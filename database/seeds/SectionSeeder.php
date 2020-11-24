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
                'name' => 'Webdev_1',
                'category_id' => 1,
            ],
            [
                'name' => 'Webdev_2',
                'category_id' => 1,
            ],
            [
                'name' => 'Bachelier en informatique de gestion',
                'category_id' => 1,
            ],
            [
                'name' => 'Anglais',
                'category_id' => 3,
            ],
            [
                'name' => 'Néerlandais',
                'category_id' => 3,
            ],
            [
                'name' => 'Bachelier en gestion des ressources humaines',
                'category_id' => 1,
            ],
            [
                'name' => 'Bachelier en commerce extérieur',
                'category_id' => 1,
            ]
        ]);
    }
}
