<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
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
        $validateData = $request->validate([
            'nama' => 'required',
            'prodi_id' => 'required',
            'dosen_id' => 'required',
            'semester' => 'required'
        ]);


        MataKuliah::create($validateData);
        return redirect('/admin/matakuliah')->with('toast_success', 'Matakuliah Berhasil di Tambah');
    }
    public function show(MataKuliah $mataKuliah)
    {
        //
    }
    public function edit(MataKuliah $mataKuliah)
    {
        //
    }
    public function update(Request $request, MataKuliah $mataKuliah)
    {
        //
    }
    public function destroy($id)
    {
        MataKuliah::where('id', $id)->delete();
        return redirect()->back()->with('toast_success', 'Matakuliah berhasil dihapus');
    }
}
