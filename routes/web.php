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
Route::get('/login', [AuthController::class, 'index'])->middleware('guest')->name('login');
Route::post('/autentikasi', [AuthController::class, 'autentikasi']);
Route::get('/cek', [AuthController::class, 'cek']);
Route::post('/logout', [AuthController::class, 'logout']);

// Route Untuk Admin
Route::group(['middleware' => ['auth', 'cek_login:admin']], function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/mahasiswa', [AdminController::class, 'mahasiswa']);
    Route::get('/admin/user/hapus/{id}', [AdminController::class, 'hapusUser']);
    Route::get('admin/mahasiswa/edit/{id}', [AdminController::class, 'editMahasiswaView']);
    Route::post('/admin/mahasiswa/edit/simpan', [AdminController::class, 'simpanEditMahasiswa']);
    Route::post('/admin/importmahasiswa', [AdminController::class, 'importMahasiswa']);
    Route::get('/admin/formatinfortmahasiswa', [AdminController::class, 'downloadMhs']);
    Route::get('/admin/fakultas', [AdminController::class, 'fakultas']);
    Route::post('/admin/addfakultas', [FacultyController::class, 'store']);
    Route::post('/admin/editfakultas', [FacultyController::class, 'update']);
    Route::get('/admin/fakultas/hapus/{id}', [FacultyController::class, 'destroy']);
    Route::get('/admin/prodi', [AdminController::class, 'prodi']);
    Route::post('/admin/addprodi', [ProdiController::class, 'store']);
    Route::post('/admin/editprodi', [ProdiController::class, 'update']);
    Route::get('/admin/prodi/hapus/{id}', [ProdiController::class, 'destroy']);
    Route::get('/admin/matakuliah', [AdminController::class, 'matakuliah']);
    Route::post('/admin/addmatakuliah', [MataKuliahController::class, 'store']);
    Route::get('/admin/matakuliah/hapus/{id}', [MataKuliahController::class, 'destroy']);
    Route::get('/admin/materi', [AdminController::class, 'materi']);
    Route::post('/admin/addmateri', [MateriController::class, 'store']);
    Route::get('/admin/materi/hapus/{id}', [MateriController::class, 'destroy']);
    Route::get('/admin/dosen', [AdminController::class, 'dosen']);
    Route::post('/admin/adddosen', [AdminController::class, 'storeDosen']);
    Route::get('/admin/dosen/edit/{id}', [AdminController::class, 'editDosenView']);
    Route::get('/admin/user/reset/{id}', [AdminController::class, 'resetPassword']);
    Route::get('/admin/dosen/reset/{id}', [AdminController::class, 'resetPasswordDosen']);
    Route::post('/admin/gantipassword', [AdminController::class, 'gantiPassword']);
    Route::get('/admin/formatsoal', [AdminController::class, 'downloadFormatSoal']);
    Route::post('/admin/addmahasiswa', [AdminController::class, 'tambahMahasiswa']);
});

// Route untuk Mahasiswa
Route::group(['middleware' => ['auth', 'cek_login:mahasiswa']], function () {
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
    Route::get('/mahasiswa/listevaluasi', [MahasiswaController::class, 'listHasilEvaluasi']);
    Route::get('/mahasiswa/kritikdansaran', [MahasiswaController::class, 'keritikDanSaran']);
});

// Route untuk Dosen
Route::group(['middleware' => ['auth', 'cek_login:dosen']], function () {
    Route::get('/dosen', [DosenController::class, 'index']);
    Route::get('/dosen/materi', [DosenController::class, 'materi']);
    Route::post('/dosen/materi', [MateriController::class, 'store']);
    Route::get('/dosen/materi/hapus/{id}', [MateriController::class, 'destroy']);
    Route::get('/dosen/evaluasi', [DosenController::class, 'evalusasi']);
    Route::post('/dosen/addmateri', [DosenController::class, 'addMateri']);
});
