<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SertifikatController;
use App\Http\Controllers\DataUserController;
use App\Http\Controllers\PesertaController;


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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    /**
     * Root Route atau Route Utama
     */
    Route::get('/', function () {
        // Konten halaman
    })->middleware('checkrole')->name('home');

    /**
     * Route khusus role Admin
     */
    Route::middleware('role:admin')->group(function() {
        Route::get('/dashboard', function () {
            // return 'dashboard admin';
            return view('pages.dashboard');
        })->name('dashboard');

         //route resource
         Route::resource('/template_design', \App\Http\Controllers\SertifikatController::class);

         Route::resource('/data_users', \App\Http\Controllers\DataUserController::class);

         Route::resource('/tbl_sertifikat', \App\Http\Controllers\TabelSertifikatController::class);

    


        // bisa ditambahkan route baru sesuai kebutuhan
    });

    /**
     * Route khusus role User
     */
    Route::middleware('role:user')->group(function() {
        Route::get('/dashboard_user', function () {
            // return 'dashboard user';
            return view('pages.dashboard_user');
        })->name('dashboard_user');

        Route::resource('/tbl_peserta', \App\Http\Controllers\PesertaController::class);

    

        // bisa ditambahkan route baru sesuai kebutuhan
    });

});
