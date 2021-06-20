<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
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
            return response()->json([
                'errors' => $validated->errors(),
                'message' => 'Something went wrong in validation, Try again'
            ]);
        }

        if (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            $user = User::where('email', $request->username)->first();
        } else {
            $user = User::where('phone', $request->username)->first();
        }

        if (!isset($user)) {
            return response()->json([
                'status_code' => 200,
                'message' => 'Credentials did not match',

            ]);
        }

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $tokenResult = $user->createToken($request->device_name)->plainTextToken;

        return response()->json([
            'status_code' => 200,
            'access_token' => $tokenResult,
            'token_type' => 'Bearer',
        ]);
    }

    public function register(Request $request)
    {
        $validated = Validator::make($request->only(['name', 'email', 'phone', 'password', 'device_name']), [
            'name' => 'required|max:250',
            'email' => 'email|unique:users',
            'password' => 'required|min:4',
            'phone' => 'required|min:10|unique:users',
            'device_name' => 'required|max:50',
        ], [
            'required' => 'Please input :attribute in the form',
            'max' => 'The :attribute entered exceeded allowed characters',
            'min' => ':attribute has low characters',
            'unique' => ':attribute entered already in use',
        ]);

        $tokenResult = '';

        if ($validated->fails()) {
            return response()->json([
                'errors' => $validated->errors(),
            ]);
        }

        DB::transaction(function () use ($request, $validated) {
            

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
            ]);

            Profile::create([
                'user_id' => $user->id
            ]);

            $this->tokenResult = $user->createToken($request->device_name)->plainTextToken;
        });

        return response()->json([
            'status' => 'success',
            'access_token' => $tokenResult,
            'token_type' => 'Bearer',
        ]);
    }
}
