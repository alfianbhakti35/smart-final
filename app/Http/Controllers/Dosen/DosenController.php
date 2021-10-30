<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\MataKuliah;
use App\Models\Materi;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        return view('dosen.index', [
            'title' => 'Dashboard'
        ]);
    }

    // View Fitur Materi
    public function materi()
    {
        return view('dosen.materi', [
            'title' => 'Materi',
            'data' => Materi::all(),
            'matakuliah' => MataKuliah::all()
        ]);
    }
}
