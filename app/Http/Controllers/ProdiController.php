<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
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
            'fakultas_id' => 'required'
        ]);

        // dd($validateData);

        Prodi::create($validateData);

        return redirect('/admin/prodi')->with('success', 'Prodi Berhasil di Tambah');
    }
    public function show(Prodi $prodi)
    {
        //
    }
    public function edit(Prodi $prodi)
    {
        //
    }
    public function update(Request $request, Prodi $prodi)
    {
        //
    }
    public function destroy(Prodi $prodi)
    {
        //
    }
}
