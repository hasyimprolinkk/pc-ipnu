<?php

use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\UserController;


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
Route::get('/', [HomeController::class,'index']);
Route::get('/kegiatan/{id}/komentar', [HomeController::class,'show']);

Route::middleware('auth')->group(function(){
    Route::get('/dashboard', [DashboardController::class,'index']);
    Route::get('/profile', [UserController::class,'profile']);
    Route::put('/profile', [UserController::class,'updateProfile']);
    Route::get('/editpassword', [UserController::class,'editPassword']);
    Route::put('/editpassword', [UserController::class,'updatePassword']);
    Route::post('/komentar', [HomeController::class,'store']);
    Route::delete('/komentar/{id}/delete', [HomeController::class,'deleteKomentar']);
});

Route::middleware(['auth', 'petugas'])->group(function(){
    Route::get('/kegiatan', [KegiatanController::class,'index']);
    Route::get('/kegiatan/{id}/show', [KegiatanController::class,'show']);
    Route::get('/kegiatan/{id}/edit', [KegiatanController::class,'edit']);
    Route::put('/kegiatan/{id}/edit', [KegiatanController::class,'update']);
    Route::delete('/kegiatan/{id}/delete', [KegiatanController::class,'delete']);
    Route::get('/kegiatan/{id}/print', [KegiatanController::class,'cetakId']);
    Route::get('/kegiatan/print', [KegiatanController::class,'print']);
    Route::post('/kegiatan/print/all', [KegiatanController::class,'cetak']);
    Route::get('/kegiatan/add', [KegiatanController::class,'create']);
    Route::post('/kegiatan/add', [KegiatanController::class,'store']);
    Route::get('/users', [UserController::class,'index']);
    Route::get('/users/add', [UserController::class,'create']);
    Route::post('/users/add', [UserController::class,'store']);
    Route::get('/users/{id}', [UserController::class,'show']);
    Route::put('/users/{id}/status', [UserController::class,'statusActive']);
    Route::delete('/users/{id}/delete', [UserController::class,'delete']);
    Route::get('/kategori', [KategoriController::class,'index']);
    Route::post('/kategori/add', [KategoriController::class,'store']);
    Route::get('/kategori/{id}/edit', [KategoriController::class,'edit']);
    Route::put('/kategori/{id}/edit', [KategoriController::class,'update']);
    Route::delete('/kategori/{id}/delete', [KategoriController::class,'destroy']);  
});

Auth::routes();


