<?php

namespace App\Http\Controllers\API\v1;

use App\Log;
use Validator;
use App\Models\Student;
use App\Http\Resources\API\v1\StudentResource;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @group Students
 *
 * API endpoints for managing app Students. Actions on this resource is only allow to 'Admin' and 'Client' users.
 */
class StudentAPIController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //validation don't work
        $validator = Validator::make($request->all(), [
            'format' => 'string',
        ]);

        if(auth()->user()->type_user == "admin" || auth()->user()->type_user == "client" || auth()->user()->type_user == "academic-manager"){

            // CSV
            if($request->format && $request->format == 'csv'){
                $fileName = 'students.csv';

                $headers = [
                    'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0',
                    'Content-type'        => 'text/csv',
                    "Content-Disposition" => "attachment; filename=$fileName",
                    'Expires'             => '0',
                    'Pragma'              => 'public'
                ];

                $students = Student::all();
                $columns = array('id', "maticule", "last_name", "first_name", "gender", "email", "phone_number", "valid", "description", "role", "created_at", "updated_at");

                $callback = function() use($students, $columns) {
                    $file = fopen('php://output', 'w');
                    fputcsv($file, $columns, '|');

                    foreach ($students as $student) {
                        $row['id']  = $student->id;
                        $row['maticule']    = $student->maticule;
                        $row['last_name']    = $student->last_name;
                        $row['first_name']    = $student->first_name;
                        $row['gender']    = $student->gender;
                        $row['email']    = $student->email;
                        $row['phone_number']    = $student->phone_number;
                        $row['valid']    = $student->valid;
                        $row['description']    = $student->description;
                        $row['role']    = $student->role;
                        $row['created_at']  = $student->created_at;
                        $row['updated_at']  = $student->updated_at;

                        fputcsv($file, array($row['id'], $row['maticule'], $row['last_name'], $row['first_name'], $row['gender'], $row['email'], $row['phone_number'], $row['valid'], $row['description'], $row['role'], $row['created_at'], $row['updated_at']), '|');
                    }
                    fclose($file);
                };

                // Add log in database
                Log::addToLog('Export Log', $request, 'CSV Export');
                return response()->stream($callback, 200, $headers);
            }

            //JSON
            if( $request->format && $request->format == 'json' ){
                $students = Student::all();
                Log::addToLog('Export Log', $request, 'JSON Export');

                // return $students->toJson();
                $students = json_encode($students, JSON_UNESCAPED_UNICODE );
                return $students;
            }

            $students = StudentResource::collection(Student::paginate(30));
            return $students;
        }

        return response([
            'message' => "Unauthorized, You don't have access to this operation",
        ], 401);
    }

    /**
     * @hideFromAPIDocumentation
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
     * Display the specified Student resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(auth()->user()->type_user == 'admin' || auth()->user()->type_user == 'academic-manager' || auth()->user()->type_user == 'teacher'){

            if(Student::where('id', $id)->first()){
                return Student::where('id', $id)->first();
            }

            return response([
                'message' => "Student not found",
            ], 404);
        }

        return response([
            'message' => "Unauthorized, You don't have access to this operation",
        ], 401);

    }

    /**
     * @hideFromAPIDocumentation
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
     * @hideFromAPIDocumentation
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
