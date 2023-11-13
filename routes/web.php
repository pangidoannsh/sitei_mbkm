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
use App\http\controllers\staffcontroller;
use App\http\controllers\usercontroller;
use App\http\controllers\dosencontroller;

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

// login
Route::get('/', function () {
    return view('login.index');
})->name('login');
Route::get ('/login', [logincontroller::class, 'akun'])->name('login.akun');
// Route::post ('/login', [logincontroller::class, 'authenticate'])->name('login.authenticate');
// Route::post ('/login', [logincontroller::class, 'authenticate'])->name('login.authenticate');
// Route::get('/', [LoginController::class, 'index']);
// Route::post('/', [LoginController::class, 'postlogin'])->name('login');


// Route::middleware(['auth'])->group(function() {

    // Route::middleware('role:prodi')->group(function() {
    // mahasiswa
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

    Route::get('/revisi', [detailcontroller::class, 'index'])->name('revisi.index');
        // });

    // Route::middleware('role:staff')->group(function() {
        // staff
        Route::get('/staff', [staffcontroller::class, 'index'])->name('staff.index');
        Route::get('/staff-print', [staffcontroller::class, 'print'])->name('staff.print');
        Route::get('/donwload-konversi-pdf', [staffcontroller::class, 'downloadpdf'])->name('pdf');

        // });
    // Route::middleware('role:prodi')->group(function() {
        // prodi
        Route::get('/prodi', [prodicontroller::class, 'index'])->name('prodi.index');
        Route::get('/sert', [prodicontroller::class, 'sertifikat'])->name('prodi.sertifikat');
        Route::get('/convert', [prodicontroller::class, 'konversi'])->name('prodi.konversi');
        Route::get('/riwayat', [prodicontroller::class, 'riwayat'])->name('prodi.riwayat');

    // });

    Route::get('/user', [usercontroller::class, 'index'])->name('user.index');
    Route::get('/user/create', [usercontroller::class, 'create'])->name('user.create');
    Route::post('/user', [usercontroller::class, 'store'])->name('user.store');

    Route::get('/dosen', [dosencontroller::class, 'index'])->name('dosen.index');
    Route::get('/dosen/create', [dosencontroller::class, 'create'])->name('dosen.create');
    Route::post('/dosen', [dosencontroller::class, 'store'])->name('dosen.store');


    Route::get('/revisi/detail', [detailcontroller::class, 'detail'])->name('revisi.detail');

    Route::get('/matkul', [matkulcontroller::class, 'index'])->name('matkul.index');
    Route::get('/matkul/create', [matkulcontroller::class, 'create'])->name('matkul.create');

    Route::post('/logout', [logincontroller::class, 'logout'])->name('logout');


// });
