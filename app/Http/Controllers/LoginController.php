<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Event\ResponseEvent;

class LoginController extends Controller
{

    public function authenticate(Request $request)
    {

        $credentials = Validator::make($request->only(['email', 'password']), [
            'email' => 'required|email',
            'password' => 'required'
        ])->validate();

        // $credentials = $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required'
        // ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('success');
        }

        return redirect('login')->withErrors('Login Failed! Username or password is incorrect.');
    }

    // public function index(Request $request) {
    //     return $request;
    // }
}
