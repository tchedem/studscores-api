<?php

namespace App\Http\Controllers\API\v1;

use App\Log;
use Validator;
use App\Models\Matter;
use App\Http\Resources\API\v1\MatterResource;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @group Matters
 *
 * API endpoints for managing app Matters. Actions on this resource is only allow to 'Admin' and 'Client' users.
 */
class MatterAPIController extends Controller
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
        $validator = Validator::make($request->all(), [
            'format' => 'string',
        ]);

        if(auth()->user()->type_user == "admin" || auth()->user()->type_user == "client" || auth()->user()->type_user == "academic-manager"){

            // CSV
            if($request->format && $request->format == 'csv'){
                $fileName = 'matters.csv';

                $headers = [
                    'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0',
                    'Content-type'        => 'text/csv',
                    "Content-Disposition" => "attachment; filename=$fileName",
                    'Expires'             => '0',
                    'Pragma'              => 'public'
                ];

                $matters = Matter::all();
                $columns = array('id', "name", "academic_manager_id", "teacher_id", "created_at", "updated_at");

                $callback = function() use($matters, $columns) {
                    $file = fopen('php://output', 'w');
                    fputcsv($file, $columns, '|');

                    foreach ($matters as $matter) {
                        $row['id']  = $matter->id;
                        $row['name']    = $matter->name;
                        $row['academic_manager_id']    = $matter->academic_manager_id;
                        $row['teacher_id']    = $matter->teacher_id;
                        $row['created_at']  = $matter->created_at;
                        $row['updated_at']  = $matter->updated_at;

                        fputcsv($file, array($row['id'], $row['name'], $row['academic_manager_id'], $row['teacher_id'], $row['created_at'], $row['updated_at']), '|');
                    }
                    fclose($file);
                };

                // Add log in database
                Log::addToLog('Export Log', $request, 'CSV Export');
                return response()->stream($callback, 200, $headers);
            }

            //JSON
            if( $request->format && $request->format == 'json' ){
                $matters = Matter::all();
                Log::addToLog('Export Log', $request, 'JSON Export');

                return $matters->toJson();
            }

            $matters = MatterResource::collection(Matter::paginate(30));
            return $matters;
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
     * Display the specified Matter resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return new UserResource($user);
        if(auth()->user()->type_user == 'admin' || auth()->user()->type_user == 'academic-manager' || auth()->user()->type_user == 'teacher'){

            if(Matter::where('id', $id)->first()){
                return Matter::where('id', $id)->first();
            }

            return response([
                'message' => "Matter not found",
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
