<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\FakultasUniv;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required'
        ]);

        FakultasUniv::create($validateData);
        return redirect('/admin/fakultas')->with('toast_success', 'Fakultas Berhasil di Tambah');
    }

    public function update(Request $request)
    {
        FakultasUniv::where('id', $request['id'])->update([
            'nama' => $request['nama']
        ]);

        return redirect()->back()->with('toast_success', 'Data berhasil diubah');
    }
    public function destroy($id)
    {
        FakultasUniv::where('id', $id)->delete();
        return redirect()->back()->with('toast_success', 'Data berhasil dihapus');
    }
}
