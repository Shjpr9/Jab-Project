<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ForgotPassController extends Controller
{
    public function forgot(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);

        DB::table('password_reset_tokens')->updateOrInsert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('email.forgetPassword', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return back()->with('message', 'لینک بازیابی گذرواژه برای شما ارسال شد!');
    }

    public function confirm($token) {
        if ($user = DB::table('password_reset_tokens')->where(['token' => $token])->first()) {
            $newPass = Str::random(12);
            User::where('email', $user->email)->update(['password' => Hash::make($newPass)]);
            return redirect()->route('reset')->with(['password' => $newPass]);
        } else 
            return back()->withErrors('لینک بازیابی نامعتبر است!');
        
    }
}
