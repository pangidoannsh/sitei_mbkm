<?php

use Illuminate\Support\Facades\Route;

use App\http\controllers\logincontroller;
use App\http\controllers\mahasiswacontroller;
use App\http\controllers\usulancontroller;
use App\http\controllers\sertifikatcontroller;
use App\http\controllers\nilaimbkmcontroller;
use App\http\controllers\konversicontroller;
use App\http\controllers\matkulcontroller;
use App\http\controllers\pendaftarancontroller;
use App\http\controllers\prodicontroller;
use App\http\controllers\detailcontroller;

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

Route::get('/', [logincontroller::class, 'login'])-> name('login');
Route::get('/account', [logincontroller::class, 'akun'])-> name('akun');

Route::get('/mahasiswa', [mahasiswacontroller::class, 'index'])->name('mahasiswa.index');
Route::get('/mahasiswa/create', [mahasiswacontroller::class, 'create'])->name('mahasiswa.create');

Route::get('/pendaftaran', [pendaftarancontroller::class, 'index'])->name('pendaftaran.index');

Route::get('/usulan', [usulancontroller::class, 'index'])->name('usulan.index');
Route::get('/usulan/create', [usulancontroller::class, 'create'])->name('usulan.create');

Route::get('/sertifikat', [sertifikatcontroller::class, 'index'])->name('sertifikat.index');
Route::get('/sertifikat/create', [sertifikatcontroller::class, 'create'])->name('sertifikat.create');

Route::get('/nilaimbkm', [nilaimbkmcontroller::class, 'index'])->name('nilaimbkm.index');
Route::get('/nilaimbkm/create', [nilaimbkmcontroller::class, 'create'])->name('nilaimbkm.create');

Route::get('/konversi', [konversicontroller::class, 'index'])->name('konversi.index');
Route::get('/konversi/create', [konversicontroller::class, 'create'])->name('konversi.create');

Route::get('/prodi', [prodicontroller::class, 'index'])->name('prodi.index');

Route::get('/revisi', [detailcontroller::class, 'index'])->name('revisi.index');
Route::get('/revisi/detail', [detailcontroller::class, 'detail'])->name('revisi.detail');

Route::get('/matkul', [matkulcontroller::class, 'index'])->name('matkul.index');
Route::get('/matkul/create', [matkulcontroller::class, 'create'])->name('matkul.create');

// Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
