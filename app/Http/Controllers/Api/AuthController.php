<?php

namespace App\Http\Controllers\Api;

use App\Data\UserType;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'message' => 'Invalid data provided!'], 422);
        } else {
            $credentials = [
                'email' => $request->email,
                'password' => $request->password,
            ];
            if (auth()->attempt($credentials)) {
                $token = auth()->user()->createToken('blog@2022!')->accessToken;
                return response()->json(['message' => 'Login successful', 'token' => $token, 'user' => auth()->user()], 200);
            }
            return response()->json(['message' => 'Invalid Credentials','errors' => ["credentials" => ["Invalid credentials provided!!"]]], 401);
        }
    }

    public function logout(Request $request)
    {
//        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out',
        ], 204);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'email' => ['required', 'unique:users'],
            'phone_number' => ['unique:users'],
            'password' => ['required', 'min:8'],
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'message' => 'Invalid data provided!'], 422);
        }
        $request['password'] = Hash::make($request->password);
        $request['user_type_id'] = UserType::where('key', 'blogger')->value('id');
        User::create($request->only('name', 'email', 'phone_number', 'password', 'user_type_id'));
        return response()->json([
            'message' => 'User created successfully',
        ], 200);
    }
}
