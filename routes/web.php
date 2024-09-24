<?php

use App\Http\Controllers\ApotekerController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MedisController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PerawatController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\RsController;
use App\Http\Controllers\SesiController;
// use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Start Route
Route::get('/rs_login', function () {
    return view('rs_login');
})->name('rs_login');
// End Route Login

// Start Auth Role
Route::middleware(['guest'])->group(function () {
    Route::get('/rs_login', [SesiController::class, 'index'])->name('login_rs');
    Route::post('/rs_login', [SesiController::class, 'login_rs']);
});
Route::get('/home', function () {
    return redirect('/rs');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/rs', [RsController::class, 'index']);
    Route::get('/rs/perawat', [RsController::class, 'perawat'])->middleware('userAkses:perawat');
    Route::get('/rs/apoteker', [RsController::class, 'apoteker'])->middleware('userAkses:apoteker');
    Route::get('/rs/dokter', [RsController::class, 'dokter'])->middleware('userAkses:dokter');
    Route::get('/rs/pasien', [RsController::class, 'pasien'])->middleware('userAkses:pasien');
    Route::get('/rs_logout', [SesiController::class, 'rs_logout']);
});
// End Auth Role

// Route untuk Register
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register-proses', [RegisterController::class, 'register_proses'])->name('register-proses');

// Start Route untuk ke page Register
Route::get('/register', function () {
    return view('register');
});
// End Route untuk Register



// Start Route untuk Dashboard
Route::get('/', function () {
    return view('dashboard');
});
// End Route untuk Dashboard

// Start Route untuk Users dengan role Pasien
Route::get('/user/user_dashboard', function () {
    return view('user/user_dashboard');
})->name('user.user_dashboard');

// Tambah Pasien berdasarkan user_id
Route::post('/pasien/tambah', [PasienController::class, 'tambah'])->name('pasien.tambah');

// Menampilkan Pasien
Route::get('/pasien', [PasienController::class, 'data_pasien'])->name('pasien.data_pasien');
Route::get('/data_pasien', [PasienController::class, 'data'])->name('data_pasien.data');

// Menampilkan Jadwal
Route::get('/user/jadwal_pasien', [JadwalController::class, 'data'])->name('jadwal_pasien.data');
Route::get('/user/jadwal', [JadwalController::class, 'data_jadwal'])->name('jadwal.data_jadwal');

// Menampilkan Riwayat Medis
Route::get('/user/riwayat_medis', [MedisController::class, 'data'])->name('riwayat_medis.data');



Route::get('/user/pasien', [PasienController::class, 'data_pasien'])->name('pasien.data_pasien');
Route::get('/user/data_pasien', [PasienController::class, 'data'])->name('pasien.data');

// Route Pencarian
Route::get('/cari_pasien', [PasienController::class, 'cari_pasien'])->name('cari_pasien');
Route::get('/cari_data_pasien', [PasienController::class, 'cari_data_pasien'])->name('cari_data_pasien');
Route::get('/cari_nama_pasien', [JadwalController::class, 'cari_nama_pasien'])->name('cari_nama_pasien');
Route::get('/cari_dokter', [DokterController::class, 'cari_dokter'])->name('cari_dokter');

// Edit Profile
Route::put('/user/update', [ProfileController::class, 'update'])->name('user.update');
Route::get('user/profile/edit', [ProfileController::class, 'edit'])->name('user.profile');
Route::put('user/profile/update', [ProfileController::class, 'update'])->name('profile.update');
Route::get('/user/profile', function () {
    return view('user/profile');
});

// Reset Password
Route::put('/password-reset', [ProfileController::class, 'reset'])->name('password.reset');


// Dokter
Route::get('/user/dokter', function () {
    return view('user/dokter');
});


// Tagihan
Route::get('/user/pembayaran', [PembayaranController::class, 'pembayaran'])->name('data_pembayaran.pembayaran');


// PDF
Route::get('/pdf/pdf', function () {
    return view('pdf/pdf');
});
Route::get('/pdf/pdf', [PdfController::class, 'cetak'])->name('pdf.cetak');
// End Route untuk Users dengan role Pasien









// Start Route untuk Users dengan role Perawat
Route::get('/perawat/perawat', function () {
    return view('perawat/perawat');
})->name('perawat.perawat');

