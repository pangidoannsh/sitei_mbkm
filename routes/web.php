<?php

use Illuminate\Support\Facades\Route;

use App\http\controllers\logincontroller;
use App\http\controllers\mahasiswacontroller;
use App\http\controllers\usulancontroller;
use App\http\controllers\sertifikatcontroller;
use App\http\controllers\matkulcontroller;
use App\http\controllers\prodicontroller;
use App\http\controllers\staffcontroller;
use App\http\controllers\usercontroller;
use App\http\controllers\dosencontroller;
use App\Http\Controllers\LogbookController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" group ['middleware' =>[group. Make ]],
|
*/

Route::group(['middleware' => 'prevent-back-history'], function () {
    // login
    Route::get('/', function () {
        return view('login.index');
    })->name('login');


    Route::post('/', [LoginController::class, 'postlogin'])->name('login.postlogin');
    // Route::post ('/', [logincontroller::class, 'authenticate'])->name('login.authenticate');
    // Route::post ('/login', [logincontroller::class, 'authenticate'])->name('login.authenticate');
    // Route::get('/', [LoginController::class, 'index']);
    // Route::post('/', [LoginController::class, 'postlogin'])->name('login');

    Route::group(['middleware' => ['auth:dosen,web,mahasiswa']], function () {
        Route::post('/logout', [LoginController::class, 'logout']);
        Route::prefix('/mbkm')->group(function () {
            Route::get('/mahasiswa', [mahasiswacontroller::class, 'index'])->name('mbkm');
            Route::get('/mahasiswa/riwayat', [mahasiswacontroller::class, 'riwayat'])->name('mbkm.riwayat');
            Route::get('/mahasiswa/{mbkm:id}', [mahasiswacontroller::class, 'detail'])->name('mbkm.detail');
            Route::delete('/mahasiswa/{mbkm:id}', [mahasiswacontroller::class, 'destroy'])->name('mbkm.destroy');
            Route::get('/undur-diri/{mbkm:id}', [mahasiswacontroller::class, 'undurDiri'])->name('mbkm.undurdiri');
            Route::post('/undur-diri/{mbkm:id}', [mahasiswacontroller::class, 'storeUndurDiri'])->name('mbkm.undurdiri.store');
            Route::post('/usulan', [mahasiswacontroller::class, 'store'])->name('mbkm.store');
            Route::post('/uploaded/{mbkm:id}', [mahasiswacontroller::class, 'uploaded'])->name('mbkm.uploaded');

            Route::group(['middleware' => ['auth:mahasiswa']], function () {
                // mahasiswa
                Route::get('/profil-mhs/editpasswordmhs', [mahasiswacontroller::class, 'editpswmhs']);
                Route::put('/profil-mhs/editpasswordmhs', [mahasiswacontroller::class, 'updatepswmhs']);

                Route::get('/usulan', [usulancontroller::class, 'index'])->name('usulan.index');
                Route::get('/usulan/create', [usulancontroller::class, 'create'])->name('usulan.create');

                Route::get('/{mbkm:id}/sertifikat/create', [sertifikatcontroller::class, 'create'])->name('mbkm.sertif.create');
                Route::post('/sertifikat/create', [sertifikatcontroller::class, 'store'])->name('mbkm.sertif.store');
                Route::post('/sertifikat/create/konversi', [sertifikatcontroller::class, 'storekonversi'])->name('mbkm.sertif.storekonversi');
                Route::delete('/sertifikat/create/{id}', [sertifikatcontroller::class, 'destroykonversi'])->name('mbkm.sertif.destroykonversi');

                Route::get("{mbkmId}/logbook", [LogbookController::class, 'index'])->name("mbkm.logbook");
                Route::post("logbook/{id}", [LogbookController::class, 'store'])->name("mbkm.logbook.store");
            });

            Route::group(['middleware' => ['auth:dosen']], function () {
                Route::get('/prodi', [prodicontroller::class, 'index'])->name('prodi');
                Route::post('/prodi/approve/{mbkm:id}', [prodicontroller::class, 'approveusulan'])->name('prodi.approveusulan');
                Route::post('/prodi/approvekonversi/{mbkm:id}', [prodicontroller::class, 'approvekonversi'])->name('prodi.approvekonversi');
                Route::post('/prodi/approvepengunduran/{mbkm:id}', [prodicontroller::class, 'approvepengunduran'])->name('prodi.approvepengunduran');
                Route::put('/prodi/tolakusulan/{mbkm:id}', [prodicontroller::class, 'tolakusulan'])->name('prodi.tolakusulan');
                Route::put('/prodi/tolakkonversi/{mbkm:id}', [prodicontroller::class, 'tolakkonversi'])->name('prodi.tolakkonversi');
                Route::get('/dosen/editpassworddsn', [dosenController::class, 'editpswdsn'])->name('dosen.editpw');
                Route::put('/dosen/editpassworddsn', [dosenController::class, 'updatepswdsn'])->name('dosen.updatepw');

                Route::get('/riwayat', [prodicontroller::class, 'riwayat'])->name('prodi.riwayat');
                Route::get('/sert', [prodicontroller::class, 'sertifikat'])->name('prodi.sertifikat');
                Route::get('/convert', [prodicontroller::class, 'konversi'])->name('prodi.konversi');
            });

            Route::group(['middleware' => ['auth:web']], function () {
                // staff
                Route::get('/staff', [staffcontroller::class, 'index'])->name('staff');
                Route::get('/staff/mahasiswa', [staffcontroller::class, 'indexmhs'])->name('staff.indexmhs');
                Route::get('/staff/mahasiswa/create', [staffcontroller::class, 'createmhs'])->name('staff.createmhs');
                Route::get('/staff/mahasiswa/edit/{mahasiswa:id}', [staffcontroller::class, 'editmhs'])->name('staff.editmhs');
                Route::put('/staff/mahasiswa/edit/{mahasiswa:id}', [staffcontroller::class, 'updatemhs'])->name('staff.updatemhs');
                Route::post('/staff/mahasiswa/create', [staffcontroller::class, 'storemhs'])->name('staff.storemhs');
                Route::delete('/staff/mahasiswa/{mahasiswa:id}', [staffcontroller::class, 'destroymhs'])->name('staff.detsroymhs');

                Route::get('/staff/dosen', [staffcontroller::class, 'indexdsn'])->name('staff.indexdsn');
                Route::get('/staff/dosen/create', [staffcontroller::class, 'createdsn'])->name('staff.createdsn');
                Route::get('/staff/dosen/edit/{dosen:id}', [staffcontroller::class, 'editdsn'])->name('staff.editdsn');
                Route::put('/staff/dosen/edit/{dosen:id}', [staffcontroller::class, 'updatedsn'])->name('staff.updatedsn');
                Route::post('/staff/dosen/create', [staffcontroller::class, 'storedsn'])->name('staff.storedsn');
                Route::delete('/staff/dosen/{dosen:id}', [staffcontroller::class, 'destroydsn'])->name('staff.destroydsn');

                Route::get('/staff/user', [staffcontroller::class, 'indexstaff'])->name('staff.indexstaff');
                Route::get('/staff/user/create', [staffcontroller::class, 'createstaff'])->name('staff.createstaff');
                Route::get('/staff/user/edit/{user:id}', [staffcontroller::class, 'editstaff'])->name('staff.editstaff');
                Route::put('/staff/user/edit/{user:id}', [staffcontroller::class, 'updatestaff'])->name('staff.updatestaff');
                Route::post('/staff/user/create', [staffcontroller::class, 'storestaff'])->name('staff.storestaff');
                Route::delete('/staff/user/{user:id}', [staffcontroller::class, 'destroystaff'])->name('staff.destroystaff');

                Route::get('/profil-staff/editpasswordstaff', [staffcontroller::class, 'editpswstaff']);
                Route::put('/profil-staff/editpasswordstaff', [staffcontroller::class, 'updatepswstaff']);
                Route::post('/staff/approve/{id}', [staffcontroller::class, 'approve'])->name('staff.approve');
                Route::get('/staff-print', [staffcontroller::class, 'print'])->name('staff.print');
                Route::get('{mbkm:id}/donwload-konversi-pdf', [staffcontroller::class, 'downloadpdf'])->name('pdf');
            });
        });
    });


    Route::get('/user', [usercontroller::class, 'index'])->name('user.index');
    Route::get('/user/create', [usercontroller::class, 'create'])->name('user.create');
    Route::post('/user', [usercontroller::class, 'store'])->name('user.store');

    Route::get('/dosen', [dosencontroller::class, 'index'])->name('dosen.index');
    Route::get('/dosen/create', [dosencontroller::class, 'create'])->name('dosen.create');
    Route::post('/dosen', [dosencontroller::class, 'store'])->name('dosen.store');

    // Route::get('/matkul', [matkulcontroller::class, 'index'])->name('matkul.index');
    // Route::get('/matkul/create', [matkulcontroller::class, 'create'])->name('matkul.create');

    Route::post('/logout', [logincontroller::class, 'logout'])->name('logout');
    // });

});
