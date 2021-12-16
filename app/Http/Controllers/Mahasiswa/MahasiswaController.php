<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Evaluasi;
use App\Models\HasilEvaluasi;
use App\Models\MataKuliah;
use App\Models\Materi;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    public function index()
    {
        $prodi = Prodi::all();
        $matakuliah = count(MataKuliah::all());
        $materi = count(Materi::all());
        return view('mahasiswa.index', [
            'title' => 'Dashboard',
            'evaluasi' => '',
            'prodi' => $prodi,
            'matakuliah' => $matakuliah,
            'materi' => $materi
        ]);
    }

    public function smester1()
    {
        $prodi_id = Auth::user()->prodi_id;
        $matakuliah = MataKuliah::where([
            ['semester', 1],
            ['prodi_id', $prodi_id]
        ])->get();

        return view('mahasiswa.matakuliah', [
            'title' => 'Materi Semester 1',
            'evaluasi' => '',
            'matakuliah' => $matakuliah,
            'dosen' => User::all()
        ]);
    }

    // Semester 2
    public function smester2()
    {
        $prodi_id = Auth::user()->prodi_id;
        $matakuliah = MataKuliah::where([
            ['semester', 2],
            ['prodi_id', $prodi_id]
        ])->get();

        return view('mahasiswa.matakuliah', [
            'title' => 'Materi Semester 2',
            'evaluasi' => '',
            'matakuliah' => $matakuliah,
            'dosen' => User::all()
        ]);
    }

    // Semester 3
    public function smester3()
    {
        $prodi_id = Auth::user()->prodi_id;
        $matakuliah = MataKuliah::where([
            ['semester', 3],
            ['prodi_id', $prodi_id]
        ])->get();

        return view('mahasiswa.matakuliah', [
            'title' => 'Materi Semester 3',
            'evaluasi' => '',
            'matakuliah' => $matakuliah,
            'dosen' => User::all()
        ]);
    }

    // Semester 4
    public function smester4()
    {
        $prodi_id = Auth::user()->prodi_id;
        $matakuliah = MataKuliah::where([
            ['semester', 4],
            ['prodi_id', $prodi_id]
        ])->get();

        return view('mahasiswa.matakuliah', [
            'title' => 'Materi Semester 4',
            'evaluasi' => '',
            'matakuliah' => $matakuliah,
            'dosen' => User::all()
        ]);
    }

    // Semester 5
    public function smester5()
    {
        $prodi_id = Auth::user()->prodi_id;
        $matakuliah = MataKuliah::where([
            ['semester', 5],
            ['prodi_id', $prodi_id]
        ])->get();

        return view('mahasiswa.matakuliah', [
            'title' => 'Materi Semester 5',
            'evaluasi' => '',
            'matakuliah' => $matakuliah,
            'dosen' => User::all()
        ]);
    }

    // Semester 6
    public function smester6()
    {
        $prodi_id = Auth::user()->prodi_id;
        $matakuliah = MataKuliah::where([
            ['semester', 6],
            ['prodi_id', $prodi_id]
        ])->get();

        return view('mahasiswa.matakuliah', [
            'title' => 'Materi Semester 6',
            'evaluasi' => '',
            'matakuliah' => $matakuliah,
            'dosen' => User::all()
        ]);
    }


    // Semseter 7
    public function smester7()
    {
        $prodi_id = Auth::user()->prodi_id;
        $matakuliah = MataKuliah::where([
            ['semester', 7],
            ['prodi_id', $prodi_id]
        ])->get();

        return view('mahasiswa.matakuliah', [
            'title' => 'Materi Semester 7',
            'evaluasi' => '',
            'matakuliah' => $matakuliah,
            'dosen' => User::all()
        ]);
    }

    //Semester 8
    public function smester8()
    {
        $prodi_id = Auth::user()->prodi_id;
        $matakuliah = MataKuliah::where([
            ['semester', 8],
            ['prodi_id', $prodi_id]
        ])->get();

        return view('mahasiswa.matakuliah', [
            'title' => 'Materi Semester 8',
            'evaluasi' => '',
            'matakuliah' => $matakuliah,
            'dosen' => User::all()
        ]);
    }

    public function showmateri($id)
    {
        $matakuliah = MataKuliah::where('id', $id)->get();
        $materi = Materi::where('matakuliah_id', $id)->get();
        return view('mahasiswa.materi', [
            'title' => '',
            'evaluasi' => '',
            'matakuliah' => $matakuliah,
            'materi' => $materi,
        ]);
    }

    // Menampilkan materi slow lerarning
    public function slow($id)
    {
        $file = Materi::where('id', $id)->pluck('materi_slow_lerning');
        $nama = Materi::where('id', $id)->pluck('nama');
        $judul = "Materi Slow Learning " . $nama[0];
        $pdf = $file[0];
        return view('mahasiswa.slow', [
            'title' => $judul,
            'evaluasi' => $id,
            'pdf' => $pdf,
        ]);
    }

    // Menampilkan materi Tunanetra
    public function tunanetra($id)
    {
        $file = Materi::where('id', $id)->pluck('materi_tunanetra');
        $nama = Materi::where('id', $id)->pluck('nama');
        $judul = "Materi Tunanetra " . $nama[0];
        $mp3 = $file[0];
        return view('mahasiswa.tunanetra', [
            'title' => $judul,
            'evaluasi' => $id,
            'mp3' => $mp3,
        ]);
    }

    // Menampilkan materi Tunarungu
    public function tunarungu($id)
    {
        $vidio = Materi::where('id', $id)->pluck('materi_tunarungu');
        $nama = Materi::where('id', $id)->pluck('nama');
        $judul = "Materi Tunarungu " . $nama[0];
        return view('mahasiswa.tunarungu', [
            'title' => $judul,
            'evaluasi' => $id,
            'vidio' => $vidio,
        ]);
    }

    // Menampilkan Soal Evaluasi
    public function evaluasi($id)
    {
        $soal = Evaluasi::where('materi_id', $id)->get();
        return view('mahasiswa.evaluasi', [
            'title' => 'Jawab Evaluasi',
            'evaluasi' => '',
            'soal' => $soal,
            'materi_id' => $id
        ]);
    }

    // Cek Hasil Evaluasi
    public function cekhasilevaluasi(Request $request)
    {
        $materi_id = $request['materi_id'];
        $nilai = 0;

        $jml = count($request->input()) - 2;

        for ($x = 1; $x <= $jml; $x++) {
            $nilai += $request["{$x}"];
        }

        $nilaitotal = ($nilai * 100) / $jml;
        $pembulatan = round($nilaitotal);
        $mhsID = Auth::user()->id;

        // Simpan Nilai ke database
        HasilEvaluasi::create([
            'mahasiswa_id' => $mhsID,
            'materi_id' => $materi_id,
            'nilai' => $pembulatan
        ]);

        // Return view ke tampilan hasil nilai
        return view('mahasiswa.hasilevaluasi', [
            'title' => 'Hasil Evaluasi',
            'evaluasi' => '',
            'nilai' => $pembulatan
        ]);
    }

    public function listHasilEvaluasi()
    {
        $mhsID = Auth::user()->id;
        $hasilEvaluasi = HasilEvaluasi::where('mahasiswa_id', $mhsID)->get();

        dd($hasilEvaluasi);
    }

    public function keritikDanSaran()
    {
        return view('mahasiswa.keritik', [
            'title' => 'Keritik dan Saran',
            'evaluasi' => '',
        ]);
    }
}
