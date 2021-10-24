<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    public function index()
    {
        $jumlahUser = User::all()->count();
        $namaProdi = '';

        $prodi = Prodi::all();
        foreach ($prodi as $p) {
            if (Auth::user()->prodi === $p['id']) {
                $namaProdi = $p['nama'];
            }
        }


        return view('mahasiswa.index', [
            'prodi' => $namaProdi
        ]);
    }

    public function smester1()
    {
        return view('mahasiswa.matakuliah', [
            'title' => 'Smester 1'
        ]);
    }
}
