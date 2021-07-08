<?php

namespace App\Http\Controllers;

use App\Http\Middleware\TrustProxies;
use App\Models\Assigned;
use App\Models\Profile;
use App\Models\School;
use App\Models\User;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    var $token_result;
    var $message;
    public function index()
    {
        //
        return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

    public function login(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
            'device_name' => 'required',
        ]);

        if ($validated->fails()) {
            $this->message['errors'] = $validated->errors();
            $this->message['message'] = 'Something went wrong in validation, Try again';
            $this->message['success'] = false;
            goto end;
        }

        if (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            $user = User::where('email', $request->username)->first();
        } else {
            $user = User::where('phone', $request->username)->first();
        }

        if (!isset($user)) {
            $this->message['success'] = false;
            $this->message['message'] = 'Credentials did not match';
        }

        if (!$user || !Hash::check($request->password, $user->password)) {
            $this->message['success'] = false;
            $this->message['message'] = 'Something went wrong we couldn\'t find your records or password is not correct';
        }else{
            $this->token_result = $user->createToken($request->device_name)->plainTextToken;
            $this->message['success'] = true;
        }

        end:
        return response()->json([
            'message' => $this->message,
            'access_token' => $this->token_result,
            'token_type' => 'Bearer',
        ]);
    }

    public function register(Request $request)
    {
        $validated = Validator::make($request->only(['name', 'email', 'phone', 'password', 'device_name', 'activation_code', 'type']), [
            'name' => 'required|max:250',
            'email' => 'email|unique:users',
            'password' => 'required|min:4',
            'phone' => [ 'required', 'string', 'min:10', 'unique:users' ],
            'device_name' => 'required|max:50',
            'activation_code' => 'nullable',
            'type' => 'required',
        ]);

        if ($validated->fails()) {
            $this->message['message'] = 'Something went wrong with data input';
            $this->message['errors'] = $validated->errors();
            $this->message['success'] = false;
            goto end;
        }

        if ($request->type === 'user') {
            DB::transaction(function () use ($request) {
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'phone' => $request->phone,
                ]);

                $profile = new Profile([
                    'user_id' => $user->id
                ]);
                $user->profile()->save($profile);
                $user->assignRole('normal-user');
                $this->token_result = $user->createToken($request->device_name)->plainTextToken;
                $this->message['success'] = true;
            });
        } elseif ($request->type === 'school') {
            $school = School::where('activation_code', $request->activation_code)->first();
            if (!empty($school)) {
                DB::transaction(function () use ($request, $school) {
                    $user = User::create([
                        'name' => $request->name,
                        'email' => $request->email,
                        'password' => Hash::make($request->password),
                        'phone' => $request->phone,
                    ]);

                    $profile = new Profile([
                        'user_id' => $user->id
                    ]);
                    $saved = $user->profile()->save($profile);
                    $assigned = new Assigned([
                        'user_id'=>$user->id
                    ]);
                    $associate = $assigned->assignable()->associate($school)->save();
                    $school->update([
                        'activation_code_status' => false
                    ]);
                    $user->assignRole('teacher');
                    if ($associate) {
                        $this->token_result = $user->createToken($request->device_name)->plainTextToken;
                        $this->message['success'] = true;
                    }
                });
            } else {
                $this->message['errors'] = ['Activativation code is not found'];
                $this->message['success'] = false;
            }
        } elseif($request->type === 'ward'){
            $ward = Ward::where('activation_code', $request->activation_code)->first();
            if (!empty($ward)) {
                DB::transaction(function () use ($request, $ward) {
                    $user = User::create([
                        'name' => $request->name,
                        'email' => $request->email,
                        'password' => Hash::make($request->password),
                        'phone' => $request->phone,
                    ]);

                    $profile = new Profile([
                        'user_id' => $user->id
                    ]);
                    $saved = $user->profile()->save($profile);
                    $assigned = new Assigned([
                        'user_id' => $user->id
                    ]);
                    $associate = $assigned->assignable()->associate($ward)->save();
                    $ward->update([
                        'activation_status' => true
                    ]);
                    $user->assignRole('ward');
                    if ($associate) {
                        $this->token_result = $user->createToken($request->device_name)->plainTextToken;
                        $this->message['success'] = true;
                    }
                });
            } else {
                $this->message['errors'] = ['Activativation code is not found'];
                $this->message['success'] = false;
            }
        }
        end:
        return response()->json([
            'message' => $this->message,
            'access_token' => $this->token_result,
            'token_type' => 'Bearer',
        ]);
    }
}
