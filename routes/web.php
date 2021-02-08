<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\laporanController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\crosscheckController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// dashboard
Route::get('/', [dashboardController::class, 'index'])->name('dashboard');

// piutang

// crosscheck
Route::get('/crosscheck/', [crosscheckController::class, 'index'])->name('riwayat-crosscheck');
Route::get('/crosscheck/create', [crosscheckController::class, 'create'])->name('create-crosscheck');
Route::post('/crosscheck/store', [crosscheckController::class, 'store'])->name('store-crosscheck');
Route::get('/crosscheck/{juno}/edit', [crosscheckController::class, 'edit'])->name('edit-crosscheck');
Route::post('/crosscheck/{juno}/update', [crosscheckController::class, 'update'])->name('update-crosscheck');
Route::post('/crosscheck/{juno}/final', [crosscheckController::class, 'updatePerm'])->name('final-crosscheck');

// do

// laporan
Route::get('/laporan/laba-rugi', [laporanController::class, 'labarugi'])->name('labarugi');
Route::get('/laporan/rekapitulasi-stok', [laporanController::class, 'rekapstok'])->name('rekapstok');
Route::get('/laporan/barang-masuk', [laporanController::class, 'barangmasuk'])->name('barangmasuk');
Route::get('/laporan/pajak', [laporanController::class, 'pajak'])->name('pajak');
Route::get('/laporan/rapot-mekanik', [laporanController::class, 'rapotmekanik'])->name('rapotmekanik');

// fast moving
