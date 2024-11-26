<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\ForgotPasswordMail;
use App\Http\Requests\ResetPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function forgot()
    {
        return view('forgot_pass');
    }

    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();

        // Generate a new token and save it
        if ($user) {
            $user->remember_token = Str::random(50);
            $user->save();

            Mail::to($user->email)->send(new ForgotPasswordMail($user));

            return redirect()->route('forgot')->with(
                'success',
                'Email has been sent to your Account'
            );
        } else {
            return redirect()->route('forgot')->withErrors([
                'email' => 'The provided credentials does not match our System',
            ]);;
        }
    }
    public function getReset($token)
    {
        if (Auth::check()) {
            return redirect()->route('product.view');
        }
        // dd($token);
        $user = User::where('remember_token', $token)->first();
        // if ($user->count() == 0)
        if (!$user) {

            return abort(403, 'Unauthorized action. Token may be invalid or expired.');
        }
        // $user = $user->first();
        $data['token'] = $token;

        return view('reset', $data);
    }

    public function postReset($token, ResetPassword $request)
    {

        $user = User::where('remember_token', $token);
        // if ($user->count() == 0)
        if (!$user) {
            abort(403);
        }

        $user = $user->first();
        $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(50);
        $user->save();
        return redirect()->route('view.login')->with('success', 'Password has been Reset');
    }
}
