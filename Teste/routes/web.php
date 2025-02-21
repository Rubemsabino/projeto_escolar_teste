<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('alunos')->name('alunos.')->group(function () {
    Route::get('listar', [AlunoController::class, 'index'])->name('listar'); 
});

Route::get('/home', function () {
    return view('home');
})->name('home');
