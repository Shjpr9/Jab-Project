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
        $credentials = Validator::make($request->all(), [
            'email' => 'bail|required|email|unique:users',
            'username' => 'bail|required|unique:users|min:5|alpha_num:ascii',
            'password' => 'min:8|required',
            'phone' => 'required|numeric|digits:11'
        ])->validate();

        User::create([
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'username' => $request->get('username'),
            'phone' => $request->get('phone'),
            'remember_token' => Str::random(10),
        ]);
        return redirect('/login')->with('successSignup', true);
    }

    public function index(Request $request) {
        return $request;
    }
}
