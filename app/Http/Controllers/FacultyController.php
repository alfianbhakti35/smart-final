<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;

class FacultyController extends Controller
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
            'nama' => 'required'
        ]);

        Faculty::create($validateData);
        return redirect('/admin/fakultas')->with('toast_success', 'Fakultas Berhasil di Tambah');
    }
    public function show(Faculty $faculty)
    {
        //
    }
    public function edit(Faculty $faculty)
    {
        //
    }
    public function update(Request $request)
    {
        Faculty::where('id', $request['id'])->update([
            'nama' => $request['nama']
        ]);

        return redirect()->back()->with('toast_success', 'Data berhasil diubah');
    }
    public function destroy($id)
    {
        Faculty::where('id', $id)->delete();
        return redirect()->back()->with('toast_success', 'Data berhasil dihapus');
    }
}
