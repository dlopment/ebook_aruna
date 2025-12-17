<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\sliderController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\welcomeController;
use App\Http\Controllers\dbdepositoController;
use App\Http\Controllers\dbkreditController;
use App\Http\Controllers\dblayananController;
use App\http\Controllers\dbpromoController;
use App\http\Controllers\dbtabunganController;
use App\Http\Controllers\tabungansimController;
use App\Http\Controllers\kreditsimController;
use App\Http\Controllers\dbalurkreditController;
use App\Http\Controllers\depositosimController;
use App\Http\Controllers\dbalskreditController;
use App\Http\Controllers\dbmarketingController;

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

Route::get('/simulasi-kredit', [kreditsimController::class, 'index'])->name('simulasi');
Route::post('/simulasi-kredit', [kreditsimController::class, 'calculate'])->name('simulasi.kredit');

Route::get('/Tabungan/Simulasi', [tabungansimController::class, 'index'])->name('tabungansim');
Route::post('/Tabungan/Simulasi', [tabungansimController::class, 'calculate'])->name('tabungan.simulasi');


//Slider
Route::get('/home', [welcomeController::class, 'index'])->name('welcome.index');

//Produk Detail
Route::get('/produk/tabungan/{id}', [welcomeController::class, 'tabungan'])->name('lengkap.tabungan');
Route::get('/produk/kredit/{id}', [welcomeController::class, 'kredit'])->name('lengkap.kredit');
Route::get('/produk/deposito/{id}', [welcomeController::class, 'deposito'])->name('lengkap.deposito');
Route::get('/produk/layanan/{id}', [welcomeController::class, 'layanan'])->name('lengkap.layanan');
Route::get('/produk/promo/{id}', [welcomeController::class, 'promo'])->name('lengkap.promo');

// Produk View
Route::get('/produkview/tabungan', [welcomeController::class, 'viewabungan'])->name('view.tabungan');
Route::get('/produkview/kredit', [welcomeController::class, 'viewkredit'])->name('view.kredit');
Route::get('/produkview/deposito', [welcomeController::class, 'viewdeposito'])->name('view.deposito');
Route::get('/produkview/layanan', [welcomeController::class, 'viewlayanan'])->name('view.layanan');
Route::get('/produkview/promo', [welcomeController::class, 'viewpromo'])->name('view.promo');
Route::get('/produkview/all', [welcomeController::class, 'detail'])->name('view.detail');

//Login Register
Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::get('/user', [LoginController::class, 'user'])->name('user');
Route::get('/register', [LoginController::class, 'register'])->name('register.index');
Route::get('/register/login', [LoginController::class, 'register'])->name('register.index');
Route::post('/register', [LoginController::class, 'store'])->name('register.store');
Route::get('/tambah/user', [LoginController::class, 'tambah'])->name('create.user');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proeses');
Route::get('/login/user', [LoginController::class, 'tampil'])->name('login.tampil');

Route::get('/slider', [sliderController::class, 'index'])->name('slider.index');
Route::get('/slider/tambah', [sliderController::class, 'tambah'])->name('slider.tambah');
Route::post('/slider', [sliderController::class, 'store'])->name('slider.store');
Route::get('/lider/{id}/Edit', [sliderController::class, 'edit'])->name('slider.edit');
Route::put('/slider/{id}', [sliderController::class, 'update'])->name('slider.update');
Route::delete('/slider/{id}', [sliderController::class, 'destroy'])->name('slider.destroy');

Route::get('/viewtabungan', [dbtabunganController::class, 'index'])->name('admtabungan.index');
Route::get('/viewtabungan/createtabungan', [dbtabunganController::class, 'create'])->name('admtabungan.create');
Route::post('/viewtabungan', [dbtabunganController::class, 'store'])->name('admtabungan.store');
Route::get('/viewtabungan/{id}/Edit', [dbtabunganController::class, 'edit'])->name('admtabungan.edit');
Route::put('/viewtabungan/{id}', [dbtabunganController::class, 'update'])->name('admtabungan.update');
Route::delete('/viewtabungan/{id}', [dbtabunganController::class, 'destroy'])->name('admtabungan.destroy');

