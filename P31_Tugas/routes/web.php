<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

// Route untuk pegawai
Route::resource('pegawai', PegawaiController::class);

// Route untuk cetak data pegawai
Route::get('/downloadPDF', [PegawaiController::class, 'downloadPDF'])->name('downloadPDF');
