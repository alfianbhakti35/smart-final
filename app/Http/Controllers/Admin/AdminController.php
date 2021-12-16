<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Imports\EvaluasiImport;
use App\Imports\UsersImport;
use App\Models\Faculty;
use App\Models\MataKuliah;
use App\Models\Materi;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

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
            'prodi' => Prodi::all(),
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

    public function hapusUser($id)
    {
        User::where('id', $id)->delete();

        Alert::success('Berhasil', 'Data Berhasil Dihapus !');

        return redirect()->back();
    }

    public function editMahasiswaView($id)
    {
        $mhs = User::findOrFail($id);
        return view('admin.editmahasiswa', [
            'title' => 'Edit Mahasiwa',
            'mhs' => $mhs
        ]);
    }

    public function simpanEditMahasiswa(Request $request)
    {
        User::where('id', $request['id'])->update([
            'nama' => $request['nama'],
            'nim' => $request['nim']
        ]);

        return redirect('/admin/mahasiswa')->with('toast_success', 'Data Mahasiswa Berhasil di Ubah');
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
        return redirect('/admin/dosen')->with('toast_success', 'Dosen Berhasil di Tambah');
    }

    public function editDosenView()
    {
    }

    public function resetPassword($id)
    {
        $user = User::findOrFail($id);
        $password = Hash::make($user->nim);

        User::where('id', $user->id)->update([
            'username' => $user->nim,
            'password' => $password,
        ]);

        return redirect('/admin/mahasiswa')->with('toast_success', 'Reset password berhasil');
    }

    public function resetPasswordDosen($id)
    {
        $user = User::findOrFail($id);
        $password = Hash::make($user->username);

        User::where('id', $user->id)->update([
            'username' => $user->username,
            'password' => $password,
        ]);

        return redirect('/admin/dosen')->with('toast_success', 'Reset password berhasil');
    }

    public function addMateriByDosen(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required',
            'materi_tunanetra' => ['required', 'file', 'max:100'],
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

    // Ganti Password
    public function gantiPassword(Request $request)
    {
        $id = $request['id'];
        $password = Hash::make($request['password']);

        User::where('id', $id)->update([
            'password' => $password
        ]);

        return redirect()->back()->with('toast_success', 'Password Berhasil diganti');
    }

    // Download Format import soal
    public function downloadFormatSoal()
    {
        return response()->download(public_path('/files/format/Format Soal Evaluasi.xlsx'));
    }

    // Tambah data per mahasiswa
    public function tambahMahasiswa(Request $request)
    {
        $request->validate([
            'nama' => ['required'],
            'nim' => ['required'],
            'prodi_id' => ['required']
        ]);

        $password = Hash::make($request->nim);

        User::create([
            'nama' => $request->nama,
            'username' => $request->nim,
            'password' => $password,
            'nim' => $request->nim,
            'level' => 'mahasiswa',
            'prodi_id' => $request->prodi_id
        ]);

        return redirect()->back()->with('toast_success', 'Mahasiswa Berhasil Ditambah');
    }
}
