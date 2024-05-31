<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CetakanController;
use App\Http\Controllers\CetakanPsikologController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\TesKematanganSekolahController;
use App\Http\Controllers\TestingController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

/*
|--------------------------------------------------------------------------
| Home Routes
|--------------------------------------------------------------------------
*/
Route::get('/home', [HomeController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| Cetakan Routes
|--------------------------------------------------------------------------
*/
Route::prefix('cetakan')->group(function () {
    Route::get('/', [CetakanController::class, 'index'])->name('cet');

    Route::prefix('psikolog')->group(function () {
        Route::get('/', [CetakanPsikologController::class, 'index'])->name('cet.psikolog');
        Route::get('/tks', [TesKematanganSekolahController::class, 'index'])->name('cet.psikolog.tks');
        Route::post('/tks', [TesKematanganSekolahController::class, 'store'])->name('cet.psikolog.tks.store');
        Route::get('/tks/{id}', [TesKematanganSekolahController::class, 'show'])->name('cet.psikolog.tks.show');
    });

    Route::get('/{kunjunganId}', [CetakanController::class, 'show'])->name('cet.show');
});

/*
|--------------------------------------------------------------------------
| Pasien Routes
|--------------------------------------------------------------------------
*/
Route::get('/pasien', [PasienController::class, 'index'])->name('pasien');

/*
|--------------------------------------------------------------------------
| Testing Routes
|--------------------------------------------------------------------------
*/
Route::get('/testing', [TestingController::class, 'getReferensi'])->name('testing');
