<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\UsersImport;
use App\Models\Faculty;
use App\Models\MataKuliah;
use App\Models\Materi;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    public function index()
    {
        $jmlahMhs = count(User::where('level', 'mahasiswa')->get());
        $jmlahDosen = count(User::where('level', 'dosen')->get());
        $jmlProdi = count(Prodi::all());
        $jmlFakultas = count(Faculty::all());

        return view('admin.index', [
            'title' => 'Dashboard',
            'mahasiswa' => $jmlahMhs,
            'dosen' => $jmlahDosen,
            'prodi' => $jmlProdi,
            'fakultas' => $jmlFakultas
        ]);
    }

    // Fitur Mahasiswa
    public function mahasiswa()
    {
        return view('admin.mahasiswa', [
            'title' => 'Mahasiswa',
            'data' => User::all()
        ]);
    }

    public function importMahasiswa(Request $request)
    {
        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('import', $nameFile);

        // dd($nameFile);

        Excel::import(new UsersImport, public_path('/import/' . $nameFile));
        return redirect('/admin/mahasiswa');
    }

    public function downloadMhs()
    {
        return response()->download(public_path('/files/format/Format Import Mahasiswa.xlsx'));
    }

    // View Fitur Fakultas
    public function fakultas()
    {
        return view('admin.fakultas', [
            'title' => 'Fakultas',
            'data' => Faculty::all()
        ]);
    }

    // View Fitur Prodi
    public function prodi()
    {
        return view('admin.prodi', [
            'title' => 'Prodi',
            'data' => Prodi::all(),
            'fakultas' => Faculty::all()
        ]);
    }

    // View Fitur Matakuliah
    public function matakuliah()
    {
        $prodi = Prodi::all();

        return view('admin.matakuliah', [
            'title' => 'Matakuliah',
            'data' => MataKuliah::all(),
            'prodi' => Prodi::all(),
            'dosen' => User::all()
        ]);
    }

    // View Fitur Materi
    public function materi()
    {
        return view('admin.materi', [
            'title' => 'Materi',
            'data' => Materi::all(),
            'matakuliah' => MataKuliah::all()
        ]);
    }

    // View Fitur Dosen
    public function dosen()
    {

        return view('admin.dosen', [
            'title' => 'Dosen',
            'data' => User::all(),
            'prodi' => Prodi::all()
        ]);
    }

    // Create Dosen
    public function storeDosen(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'nim' => 'required',
            'prodi_id' => 'required',
        ]);

        $data['level'] = 'dosen';
        $data['password'] = Hash::make($data['username']);

        User::create($data);
        return redirect('/admin/dosen')->with('success', 'Prodi Berhasil di Tambah');
    }
}
