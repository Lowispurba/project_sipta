<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mahasiswacontroller;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\TugasAkhirController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\AdminNotifikasiController;
use App\Http\Controllers\LoginController;

Route::get('/login', [LoginController::class, 'login']);

Route::get('/register', function () {
    return view('pages.register');
});
Route::get('/dosen', function () {
    return view('dosen');
});
Route::get('/mahasiswas', function () {
    return view('mahasiswa');
});
Route::get('/ruangan', function () {
    return view('ruangan');
});
Route::get('/TugasAkhir', function () {
    return view('tugas_akhirs');
});
Route::get('/jadwal', function () {
    return view('jadwal');
});
Route::get('/penilaian', function () {
    return view('penilaian');
});
Route::get('/dokumen', function () {
    return view('dokumen');
});
Route::get('/notifikasi', function () {
    return view('notifikasi');
});

Route::get('/', function () {
    return view('landingpage');
});

Route::get('/layout', function () {
    return view('layout.template');
});

/* Route::get('/', function () {
    return view('dosen.layout.template');
}); */


//route dosen
Route::resource('dosen', DosenController::class);
Route::get('/dosen/create', [DosenController::class, 'create'])->name('dosen.create');
Route::get('/dosen/{id}/edit', 'DosenController@edit')->name('dosen.edit');


//route mahasiswa
Route::resource('mahasiswas', MahasiswaController::class);
Route::get('/mahasiswa/{id}', [MahasiswaController::class, 'show'])->name('mahasiswa.show');

//Route ruangan
Route::resource('ruangan', RuanganController::class);
Route::get('/ruangan/{ruangan}', [RuanganController::class, 'show'])->name('ruangan.show'); // Route name updated

// Route tabel tugas akhir
Route::resource('tugas_akhirs', TugasAkhirController::class);
Route::post('/tugas_akhirs', [TugasAkhirController::class, 'store'])->name('tugas_akhirs.store');
Route::get('/tugas_akhirs/create', [TugasAkhirController::class, 'create'])->name('tugas_akhirs.create');
Route::put('/tugas_akhirs/{tugasAkhir}/edit', [TugasAkhirController::class, 'update'])->name('tugas_akhirs.update');
Route::put('/tugas_akhirs/{tugasAkhir}', [TugasAkhirController::class, 'update'])->name('tugas_akhirs.update');
Route::delete('/tugas_akhirs/{tugasAkhir}', [TugasAkhirController::class, 'destroy'])->name('tugas_akhirs.destroy');
Route::get('/tugas_akhirs/{id}', [TugasAkhirController::class, 'show'])->name('tugas_akhirs.show');

//route jadwal
Route::resource('jadwal', JadwalController::class);
Route::resource('jadwal', JadwalController::class, [
    'except' => ['destroy']
]);
Route::get('/jadwal/{id}/download', [JadwalController::class, 'download']);


//route penilaian
Route::resource('penilaian', PenilaianController::class);
Route::get('/penilaian', [PenilaianController::class, 'index']);
Route::get('/penilaian', [PenilaianController::class, 'index'])->name('penilaian.index');
Route::get('/penilaian/{id}', [PenilaianController::class, 'show'])->name('penilaian.show');
Route::post('/penilaian', [PenilaianController::class, 'store'])->name('penilaian.store');
Route::put('/penilaian/{id}', [PenilaianController::class, 'update'])->name('penilaian.update');
Route::delete('/penilaian/{id}', [PenilaianController::class, 'destroy'])->name('penilaian.destroy');


//route dokumen
Route::resource('dokumen', DokumenController::class);
Route::get('dokumen/create', [DokumenController::class, 'create'])->name('dokumen.create');
Route::post('dokumen', [DokumenController::class, 'store'])->name('dokumen.store');
Route::get('dokumen', [DokumenController::class, 'index'])->name('dokumen.index');
Route::get('dokumen/{id}/edit', [DokumenController::class, 'edit'])->name('dokumen.edit');
Route::put('dokumen/{id}', [DokumenController::class, 'update'])->name('dokumen.update');
Route::get('dokumen/{id}', [DokumenController::class, 'show'])->name('dokumen.show');

//notifikasi
Route::get('/notifikasi', [NotifikasiController::class, 'index'])->name('notifikasi.index');
Route::get('/notifikasi/create', [NotifikasiController::class, 'create'])->name('notifikasi.create');
Route::post('/notifikasi', [NotifikasiController::class, 'store'])->name('notifikasi.store');
Route::get('/notifikasi/{notifikasi}', [NotifikasiController::class, 'show'])->name('notifikasi.show');
Route::get('/notifikasi/{notifikasi}/edit', [NotifikasiController::class, 'edit'])->name('notifikasi.edit');
Route::put('/notifikasi/{notifikasi}', [NotifikasiController::class, 'update'])->name('notifikasi.update');
Route::delete('/notifikasi/{notifikasi}', [NotifikasiController::class, 'destroy'])->name('notifikasi.destroy');

//notifikasi ADMIN
Route::get('admin/notifikasi', [AdminNotifikasiController::class, 'index'])->name('admin.notifikasi.index');
