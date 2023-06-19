<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login()
    {
        if (Auth::check()) {
            return redirect('main');
        }
        return view('auth.login');
    }

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('main');
        }
        else {
            return back()
                ->withInput($request->only('email'))
                ->withErrors(['email' => 'Nieprawidłowy login lub hasło.']);
        }

        // if (Auth::guard('clients')->attempt($credentials)) {
        //     $request->session()->regenerate();
        //     // return redirect()->route('main');
        //     return redirect('main');
        // }

        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();

        //     if (Auth::clients()->isAdmin()) {
        //         return redirect()->route('main.admin');
        //     } else {
        //         return redirect()->route('main.user');
        //     }
        // }


    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('main');
    }
}
