<?php

namespace App\Http\Controllers\API\v1;

use App\Log;
use Validator;
use App\Models\Score;
use App\Http\Resources\API\v1\ScoreResource;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @group Scores
 *
 * API endpoints for managing app Scores. Actions on this resource is only allow to 'Admin' and 'Client' users.
 */
class ScoreAPIController extends Controller
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
                $columns = array('id', "score", "student_matricule", "student_id", "matter_id", "teacher_id", "year", "comment", "created_at", "updated_at");

                $callback = function() use($scores, $columns) {
                    $file = fopen('php://output', 'w');
                    fputcsv($file, $columns, '|');

                    foreach ($scores as $score) {
                        $row['id']  = $score->id;
                        $row['score']    = $score->score;
                        $row['student_matricule']    = $score->student_matricule;
                        $row['matter_id']    = $score->matter_id;
                        $row['teacher_id']    = $score->teacher_id;
                        $row['year']    = $score->year;
                        $row['comment']    = $score->comment;
                        $row['created_at']  = $score->created_at;
                        $row['updated_at']  = $score->updated_at;

                        fputcsv($file, array($row['id'], $row['score'], $row['student_matricule'], $row['matter_id'], $row['teacher_id'], $row['year'], $row['comment'], $row['created_at'], $row['updated_at']), '|');
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
