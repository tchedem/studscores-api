<?php

namespace Database\Seeders;

use Hash;
use App\Models\User;
// use Spatie\Permission\Models\Role;
// use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            // 1 Admin
            [
                'id' => 1,
                'name' => 'Lucas Hountondji',
                'email' => 'hountluc@gmail.com',
                'password' => Hash::make('12345678'),
                'type_user' => 'admin',
            ],
            // 1 Academic Manager
            [
                'id' => 2,
                'name' => 'Pierre Zohoun',
                'email' => 'pzohoun@gmail.com',
                'password' => Hash::make('12345678'),
                'type_user' => 'academic-manager',
            ],[
                'id' => 3,
                'name' => 'Luc H',
                'email' => 'hountluc2@gmail.com',
                'password' => Hash::make('12345678'),
                'type_user' => 'admin',
            ],
            //3 clients
            [
                'id' => 5,
                'name' => 'uac_client',
                'email' => 'uac_client@uac.bj',
                'password' => Hash::make('12345678'),
                'type_user' => 'client',
            ],
            [
                'id' => 6,
                'name' => 'okapi_client',
                'email' => 'okapi_client@uac.bj',
                'password' => Hash::make('12345678'),
                'type_user' => 'client',
            ],
            [
                'id' => 7,
                'name' => 'eneam_client',
                'email' => 'eneam_client@uac.bj',
                'password' => Hash::make('12345678'),
                'type_user' => 'client',
            ],
/*
            //20 teachers

            [
                'id' => 2,
                'name' => 'Pierre Zohoun',
                'email' => 'pzohoun@gmail.com',
                'password' => Hash::make('12345678'),
                'type_user' => 'academic-manager',
            ],

            //6 student-respo
            [
                'id' => 2,
                'name' => 'Pierre Zohoun',
                'email' => 'pzohoun@gmail.com',
                'password' => Hash::make('12345678'),
                'type_user' => 'academic-manager',
            ],
*/
        ]);


        // $role = Role::find(1);

        // $permissions = Permission::pluck('id', 'id')->all();

        // $role->syncPermissions($permissions);

        // $user->assignRole([$role->id]);

    }
}
