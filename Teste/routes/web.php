<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EscolaController;

// Rota inicial (pública)
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Rotas autenticadas
Route::middleware(['auth', 'verified'])->group(function () {
    // Rota home/dashboard unificada
    Route::get('/home', [DashboardController::class, 'index'])->name('home');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Rotas de alunos
    Route::prefix('alunos')->name('alunos.')->group(function () {
        Route::get('listar', [AlunoController::class, 'index'])->name('listar');
        Route::get('criar', [AlunoController::class, 'create'])->name('criar');
        Route::post('salvar', [AlunoController::class, 'store'])->name('salvar');
        Route::get('buscar', [AlunoController::class, 'busca'])->name('buscar');
        Route::get('{aluno}', [AlunoController::class, 'show'])->name('ver');
        Route::get('{aluno}/editar', [AlunoController::class, 'edit'])->name('editar');
        Route::put('{aluno}/atualizar', [AlunoController::class, 'update'])->name('atualizar');
    });

    // Rotas de professores
    Route::prefix('professores')->name('professores.')->group(function () {
        Route::get('listar', [ProfessorController::class, 'index'])->name('listar');
        Route::get('criar', [ProfessorController::class, 'create'])->name('criar');
        Route::post('salvar', [ProfessorController::class, 'store'])->name('salvar');
        Route::get('buscar', [ProfessorController::class, 'busca'])->name('buscar');
        Route::get('{professor}', [ProfessorController::class, 'show'])->name('ver');
        Route::get('{professor}/editar', [ProfessorController::class, 'edit'])->name('editar');
        Route::put('{professor}/atualizar', [ProfessorController::class, 'update'])->name('atualizar');
    });

    // Rotas de escolas - CORREÇÃO AQUI
    Route::prefix('escolas')->name('escolas.')->group(function () {
        Route::get('listar', [EscolaController::class, 'index'])->name('listar');
        Route::get('criar', [EscolaController::class, 'create'])->name('criar');
        Route::post('salvar', [EscolaController::class, 'store'])->name('salvar');
        Route::get('buscar', [EscolaController::class, 'busca'])->name('buscar');
        Route::get('{escola}', [EscolaController::class, 'show'])->name('ver');
        Route::get('{escola}/editar', [EscolaController::class, 'edit'])->name('editar');
        Route::put('{escola}/atualizar', [EscolaController::class, 'update'])->name('atualizar');
    });
});