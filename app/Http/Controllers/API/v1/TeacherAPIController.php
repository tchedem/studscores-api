<?php

namespace App\Http\Controllers\API\v1;

use File;
// use PDF;
// use Storage;

use App\Log;
use Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Models\Teacher;
use App\Http\Resources\API\v1\TeacherResource;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



/**
 * @group Teachers
 *
 * API endpoints for managing app Teachers. Actions on this resource is only allow to 'Admin' and 'Client' users.
 */

class TeacherAPIController extends Controller
{

    public function __construct() {
        $this->middleware('auth:api');
    }

    /**
     * Display or send a listing of the Teachers resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'format' => 'string',
        ]);

        // if(!auth()->user()){
        //     return response([
        //         'message' => "Unauthenticated, You must be authenticated to access this operation",
        //     ], 401);
        // }
        if(auth()->user() && auth()->user()->type_user == 'admin' || auth()->user()->type_user == 'client'){

            if( $request->format && $request->format == 'csv' ){
                $fileName = 'teachers.csv';

                $headers = [
                    'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0',
                    'Content-type'        => 'text/csv',
                    "Content-Disposition" => "attachment; filename=$fileName",
                    'Expires'             => '0',
                    'Pragma'              => 'public'
                ];

                $teachers = Teacher::all();
                $columns = array('id', "last_name", "first_name", "gender", "email", "phone_number", "valid", "description", "created_at");

                $callback = function() use($teachers, $columns) {
                    $file = fopen('php://output', 'w');
                    fputcsv($file, $columns, '|');

                    foreach ($teachers as $teacher) {
                        $row['id']  = $teacher->id;
                        $row['last_name']    = $teacher->last_name;
                        $row['first_name']    = $teacher->first_name;
                        $row['gender']    = $teacher->gender;
                        $row['email']  = $teacher->email;
                        $row['phone_number']  = $teacher->phone_number;
                        $row['valid']  = $teacher->valid;
                        $row['description']  = $teacher->description;
                        $row['created_at']  = $teacher->created_at;

                        fputcsv($file, array($row['id'], $row['last_name'], $row['first_name'], $row['gender'], $row['email'], $row['phone_number'], $row['valid'], $row['description'], $row['created_at']), '|');
                    }
                    fclose($file);
                };

                // $file = $callback();
                // // dd($file);
                // //TypeUser_TableName_YYYYMMDD

                // $typeUser = auth()->user()->type_user;
                // $tableName = "Teacher";
                // $date = date("Ymd");
                // $path = '/CSV_Exports/'.$typeUser.'/'.$tableName.'/';

                // $path = public_path().$path;
                // File::makeDirectory($path, $mode = 0777, true, true);

                // File::makeDirectory($path);
                // $filePath = $path.auth()->user()->name.$date.'.csv';
                // dd($path.auth()->user()->id.'_'.$date.'.csv');
                // $UserName
                // File::put($path.auth()->user()->id.'_'.$date.'.csv', $file); //dd($csvFile);

                // Add log in database
                Log::addToLog('Export Log', $request, 'CSV Export');
                return response()->stream($callback, 200, $headers);
            }

            if( $request->format && $request->format == 'json' ){
                $teachers = Teacher::all();
                Log::addToLog('Export Log', $request, 'JSON Export');
                //Permettre le telechargement
                return $teachers->toJson();
            }

            // Here we just made specifique validation for first_name and last_name [first_name, last_name, email, valid, gender, phone_number, description]
            if($request->first_name && $request->last_name){
                $teachers = TeacherResource::collection(Teacher::where('first_name', 'like','%'.$request->first_name.'%')->where('last_name', 'like','%'.$request->last_name.'%')->paginate(30));
                return $teachers;
            }
            if($request->last_name){
                $teachers = TeacherResource::collection(Teacher::where('last_name', 'like','%'.$request->last_name.'%')->paginate(30));
                return $teachers;
            }
            if($request->first_name){
                $teachers = TeacherResource::collection(Teacher::where('first_name', 'like','%'.$request->first_name.'%')->paginate(30));
                return $teachers;
            }

            $teachers = TeacherResource::collection(Teacher::paginate(30));
            return $teachers;
        }

        return response([
            'message' => "Unauthorized, You don't have access to this operation",
        ], 401);

    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified Teacher resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return new UserResource($user);
        if(auth()->user()->type_user == 'admin' || auth()->user()->type_user == 'academic-manager' || auth()->user()->type_user == 'teacher'){

            if(Teacher::where('id', $id)->first()){
                return Teacher::where('id', $id)->first();
            }

            return response([
                'message' => "Teacher not found",
            ], 404);
        }

        return response([
            'message' => "Unauthorized, You don't have access to this operation",
        ], 401);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
