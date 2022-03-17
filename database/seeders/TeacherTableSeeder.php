<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeacherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teachers')->insert([
            [
                'id' => 1,
                'last_name' => 'Houenou',
                'first_name' => 'Franck',
                'gender' => 'M',
                'email' => 'fhouenou@uac.bj',
                'phone_number' => '+22997979701',
                'valid' => true,
                'user_id' => 1,
                'description' => 'Professeur de maths dans plusieurs universités du Bénin',
            ],
            [
                'id' => 2,
                'last_name' => 'Akponan',
                'first_name' => 'Christian',
                'gender' => 'M',
                'email' => 'cakponan@uac.bj',
                'phone_number' => '+22997979702',
                'valid' => true,
                'user_id' => 1,
                'description' => 'Professeur des sciences informatique dans plusieurs universités du Bénin',
            ],
            [
                'id' => 3,
                'last_name' => 'Metognon',
                'first_name' => 'Lionel',
                'gender' => 'M',
                'email' => 'lmetognon@uac.bj',
                'phone_number' => '+22997979703',
                'valid' => true,
                'user_id' => 1,
                'description' => 'Professeur des sciences informatique dans plusieurs universités du Bénin',
            ],
            [
                'id' => 4,
                'last_name' => 'Oyetola',
                'first_name' => 'Victor',
                'gender' => 'M',
                'email' => 'voyetola@uac.bj',
                'phone_number' => '+22997979704',
                'valid' => true,
                'user_id' => 1,
                'description' => 'Professeur des sciences informatique dans plusieurs universités du Bénin',
            ],
            [
                'id' => 5,
                'last_name' => 'Atou',
                'first_name' => 'Eric',
                'gender' => 'M',
                'email' => 'eatou@uac.bj',
                'phone_number' => '+22997979705',
                'valid' => true,
                'user_id' => 1,
                'description' => 'Professeur des sciences informatique dans plusieurs universités du Bénin',
            ],
        ]);
    }
}
