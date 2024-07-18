<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Event\ResponseEvent;

class LoginController extends Controller
{

    public function apiLogin(Request $request)
    {

        $validator = Validator::make($request->only(['email', 'password']), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'ok' => false,
                'details' => $validator->errors()
            ]);
        }

        // Attempt to authenticate the user using the provided credentials
        if (Auth::attempt([
            'email' => $request->email, 'password' => $request->password
        ])) {
            return response()->json([
                'ok' => true,
                'message' => 'Login Successful!',
                'token' => Auth::user()->createToken('auth_token')->plainTextToken
            ]);
        }

        return response()->json([
            'ok' => false,
            'message' => 'Invalid Credentials'
        ]);
    }

    public function webLogin(Request $request)
    {
        $validator = Validator::make($request->only(['email', 'password']), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        // Attempt to authenticate the user using the provided credentials
        if (Auth::attempt([
            'email' => $request->email, 'password' => $request->password
        ])) {
            return redirect()->intended('/success');
        }

        return redirect()->back()->withErrors('Invalid Credentials');
    }
}
