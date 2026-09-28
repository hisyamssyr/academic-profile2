<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/profil-mahasiswa', [PageController::class, 'profilMahasiswa'])->name('profil');
Route::get('/ide-agent', [PageController::class, 'ideAgent'])->name('ide-agent');
Route::get('/beranda', [PageController::class, 'beranda'])->name('beranda');
