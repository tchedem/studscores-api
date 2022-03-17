<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\DB;
use App\Models\User;

use App\Http\Controllers\MailController;

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
    return redirect()->route('login');
    return view('welcome');
});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');

Route::get('/reset-password', [AuthController::class, 'reset_password'])->name('reset-password');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


// Route::get('sendbasicemail','MailController@basic_email');
Route::get('sendbasicemail', [MailController::class, 'basic_email']);
Route::get('sendhtmlemail', [MailController::class, 'html_email']);
Route::get('sendattachmentemail', [MailController::class, 'attachment_email']);
// Route::get('sendhtmlemail','MailController@html_email');
// Route::get('sendattachmentemail','MailController@attachment_email');


Route::get('/test', function(){

    $fileName = 'tasks.csv';

    $headers = [
        'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0',
        'Content-type'        => 'text/csv',
        "Content-Disposition" => "attachment; filename=$fileName",
        'Expires'             => '0',
        'Pragma'              => 'public'
    ];

    $users = User::all();
    $columns = array('id', "name", "sex", "type_user", "email", "phone_number", "description", "valid", "created_at");

    $callback = function() use($users, $columns) {
        $file = fopen('php://output', 'w');
        fputcsv($file, $columns, '|');

        foreach ($users as $user) {
            $row['id']  = $user->id;
            $row['name']    = $user->name;
            $row['sex']    = $user->sex;
            $row['type_user']  = $user->type_user;
            $row['email']  = $user->email;
            $row['phone_number']  = $user->phone_number;
            $row['description']  = $user->description;
            $row['valid']  = $user->valid;
            $row['created_at']  = $user->created_at;

            fputcsv($file, array($row['id'], $row['name'], $row['sex'], $row['type_user'], $row['email'], $row['phone_number'], $row['description'], $row['valid'], $row['created_at']), '|');
        }
        fclose($file);
    };


    return response()->stream($callback, 200, $headers);

    dd('p');

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
//    $tasks = Task::all();

//         $headers = array(
//             "Content-type"        => "text/csv",
//             "Content-Disposition" => "attachment; filename=$fileName",
//             "Pragma"              => "no-cache",
//             "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
//             "Expires"             => "0"
//         );

//         $columns = array('Title', 'Assign', 'Description', 'Start Date', 'Due Date');

//         $callback = function() use($tasks, $columns) {
//             $file = fopen('php://output', 'w');
//             fputcsv($file, $columns);

//             foreach ($tasks as $task) {
//                 $row['Title']  = $task->title;
//                 $row['Assign']    = $task->assign->name;
//                 $row['Description']    = $task->description;
//                 $row['Start Date']  = $task->start_at;
//                 $row['Due Date']  = $task->end_at;

//                 fputcsv($file, array($row['Title'], $row['Assign'], $row['Description'], $row['Start Date'], $row['Due Date']));
//             }

//             fclose($file);
//         };

//         return response()->stream($callback, 200, $headers);
//     }
