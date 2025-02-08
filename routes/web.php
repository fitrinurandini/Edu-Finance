<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PaguTahunanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\SesiController;
use Illuminate\Support\Facades\Route;

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

    //TU
    Route::get('/tata_usaha/pembayaran',[PembayaranController::class, 'create'])->middleware('userAkses:tata_usaha')->name('tata_usaha.create');
    Route::post('/tata_usaha/store', [PembayaranController::class, 'store'])->middleware('userAkses:tata_usaha')->name('tata_usaha.store');
    Route::get('/tata_usaha/edit/{id}', [PembayaranController::class, 'edit'])->middleware('userAkses:tata_usaha')->name('tata_usaha.edit');
    Route::post('/tata_usaha/update/{id}', [PembayaranController::class, 'update'])->middleware('userAkses:tata_usaha')->name('tata_usaha.update');
    Route::delete('/tata_usaha/delete/{id}', [PembayaranController::class, 'destroy'])->middleware('userAkses:tata_usaha')->name('tata_usaha.destroy');
    Route::get('/tata_usaha/pay/{id}', [PembayaranController::class, 'pay'])->middleware('userAkses:tata_usaha')->name('tata_usaha.pay');
    Route::post('/tata_usaha/process-payment/{id}', [PembayaranController::class, 'processpayment'])->middleware('userAkses:tata_usaha')->name('tata_usaha.process_payment');

    // data pokok
    Route::resource('students', StudentController::class);
    
    // data pagu tahunan
    Route::resource('pagu_tahunans', PaguTahunanController::class);

    //Laporan
    Route::get('/laporan/tanggal', [LaporanController::class, 'reportByTanggal'])->name('laporan.tanggal');
    Route::get('/laporan/tahun', [LaporanController::class, 'reportByTahun'])->name('laporan.tahun');
    Route::get('/laporan/bulan', [LaporanController::class, 'reportByBulan'])->name('laporan.bulan');
    Route::get('/laporan/kelas', [LaporanController::class, 'reportByKelas'])->name('laporan.kelas');

});


Route::get('/logout',[SesiController::class, 'logout'])->name('logout');