<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function autentikasi(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->level === 'admin') {
                return redirect()->intended('/admin');
            }

            if ($user->level === 'mahasiswa') {
                return redirect()->intended('/mahasiswa');
            }

            if ($user->level === 'dosen') {
                return redirect()->intended('/dosen');
            }
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }

    public function cek()
    {
        $user = Auth::user();

        if ($user->level === 'admin') {
            return redirect()->intended('/admin');
        }

        if ($user->level === 'mahasiswa') {
            return redirect()->intended('/mahasiswa');
        }

        if ($user->level === 'dosen') {
            return redirect()->intended('/dosen');
        }
    }
}
