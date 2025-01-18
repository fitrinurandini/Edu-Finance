<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SesiController;
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
Route::get('/', function () {
    return view('welcome');  
});
Route::middleware(['guest'])->group(function(){
    Route::get('/login',[SesiController::class, 'index'])->name('login');   
    Route::post('/login',[SesiController::class, 'login']);
});
Route::get('/home', function () {
    return redirect('/admin');
});

Route::resource('dashboard', DashboardController::class);

Route::middleware(['auth'])->group(function(){
    Route::get('/kepala_sekolah',[AdminController::class, 'kepala_sekolah'])->middleware('userAkses:kepala_sekolah')->name('kepala_sekolah.index');
    Route::get('/tata_usaha',[AdminController::class, 'tata_usaha'])->middleware('userAkses:tata_usaha')->name('tata_usaha.index');
    Route::get('/ketua_akuntansi',[AdminController::class, 'ketua_akuntansi'])->middleware('userAkses:ketua_akuntansi')->name('ketua_akutansi.index');
    Route::get('/wali_kelas',[AdminController::class, 'wali_kelas'])->middleware('userAkses:wali_kelas')->name('walikelas.index');
    Route::get('/orang_tua',[AdminController::class, 'orang_tua'])->middleware('userAkses:orang_tua')->name('orantua.index');
});

Route::get('/logout',[SesiController::class, 'logout'])->name('logout');