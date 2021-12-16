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

        return redirect('/admin/prodi')->with('toast_success', 'Prodi Berhasil di Tambah');
    }
    public function show(Prodi $prodi)
    {
        //
    }
    public function edit(Prodi $prodi)
    {
        //
    }
    public function update(Request $request)
    {
        Prodi::where('id', $request['id'])->update([
            'nama' => $request['nama'],
            'fakultas_id' => $request['fakultas_id']
        ]);

        return redirect()->back()->with('toast_success', 'Data Prodi Berhasil di Ubah');
    }
    public function destroy($id)
    {
        Prodi::where('id', $id)->delete();
        return redirect()->back()->with('toast_success', 'Data berhasil dihapus');
    }
}
