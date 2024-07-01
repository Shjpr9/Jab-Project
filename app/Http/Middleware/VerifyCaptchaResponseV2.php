<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyCaptchaResponseV2
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $ch = curl_init("https://www.google.com/recaptcha/api/siteverify");
        curl_setopt_array($ch, [
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => ["secret" => env("CAPTCHA_SECRET"), "response" => $request->get("g-recaptcha-response")],
            CURLOPT_RETURNTRANSFER => true
        ]);

        $res = json_decode(curl_exec($ch), true);

        if (!$res["success"]) {

            switch ($res["error-codes"][0]) {
                case 'missing-input-secret':
                    $error_msg = "The secret parameter is missing";
                    break;

                case 'invalid-input-secret':
                    $error_msg = "The secret parameter is invalid or malformed";
                    break;

                case 'missing-input-response':
                    $error_msg = "The response parameter is missing";
                    break;

                case 'invalid-input-response':
                    $error_msg = "The response parameter is invalid or malformed";
                    break;

                case 'bad-request':
                    $error_msg = "The request is invalid or malformed";
                    break;

                case 'timeout-or-duplicate':
                    $error_msg = "The response is no longer valid: either is too old or has been used previously";
                    break;

                default:
                    $error_msg = "Something went wrong. Please try again";
                    break;
            }

            return redirect('/login')->withErrors(['captcha' => $error_msg]);
        }

        return $next($request);
    }
}
