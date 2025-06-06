<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.pages.login');
    }

    public function login_process()
    {
        request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        try {
            $credential = request()->only('email', 'password');
            if (auth()->attempt($credential)) {
                return redirect()->route('dashboard');
            }
            return back()->with('error', 'Email atau password salah');
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with('error', $th->getMessage());
        }
    }
}
