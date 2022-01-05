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
            ],
            // INFORMATIQUE / BUREAUTIQUE
            [
                'name' => 'Word',
                'category_id' => 2,
            ],
            [
                'name' => 'Excel',
                'category_id' => 2,
            ],
            // DEVELOPPEMENT PERSONNEL
            [
                'name' => 'Confort et bien-être au visage',
                'category_id' => 4,
            ],
            [
                'name' => 'Gestion de conflit',
                'category_id' => 4,
            ],
            [
                'name' => 'Gestion du stress',
                'category_id' => 4,
            ],
            [
                'name' => 'Huiles essentielles',
                'category_id' => 4,
            ],
            [
                'name' => 'Maquillage',
                'category_id' => 4,
            ],
            [
                'name' => 'Réflexologie plantaire',
                'category_id' => 4,
            ],
            [
                'name' => 'Réflexologie plantaire - approfondissement',
                'category_id' => 4,
            ],
            // ORIENTATION PARAMÉDICALE
            [
                'name' => 'Secrétariat médical',
                'category_id' => 5,
            ],
            [
                'name' => 'Pédicure spécialisé',
                'category_id' => 5,
            ],
            [
                'name' => 'Assistant pharmaceutico-technique',
                'category_id' => 5,
            ],
            [
                'name' => 'Agent d_accueil et de gestion d_un cabinet dentaire',
                'category_id' => 5,
            ],
            // SECTION ANIMALIÈRE
            [
                'name' => 'Assistant vétérinaire',
                'category_id' => 6,
            ],
            [
                'name' => 'Esthétique canine',
                'category_id' => 6,
            ],
            [
                'name' => 'Découverte du comportement des animaux de compagnie',
                'category_id' => 6,
            ],
            // SECTION TECHNIQUE
            [
                'name' => 'Monteur frigoriste',
                'category_id' => 7,
            ],
            [
                'name' => 'Technicien de bureau',
                'category_id' => 7,
            ],
            [
                'name' => 'Technicien en programmation',
                'category_id' => 7,
            ],
            [
                'name' => 'Technicien commercial en co-organisation avec le CESOA',
                'category_id' => 7,
            ],
            [
                'name' => 'Techniques de secrétariat juridique',
                'category_id' => 7,
            ],

        ]);
    }
}
