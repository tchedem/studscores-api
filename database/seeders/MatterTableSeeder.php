<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('matters')->insert([
            //Level 1
            [
                'id' => 1,
                'name' => 'Analyse Mathematique',
                'academic_manager_id' => 1,
                'teacher_id' => 1,
            ],[
                'id' => 2,
                'name' => 'Algebre Matricielle',
                'academic_manager_id' => 1,
                'teacher_id' => 1,
            ],[
                'id' => 3,
                'name' => 'Probabilite',
                'academic_manager_id' => 1,
                'teacher_id' => 1,
            ],[
                'id' => 4,
                'name' => 'Statistique Inferenciel',
                'academic_manager_id' => 1,
                'teacher_id' => 1,
            ],[
                'id' => 5,
                'name' => 'Algorithmique',
                'academic_manager_id' => 1,
                'teacher_id' => 1,
            ],[
                'id' => 6,
                'name' => 'Langage C',
                'academic_manager_id' => 1,
                'teacher_id' => 1,
            ],[
                'id' => 7,
                'name' => 'Logique Mathematique',
                'academic_manager_id' => 1,
                'teacher_id' => 1,
            ],[
                'id' => 8,
                'name' => 'Serie Numerique',
                'academic_manager_id' => 1,
                'teacher_id' => 1,
            ],[
                'id' => 9,
                'name' => 'Analyse Mathematique',
                'academic_manager_id' => 1,
                'teacher_id' => 1,
            ],[
                'id' => 10,
                'name' => 'Langage C Avancé',
                'academic_manager_id' => 1,
                'teacher_id' => 1,
            ],[
                'id' => 11,
                'name' => 'Anglais technique',
                'academic_manager_id' => 1,
                'teacher_id' => 1,
            ],

            //Level 2
            [
                'id' => 12,
                'name' => 'Theorie des nombres',
                'academic_manager_id' => 1,
                'teacher_id' => 2
            ],[
                'id' => 13,
                'name' => 'Analyse Numérique',
                'academic_manager_id' => 1,
                'teacher_id' => 2
            ],[
                'id' => 14,
                'name' => 'Structure Algébrique',
                'academic_manager_id' => 1,
                'teacher_id' => 2
            ],[
                'id' => 15,
                'name' => 'Conception Orienté Objet et Modélisation UML',
                'academic_manager_id' => 1,
                'teacher_id' => 2
            ],[
                'id' => 16,
                'name' => 'Expressions en langue anglaise',
                'academic_manager_id' => 1,
                'teacher_id' => 2
            ],[
                'id' => 17,
                'name' => 'Sécurité Logicielle',
                'academic_manager_id' => 1,
                'teacher_id' => 2
            ],[
                'id' => 18,
                'name' => 'Sécurité Matérielle',
                'academic_manager_id' => 1,
                'teacher_id' => 2
            ],[
                'id' => 19,
                'name' => 'Théorie du signal',
                'academic_manager_id' => 1,
                'teacher_id' => 2
            ],[
                'id' => 20,
                'name' => "Théorie de l'information",
                'academic_manager_id' => 1,
                'teacher_id' => 2
            ],[
                'id' => 21,
                'name' => 'Théorie du Signal',
                'academic_manager_id' => 1,
                'teacher_id' => 2
            ],

            //Level 3
            [
                'id' => 22,
                'name' => 'MERISE',
                'academic_manager_id' => 1,
                'teacher_id' => 3
            ],[
                'id' => 23,
                'name' => 'Introduction à la crytographie',
                'academic_manager_id' => 1,
                'teacher_id' => 3
            ],[
                'id' => 24,
                'name' => 'Les IDS',
                'academic_manager_id' => 1,
                'teacher_id' => 3
            ],[
                'id' => 25,
                'name' => 'Conception Orienté Objet et Modélisation UML',
                'academic_manager_id' => 1,
                'teacher_id' => 3
            ],[
                'id' => 26,
                'name' => 'JAVA',
                'academic_manager_id' => 1,
                'teacher_id' => 3
            ],[
                'id' => 27,
                'name' => 'Les vulnérabilités WEB',
                'academic_manager_id' => 1,
                'teacher_id' => 3
            ],[
                'id' => 28,
                'name' => 'Technique de rédaction de Mémoire',
                'academic_manager_id' => 1,
                'teacher_id' => 3
            ],[
                'id' => 29,
                'name' => "Technique de recherche d'emploi",
                'academic_manager_id' => 1,
                'teacher_id' => 3
            ],[
                'id' => 30,
                'name' => "Formation Certification CEH",
                'academic_manager_id' => 1,
                'teacher_id' => 3
            ],[
                'id' => 31,
                'name' => 'Formation Certification Mikrotik',
                'academic_manager_id' => 1,
                'teacher_id' => 3
            ],
        ]);
    }
}
