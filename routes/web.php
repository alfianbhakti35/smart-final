<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dosen\DosenController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\Mahasiswa\MahasiswaController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\ProdiController;
use Illuminate\Support\Facades\Route;
use PhpOffice\PhpSpreadsheet\RichText\Run;

// Halaman Utama website
Route::get('/', function () {
    return view('welcome');
});

// Route Halaman Login User
Route::get('/login', [AuthController::class, 'index'])->middleware('guest');
Route::post('/autentikasi', [AuthController::class, 'autentikasi']);
Route::get('/cek', [AuthController::class, 'cek']);
Route::post('/logout', [AuthController::class, 'logout']);

// Route Untuk Admin
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/admin/mahasiswa', [AdminController::class, 'mahasiswa']);
Route::post('/admin/importmahasiswa', [AdminController::class, 'importMahasiswa']);
Route::get('/admin/formatinfortmahasiswa', [AdminController::class, 'downloadMhs']);
Route::get('/admin/fakultas', [AdminController::class, 'fakultas']);
Route::post('/admin/addfakultas', [FacultyController::class, 'store']);
Route::get('/admin/prodi', [AdminController::class, 'prodi']);
Route::post('/admin/addprodi', [ProdiController::class, 'store']);
Route::get('/admin/matakuliah', [AdminController::class, 'matakuliah']);
Route::post('/admin/addmatakuliah', [MataKuliahController::class, 'store']);
Route::get('/admin/materi', [AdminController::class, 'materi']);
Route::post('/admin/addmateri', [MateriController::class, 'store']);
Route::get('/admin/dosen', [AdminController::class, 'dosen']);
Route::post('/admin/adddosen', [AdminController::class, 'storeDosen']);


// Route untuk Mahasiswa
Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
Route::get('/mahasiswa/smester1', [MahasiswaController::class, 'smester1']);
Route::get('/mahasiswa/smester2', [MahasiswaController::class, 'smester2']);
Route::get('/mahasiswa/smester3', [MahasiswaController::class, 'smester3']);
Route::get('/mahasiswa/smester4', [MahasiswaController::class, 'smester4']);
Route::get('/mahasiswa/smester5', [MahasiswaController::class, 'smester5']);
Route::get('/mahasiswa/smester6', [MahasiswaController::class, 'smester6']);
Route::get('/mahasiswa/smester7', [MahasiswaController::class, 'smester7']);
Route::get('/mahasiswa/smester8', [MahasiswaController::class, 'smester8']);
Route::get('/mahasiswa/materi/{id}', [MahasiswaController::class, 'showmateri']);
// Manampilkan Materi SlowLearning
Route::get('/mahasiswa/slow/{id}', [MahasiswaController::class, 'slow']);
// Menampilkan Materi Tunanetra
Route::get('/mahasiswa/tunanetra/{id}', [MahasiswaController::class, 'tunanetra']);
// Menampilkan Materi Tunarungu
Route::get('/mahasiswa/tunarungu/{id}', [MahasiswaController::class, 'tunarungu']);
// Menampilkan Soal Evaluasi
Route::get('/mahasiswa/evaluasi/{id}', [MahasiswaController::class, 'evaluasi']);
// Cek Hasil Evaluasi
Route::post('/mahasiswa/cekevaluasi', [MahasiswaController::class, 'cekhasilevaluasi']);



// Route untuk Dosen
Route::get('/dosen', [DosenController::class, 'index']);
Route::get('/dosen/materi', [DosenController::class, 'materi']);
