<?php

namespace App\Http\Controllers;

use App\Imports\EvaluasiImport;
use App\Models\Materi;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MateriController extends Controller
{
    public function index()
    {
        //
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {

        // ddd($request);
        $validateData = $request->validate([
            'nama' => 'required',
            'materi_tunanetra' => 'file|max:10240',
            'materi_slow_lerning' => 'file|max:10240',
            'materi_tunarungu' => 'required',
            'matakuliah_id' => 'required'
        ]);


        if ($request->file('materi_tunanetra') && $request->file('materi_slow_lerning')) {
            $validateData['materi_tunanetra'] = $request->file('materi_tunanetra')->store('materi');
            $validateData['materi_slow_lerning'] = $request->file('materi_slow_lerning')->store('materi');
        }

        $file = $request->file('evaluasi');
        $nameFile = $file->getClientOriginalName();
        $file->move('import', $nameFile);

        // Save materi ke database
        $materi = Materi::create($validateData);
        $materi_id = $materi['id'];



        Excel::import(new EvaluasiImport($materi_id), public_path('/import/' . $nameFile));
        return redirect('/admin/materi')->with('success', 'Materi Berhasil di Tambah');
    }
    public function show(Materi $materi)
    {
        //
    }
    public function edit(Materi $materi)
    {
        //
    }
    public function update(Request $request, Materi $materi)
    {
        //
    }
    public function destroy(Materi $materi)
    {
        //
    }
}