Route::get('/viewkredit', [dbkreditController::class, 'index'])->name('admkredit.index');
Route::get('/viewkredit/createkredit', [dbkreditController::class, 'create'])->name('admkredit.create');
Route::post('/viewkredit', [dbkreditController::class, 'store'])->name('admkredit.store');
Route::get('/viewkredit/{id}/Edit', [dbkreditController::class, 'edit'])->name('admkredit.edit');
Route::put('/viewkredit/{id}', [dbkreditController::class, 'update'])->name('admkredit.update');
Route::delete('/viewkredit/{id}', [dbkreditController::class, 'destroy'])->name('admkredit.destroy');

Route::get('/promo', [dbpromoController::class, 'index'])->name('promo.index');
Route::get('/promo/createpromo', [dbpromoController::class, 'create'])->name('promo.create');
Route::post('/promo', [dbpromoController::class, 'store'])->name('promo.store');
Route::get('/promo/{id}/Edit', [dbpromoController::class, 'edit'])->name('promo.edit');
Route::put('/promo/{id}', [dbpromoController::class, 'update'])->name('promo.update');
Route::delete('/promo/{id}', [dbpromoController::class, 'destroy'])->name('promo.destroy');

Route::get('/viewdeposito', [dbdepositoController::class, 'index'])->name('admdeposito.index');
Route::get('/viewdeposito/creatdeposito', [dbdepositoController::class, 'create'])->name('admdeposito.create');
Route::post('/viewdeposito', [dbdepositoController::class, 'store'])->name('admdeposito.store');
Route::get('/viewdeposito/{id}/Edit', [dbdepositoController::class, 'edit'])->name('admdeposito.edit');
Route::put('/viewdeposito/{id}', [dbdepositoController::class, 'update'])->name('admdeposito.update');
Route::delete('/viewdeposito/{id}', [dbdepositoController::class, 'destroy'])->name('admdeposito.destroy');

Route::get('/alukredit', [dbalurkreditController::class, 'index'])->name('alukredit.index');
Route::get('/alukredit/create', [dbalurkreditController::class, 'create'])->name('alukredit.create');
Route::post('/alukredit/store', [dbalurkreditController::class, 'store'])->name('alukredit.store');
Route::get('/alukredit/{id}/Edit', [dbalurkreditController::class, 'edit'])->name('alukredit.edit');
Route::put('/alukredit/{id}', [dbalurkreditController::class, 'update'])->name('alukredit.update');
Route::delete('/alukredit/{id}', [dbalurkreditController::class, 'destroy'])->name('alukredit.destroy');

Route::get('/alskredit', [dbalskreditController::class, 'index'])->name('alskredit.index');
Route::get('/alskredit/create', [dbalskreditController::class, 'create'])->name('alskredit.create');
Route::post('/alskredit/store', [dbalskreditController::class, 'store'])->name('alskredit.store');
Route::get('/alskredit/{id}/Edit', [dbalskreditController::class, 'edit'])->name('alskredit.edit');
Route::put('/alskredit/{id}', [dbalskreditController::class, 'update'])->name('alskredit.update');
Route::delete('/alskredit/{id}', [dbalskreditController::class, 'destroy'])->name('alukredit.destroy');



Route::get('/laporan', function () {
    return view('laporan/laporan'); // Pastikan ada file laporan.blade.php
});

Route::get('/simulasi-marketing', [dbmarketingController::class, 'index'])->name('simulasi.marketing');
Route::post('/simulasi-marketing', [dbmarketingController::class, 'harian'])->name('simulasi.marketing');

Route::get('/simulasi-usaha', [depositosimController::class, 'index'])->name('simulasi.usaha');
Route::post('/simulasi-usaha', [depositosimController::class, 'hitung'])->name('simulasi.usaha.hitung');


Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'as' => 'admin.'], function () {
    Route::get('/dasboard', [welcomeController::class, 'dashboard'])->name('dashboard');
});
