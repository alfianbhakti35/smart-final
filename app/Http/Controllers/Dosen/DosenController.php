<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Imports\EvaluasiImport;
use App\Models\Evaluasi;
use App\Models\HasilEvaluasi;
use App\Models\MataKuliah;
use App\Models\Materi;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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

    // View Evaluasi
    public function evalusasi()
    {
        return view('dosen.evaluasi', [
            'title' => 'Hasil Evaluasi',
            'mahasiswa' => User::all(),
            'materi' => Materi::all(),
            'evaluasi' => HasilEvaluasi::all(),
        ]);
    }

    // tambah materi
    public function addMateri(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required',
            'materi_tunanetra' => 'required',
            'materi_slow_lerning' => 'required',
            'materi_tunarungu' => 'required',
            'matakuliah_id' => 'required'
        ]);


        if ($request->file('materi_tunanetra') && $request->file('materi_slow_lerning')) {
            $validateData['materi_tunanetra'] = $request->file('materi_tunanetra')->store('materi');
            $validateData['materi_slow_lerning'] = $request->file('materi_slow_lerning')->store('materi');
            // dd($validateData);
        }

        $file = $request->file('evaluasi');
        $nameFile = $file->getClientOriginalName();
        $file->move('import', $nameFile);

        // Save materi ke database
        $materi = Materi::create($validateData);
        $materi_id = $materi['id'];

        Excel::import(new EvaluasiImport($materi_id), public_path('/import/' . $nameFile));
        return redirect('/dosen/materi')->with('toast_success', 'Materi Berhasil di Tambah');
    }
}
