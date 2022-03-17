<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentTableSeeder extends Seeder
{
    public function randomer(){
        $gender = ['M', 'F'];
        $value = rand(0,1);
        $gender=$gender[$value];
        return $gender;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            [
                'id' => 1,
                'matricule' => 12534501,
                'last_name' => 'Jean',
                'first_name' => 'Tata',
                'gender' => 'M',
                'email' => 'jtata@gmail.com',
                'phone_number' => '+22951515101',
                'valid' => true,
                'description' => '',
                'role' => 'respo',
                // 'institute_or_facultie_id' => 1,
                // 'promotion_id' => 1,
                // 'level_id' => 1,
            ],
            [
                'id' => 2,
                'matricule' => 12534502,
                'last_name' => 'Essou',
                'first_name' => 'Thierry',
                'gender' => 'M',
                'email' => 'ethierry@gmail.com',
                'phone_number' => '+22951515102',
                'valid' => true,
                'description' => '',
                'role' => 'respo',
                // 'institute_or_facultie_id' => 1,
                // 'promotion_id' => 1,
                // 'level_id' => 1,
            ],
            [
                'id' => 3,
                'matricule' => 12534503,
                'last_name' => 'Paul',
                'first_name' => 'Azatassou',
                'gender' => 'M',
                'email' => 'pazatassou@gmail.com',
                'phone_number' => '+22951515103',
                'valid' => true,
                'description' => '',
                'role' => 'respo',
                // 'institute_or_facultie_id' => 1,
                // 'promotion_id' => 1,
                // 'level_id' => 1,
            ],
            [
                'id' => 4,
                'matricule' => 12534504,
                'last_name' => 'Espédit',
                'first_name' => 'Azon',
                'gender' => 'M',
                'email' => 'eazon@gmail.com',
                'phone_number' => '+22951515104',
                'valid' => true,
                'description' => '',
                'role' => 'respo',
                // 'institute_or_facultie_id' => 1,
                // 'promotion_id' => 1,
                // 'level_id' => 1,
            ],
            [
                'id' => 5,
                'matricule' => 12534505,
                'last_name' => 'Espert',
                'first_name' => 'Naboua',
                'gender' => 'M',
                'email' => 'enamboua@gmail.com',
                'phone_number' => '+22951515105',
                'valid' => true,
                'description' => '',
                'role' => 'respo',
                // 'institute_or_facultie_id' => 1,
                // 'promotion_id' => 1,
                // 'level_id' => 1,
            ],
            [
                'id' => 6,
                'matricule' => 12534506,
                'last_name' => 'Junias',
                'first_name' => 'Bonou',
                'gender' => 'M',
                'email' => 'jbonou@gmail.com',
                'phone_number' => '+22951515106',
                'valid' => true,
                'description' => '',
                'role' => 'student',
                // 'institute_or_facultie_id' => 1,
                // 'promotion_id' => 1,
                // 'level_id' => 1,
            ],
        ]);
        $nbrOfStudentCreateManually = 6;

        Student::withoutEvents(function (){
            $matricule = 12534506;
            $phoneNumber = 22951515106;
            //$gender = rand('M', 'F');
            //Student::factory()->create([]);

            //Create 2 respos
            foreach (range(7,8) as $i){
                Student::factory()->create([
                    'id' => $i,
                    'matricule' => $matricule+1,
                    //'gender' => rand('M', 'F'),
                    'gender' => $this->randomer(),
                    'phone_number' => '+'.$phoneNumber+1,
                    'description' => '',
                    'role' => 'respo',
                    // 'institute_or_facultie_id' => 1,
                    // 'promotion_id' => 1,
                    // 'level_id' => 1,
                ]);
                $matricule = $matricule+1;
                $phoneNumber = $phoneNumber+1;
            }

            //Create 142 students
            foreach (range(9,150) as $i){
                Student::factory()->create([
                    'id' => $i,
                    'matricule' => $matricule+1,
                    //'gender' => rand('M', 'F'),
                    'gender' => $this->randomer(),
                    'phone_number' => '+'.$phoneNumber+1,
                    'description' => '',
                    'role' => 'respo',
                    // 'institute_or_facultie_id' => 1,
                    // 'promotion_id' => 1,
                    // 'level_id' => 1,
                ]);
                $matricule = $matricule+1;
                $phoneNumber = $phoneNumber+1;
            }
        });
        $nbrFakeStudents = 200;
    }
}