// Menampilkan data Pasien di Perawat
Route::get('/perawat/pasien', [PerawatController::class, 'data'])->name('pasien.data');

// Menampilkan sesuai id dan menambahkan data ke tabel Jadwal
Route::get('/perawat/{id}/edit', [JadwalController::class, 'edit']);
// Route::get('/perawat/jadwal/create', [JadwalController::class, 'create']);
Route::post('/perawat/edit', [JadwalController::class, 'store'])->name('jadwal.store');

// Menampilkan data Obat di Data
Route::get('/perawat/data', [ObatController::class, 'data'])->name('obat.data');

// Menampilkan data Jadwal
Route::get('/perawat/jadwal', [PerawatController::class, 'jadwal'])->name('jadwal.jadwal');

// Route Pencarian
Route::get('/cari_pasien_data', [PerawatController::class, 'cari_pasien_data'])->name('cari_pasien_data');
Route::get('/cari_tanggal_jadwal', [PerawatController::class, 'cari_tanggal_jadwal'])->name('cari_tanggal_jadwal');

// Hapus sekaligus mengirim data "Dibatalkan"
Route::post('/pasien/batalkan/{id}', [PasienController::class, 'batalkan'])->name('pasien.batalkan');


// Hapus Pasien
Route::delete('/pasien/delete/{id}', [PerawatController::class, 'hapus'])->name('pasien.hapus');

// Hapus Jadwal
Route::delete('/jadwal/delete/{id}', [JadwalController::class, 'hapus'])->name('jadwal.hapus');

// Route untuk mencari "Dibatalkan"
Route::get('/cari_pasien_status', [PerawatController::class, 'cari_pasien_status'])->name('cari_pasien_status');



// Menampilkan Riwayat Medis
Route::get('/perawat/riwayat_medis', [MedisController::class, 'medis'])->name('riwayat_medis.medis');


// End Route untuk Users dengan role Perawat



// Start Route untuk Users dengan role Dokter
Route::get('/dokter/dokter', function () {
    return view('dokter/dokter');
})->name('dokter.dokter');

// Menampilkan data Obat di Data
Route::get('/dokter/data', [ObatController::class, 'view'])->name('obat.view');

// Menampilkan Pasien
Route::get('/dokter/pasien', [DokterController::class, 'data'])->name('pasien.data');

// Route pencarian
Route::get('/cari_nama_data_pasien', [DokterController::class, 'cari_nama_data_pasien'])->name('cari_nama_data_pasien');

// Menampilkan Jadwal
Route::get('/dokter/jadwal', [DokterController::class, 'jadwal_praktek'])->name('pasien.data_pasien');



// Menambahkan Pemeriksaan sesuai id Pasien
Route::get('/dokter/{id}/pemeriksaan', [DokterController::class, 'pemeriksaan']);
Route::post('/dokter/pemeriksaan', [RiwayatController::class, 'tambah'])->name('pemeriksaan.tambah');

// Menampilkan Riwayat Medis
Route::get('/dokter/riwayat_medis', [MedisController::class, 'riwayat'])->name('riwayat_medis.riwayat');

// End Route untuk Users dengan role Dokter


// Start Route untuk Users denngan role Apoteker
Route::get('/apoteker/apoteker', function () {
    return view('apoteker/apoteker');
})->name('apoteker.apoteker');

// Menampilkan data Pasien di Apoteker
Route::get('/apoteker/pasien', [ApotekerController::class, 'data'])->name('pasien.data');

// Menampilkan data Obat di Data
Route::get('/apoteker/data', [ApotekerController::class, 'data_all'])->name('obat.data_all');

// Menampilkan data Riwayat di Pembayaran
Route::get('/apoteker/pembayaran', [ApotekerController::class, 'data_riwayat'])->name('obat.data_riwayat');


// End Route untuk Users denngan role Apoteker



// Midtrans
Route::post('/user/pembayaran', [OrderController::class, 'checkout'])->name('pembayaran.checkout');
Route::post('/invoice/{id}', [OrderController::class, 'invoice']);
// Route::get('/user/checkout', [OrderController::class, 'data_order'])->name('checkout.data_order');
