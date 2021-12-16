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

        return back()->with('toast_error', 'Username atau Password Salah');
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

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
