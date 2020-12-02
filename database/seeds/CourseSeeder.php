<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert([
            // WEB BLOC 1
            [
                'name' => 'web1_baseReseaux',
                'classroom_id' => 104,
                'section_id' => 1,
            ],
            [
                'name' => 'web1_environnementEtTechnologies',
                'classroom_id' => 104,
                'section_id' => 1,
            ],
            [
                'name' => 'web1_SGBD',
                'classroom_id' => 104,
                'section_id' => 1,
            ],
            [
                'name' => 'web1_aprocheDesign',
                'classroom_id' => 104,
                'section_id' => 1,
            ],
            [
                'name' => 'web1_sitesWebStatiques',
                'classroom_id' => 103,
                'section_id' => 1,
            ],
            [
                'name' => 'web1_CMS_Niv1',
                'classroom_id' => 103,
                'section_id' => 1,
            ],
            [
                'name' => 'web1_initProgrammation',
                'classroom_id' => 103,
                'section_id' => 1,
            ],
            [
                'name' => 'web1_scriptServeur',
                'classroom_id' => 103,
                'section_id' => 1,
            ],
            [
                'name' => 'web1_anglaisUE1',
                'classroom_id' => 101,
                'section_id' => 1,
            ],
            // WEB BLOC 2
            [
                'name' => 'web2_scriptClients',
                'classroom_id' => 102,
                'section_id' => 2,
            ],
            [
                'name' => 'web2_webDynamique',
                'classroom_id' => 103,
                'section_id' => 2,
            ],
            [
                'name' => 'web2_frameworkPOO',
                'classroom_id' => 104,
                'section_id' => 2,
            ],
            [
                'name' => 'web2_aprocheDesign',
                'classroom_id' => 104,
                'section_id' => 2,
            ],
            [
                'name' => 'web2_anglaisUE2',
                'classroom_id' => 101,
                'section_id' => 2,
            ],
            // BACHELIER INFORMATIQUE DE GESTION BLOC 1
            [
                'name' => 'binfo1_anglaisUE1',
                'classroom_id' => 101,
                'section_id' => 3,
            ],
            [
                'name' => 'binfo1_algorithm_programation',
                'classroom_id' => 103,
                'section_id' => 3,
            ],
            [
                'name' => 'binfo1_webPrincipesDeBase',
                'classroom_id' => 101,
                'section_id' => 3,
            ],
            [
                'name' => 'binfo1_technGestProjet',
                'classroom_id' => 101,
                'section_id' => 3,
            ],
            [
                'name' => 'binfo1_principAnalyseInfo',
                'classroom_id' => 102,
                'section_id' => 3,
            ]
        ]);
    }
}
