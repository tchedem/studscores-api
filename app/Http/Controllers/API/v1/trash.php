<?php

namespace App\Http\Controllers\API\v1;

use App\Log;
use Validator;
use App\Models\Matter;
use App\Http\Resources\API\v1\MatterResource;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

                $scores = Score::all();
                $columns = array('id', "name", "academic_manager_id", "teacher_id", "created_at", "updated_at");

                $callback = function() use($scores, $columns) {
                    $file = fopen('php://output', 'w');
                    fputcsv($file, $columns, '|');

                    foreach ($scores as $score) {
                        $row['id']  = $score->id;
                        $row['name']    = $score->name;
                        $row['academic_manager_id']    = $score->academic_manager_id;
                        $row['teacher_id']    = $score->teacher_id;
                        $row['created_at']  = $score->created_at;
                        $row['updated_at']  = $score->updated_at;

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
                $scores = Score::all();
                Log::addToLog('Export Log', $request, 'JSON Export');

                return $scores->toJson();
            }

            $scores = ScoreResource::collection(Score::paginate(30));
            return $scores;
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
     * Display the specified Score resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(auth()->user()->type_user == 'admin' || auth()->user()->type_user == 'academic-manager' || auth()->user()->type_user == 'teacher'){

            if(Score::where('id', $id)->first()){
                return Score::where('id', $id)->first();
            }

            return response([
                'message' => "Score not found",
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
