<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class SignupController extends Controller
{
    public function signup(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'bail|required|email|unique:users',
            'username' => 'bail|required|unique:users|min:5|alpha_num:ascii',
            'password' => 'min:8|required',
            'phone' => 'required|numeric|digits:11'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'ok' => false,
                'message' => $validator->errors()
            ]);
        }

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'username' => $request->username,
            'phone' => $request->phone,
            'remember_token' => Str::random(10),
        ]);

        return response()->json([
            'ok' => true,
            'message' => 'User created successfully',
            'token' => $user->createToken($request->username)->plainTextToken
        ]);
    }

}
