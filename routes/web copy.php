<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\DB;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');

Route::get('/reset-password', [AuthController::class, 'reset_password'])->name('reset-password');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::get('/test', function(){

    $headers = [
        'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0',
        'Content-type'        => 'text/csv',
        'Content-Disposition' => 'attachment; filename=galleries.csv',
        'Expires'             => '0',
        'Pragma'              => 'public'
    ];

    $fileName = 'tasks.csv';
    $users = User::all(); dd($users);
    $columns = array('id', "name", "sex", "type_user", "email", "phone_number", "description", "valid", "created_at");

    $callback = function() use($users, $columns) {
        $file = fopen('php://output', 'w');
        fputcsv($file, $columns);

        foreach ($users as $user) {
            $row['id']  = $user->title;
            $row['Assign']    = $user->assign->name;
            $row['Description']    = $user->description;
            $row['Start Date']  = $user->start_at;
            $row['Due Date']  = $user->end_at;

            fputcsv($file, array($row['Title'], $row['Assign'], $row['Description'], $row['Start Date'], $row['Due Date']));
        }

        fclose($file);
    };

    return response()->stream($callback, 200, $headers);

        "name" => "Lucas Hountondji"
        "sex" => null
        "type_user" => "admin"
        "email" => "hountluc@gmail.com"
        "phone_number" => null
        "description" => null
        "email_verified_at" => null
        "valid" => 1
        "password" => "$2y$10$lNtY7S2Tkb4VOG4DwewL.OQbfgqLQOYJ7tIbFimlP9FroMKlsWT2W"
        "remember_token" => null
        "created_at" => "2022-03-03 18:09:31"
        "updated_at" => "2022-03-03 18:09:31"



    $file = fopen('file.csv', 'w');
    foreach ($users as $row) { dd(gettype($row));
        fputcsv($file, $row->to_array());
    }
    fclose($file);
    dd('1');
    // return Redirect::to('consolidated');

    $users = DB::select("SELECT * FROM users");



    array_unshift($users, array_keys($users));

    $fp = fopen("test.csv", 'w');
        foreach ($users as $row) {
        fputcsv($fp, (array) $row, '|');
    }

    // $callback = function() use ($users)
    // {
    //     $FH = fopen('php://output', 'w');
    //     foreach ($users as $row) {
    //         fputcsv($FH, $row);
    //     }
    //     fclose($FH);

    //     $fp = fopen("test.csv", 'w');
    //     foreach ($users as $row) {dd($row);
    //         fputcsv($fp, $row);
    //     }

    //     fclose($fp);

    //     // $table = Cpmreport::all();
    //     // $file = fopen('file.csv', 'w');
    //     // foreach ($table as $row) {
    //     //     fputcsv($file, $row->to_array());
    //     // }
    //     // fclose($file);

    // };
dd('p');
    //return response()->stream($callback, 200, $headers);
    // dd($users);
});



// public function exportCsv(Request $request)
// {
//    $fileName = 'tasks.csv';
//    $users = Task::all();

//         $headers = array(
//             "Content-type"        => "text/csv",
//             "Content-Disposition" => "attachment; filename=$fileName",
//             "Pragma"              => "no-cache",
//             "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
//             "Expires"             => "0"
//         );

//         $columns = array('Title', 'Assign', 'Description', 'Start Date', 'Due Date');

//         $callback = function() use($users, $columns) {
//             $file = fopen('php://output', 'w');
//             fputcsv($file, $columns);

//             foreach ($users as $user) {
//                 $row['Title']  = $user->title;
//                 $row['Assign']    = $user->assign->name;
//                 $row['Description']    = $user->description;
//                 $row['Start Date']  = $user->start_at;
//                 $row['Due Date']  = $user->end_at;

//                 fputcsv($file, array($row['Title'], $row['Assign'], $row['Description'], $row['Start Date'], $row['Due Date']));
//             }

//             fclose($file);
//         };

//         return response()->stream($callback, 200, $headers);
//     }
