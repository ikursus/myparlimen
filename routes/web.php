<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PartiController;
use App\Http\Controllers\GelaranController;
use App\Http\Controllers\JawatanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AhliParlimenController;
use App\Http\Controllers\ApiPostController;

// Invokable routing kerana ada 1 method/function sahaja
Route::get('/', HomeController::class)->name('homepage');

// Format routing yang betul Route::method('uri', action);
Route::get('/login', [LoginController::class, 'paparBorangLogin'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('hantar.login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', DashboardController::class)->name('panel.dashboard');

// Routing manual
// Route untuk memaparkan senarai jawatan
Route::get('/jawatan', [JawatanController::class, 'index'])->name('jawatan.index');
// Route untuk memaparkan borang tambah jawatan baru
Route::get('/jawatan/create', [JawatanController::class, 'create'])->name('jawatan.create');
// Route untuk menyimpan data baru
Route::post('/jawatan', [JawatanController::class, 'store'])->name('jawatan.store');
// Route untuk memaparkan borang edit jawatan berdasarkan ID jawatan
Route::get('/jawatan/{id}/edit', [JawatanController::class, 'paparBorangEdit'])->name('jawatan.edit');
// Route untuk mengupdate data berdasarkan ID jawatan
Route::put('/jawatan/{id}', [JawatanController::class, 'update'])->name('jawatan.update');
// Route untuk menghapus data berdasarkan ID jawatan
Route::delete('/jawatan/{id}', [JawatanController::class, 'destroy'])->name('jawatan.destroy');

// Routing resource
Route::get('ahli/parlimen', [AhliParlimenController::class, 'parlimen'])->name('ahli.parlimen');
Route::resource('/ahli', AhliParlimenController::class);
Route::resource('/unit', UnitController::class);
Route::resource('/gelaran', GelaranController::class);
Route::resource('/parti', PartiController::class)->except('show');
Route::resource('/users', UserController::class)->only('index', 'create', 'store', 'edit', 'update', 'destroy');


