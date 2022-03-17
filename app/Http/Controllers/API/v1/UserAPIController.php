<?php

namespace App\Http\Controllers\API\v1;

use App\Log;
use Mail;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Teacher;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\API\v1\UserAPIRequest;

use App\Http\Resources\API\v1\UserResource;

/**
 * @group Users
 *
 * API endpoints for managing app Users. Actions on this resource is only allow to 'Admin' and 'Client' users.
 */
class UserAPIController extends Controller
{ 
    public function __construct() {
        // $this->middleware('auth:api', ['except' => ['login', 'register']]);
        $this->middleware('auth:api');
    }

    /**
     * Display or send a listing of the Users resource.
     * <p> https://api.test/api/v1/users </p>
     * Allow autorised user to get listing of Users resource.
     *
     * <h3>Get linsting of Users resource in specifique format:</h3>
     * <p> https://api.test/api/v1/users?format=value </p>
     * <strong>format</strong> parmeter can have as value <strong>json</strong> or <strong>csv</strong>.
     *
     * <h3>Additional functionnalities:</h3>
     * With this endpoint, you can chain multiple parameters on URI to make filter on Users resource retrive from database.
     * So If you want the User resources which contain name like <strong>luc</strong> you have to use the parameters name:
     *
     * <strong style="text-decoration:underline">Ex:</strong>
     * <span> https://api.test/api/v1/users?name=luc </span>
     *
     * <strong style="text-decoration:underline">Note:</strong> This filter is only allow for [<strong style="text-decoration:underline">name</strong>, <strong style="text-decoration:underline">type_user</strong>, <strong style="text-decoration:underline">email</strong>, <strong style="text-decoration:underline">valid</strong>] fields
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'format' => 'string',
        // ]);

        // $validated = $request->validate([
        //     'format' => [Rule::in(['json', 'csv'])],
        //     // 'type_user' => ['required', Rule::in(['admin', 'academic-manager', 'teacher','student-respo', 'client'])],
        //     // 'email' => 'required',
        //     // 'phone_number' => 'required',
        //     // 'description' => 'required',
        //     // 'valid' => 'required',
        //     // 'password' => 'required',
        // ]);

        // if(!auth()->user()){
        //     return response([
        //         'message' => "Unauthenticated, You must authenticate to access this operation",
        //     ], 401);
        // }

        if(auth()->user() && auth()->user()->type_user == 'admin' || auth()->user()->type_user == 'client'){

            //If name, type_user, email, valid
            if($request->name && $request->type_user && $request->valid){
                $users = UserResource::collection(User::where('name', 'like','%'.$request->name.'%')->where('type_user', 'like','%'.$request->type_user.'%')->where('valid', $request->valid)->paginate(30));
                return $users;
            }
            //If name, valid
            if($request->name && isset($request->valid)){
                $users = UserResource::collection(User::where('name', 'like','%'.$request->name.'%')->where('valid', $request->valid)->paginate(30));
                return $users;
            }
            if($request->name){
                $users = UserResource::collection(User::where('name', 'like','%'.$request->name.'%')->paginate(30));
                return $users;
            }
            if($request->type_user){
                $users = UserResource::collection(User::where('type_user', 'like','%'.$request->type_user.'%')->paginate(30));
                return $users;
            }
            if(isset($request->email)){
                $users = UserResource::collection(User::where('email', $request->email)->paginate(30));
                return $users;
            }
            if(isset($request->valid)){
                $users = UserResource::collection(User::where('valid', $request->valid)->paginate(30));
                return $users;
            }

            if( $request->format && $request->format == 'csv' ){
                //On peut formater le nom du fichier pour avoir la date dans le nom
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

                // Add log in database
                Log::addToLog('Export Log', $request, 'CSV Export');

                // Send Mail

                return response()->stream($callback, 200, $headers);
            }

            if( $request->format && $request->format == 'json' ){
                $users = User::all();

                // Add log in database
                Log::addToLog('Export Log', $request, 'JSON Export');

                // Send Mail

                return $users->toJson();
            }

            $users = UserResource::collection(User::paginate(30));
            return $users;
        }

        return response([
            'message' => "Unauthorized, You don't have access to this operation",
        ], 401);

    }

    /**
     * Store a newly created User resource in storage.
     *
     * The username must be two words (LastName FirstName) separate by space
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserAPIRequest $request)
    {
        if(auth()->user() && auth()->user()->type_user == 'admin'){

            $name = explode(' ', $request->name);
            if(count($name) != 2){
                return response([
                    'message' => "The name must contain just 2 words seperated by space",
                ], 400);
            }

            // Validation for body RAW
            // $validated = $request->all()->validate([
            //     'name' => 'required|unique:users|max:255',
            //     'sex' => ['required', Rule::in(['M','F'])],
            //     // 'type_user' => ['required', Rule::in(['admin', 'academic-manager', 'teacher','student-respo', 'client'])],
            //     // 'email' => 'required',
            //     // 'phone_number' => 'required',
            //     // 'description' => 'required',
            //     // 'valid' => 'required',
            //     // 'password' => 'required',
            // ]);

            // return $request->getContent();

            //Check if user already exist in user or teacher table (This is already done by )
            if(User::where('email', $request->email)->first() || Teacher::where('email', $request->email)->first()){
                return response([
                    'message' => "Unauthorised, The user already exist.",
                ], 401);
            }

            $user = User::create($request->all());

            // Add to logs
            Log::addToLog('New User created by '.auth()->user()->name, $request.' '.auth()->user()->email.'.', 'Create User');

            if($user->type_user == 'teacher'){

                $teacher = new Teacher;
                $teacher->last_name = $name[0];
                $teacher->first_name = $name[1];
                $teacher->gender = $request->sex;
                $teacher->email = $request->email;
                $teacher->phone_number = $request->phone_number;
                $teacher->description = $request->description;
                $teacher->user_id = $user->id;
                $teacher->save();

                // Add to logs
                Log::addToLog('New Teacher created by '.auth()->user()->name, $request.' '.auth()->user()->email.'.', 'Create Teacher');

                //Send mail compte creer et ajouter comme professeur

                return response()->json([
                    'success' => 'Utilisateur ajouter avec succès et ajouter dans la table Teacher'
                ], 200);
            }

            if ($user) {
                //Send mail compte creer et ajouter comme {{role}}

                return response()->json([
                    'success' => 'Utilisateur ajouter avec succès'
                ], 200);
            }

        }

        return response([
            'message' => "Unauthorized, You don't have access to this operation",
        ], 401);

    }

    /**
     * Display the specified User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //return new UserResource($user);
        if(auth()->user()->type_user == 'admin'){
            return new UserResource($user);
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
        //Create custom Requests (Requests/API/v1/update)
        // Validation for body FormRequest
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            // 'sex' => ['required', Rule::in(['M','F'])],
        ]);

        return 'ok';
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
