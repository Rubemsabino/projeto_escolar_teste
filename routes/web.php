<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\CoordenadoraController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::prefix('alunos')->name('alunos.')->group(function () {
    Route::get('listar', [AlunoController::class, 'index'])->name('listar'); // Listar alunos
    Route::get('criar', [AlunoController::class, 'create'])->name('criar'); // Formulário de criação
    Route::post('salvar', [AlunoController::class, 'store'])->name('salvar'); // Salvar novo aluno (POST)
    Route::get('buscar', [AlunoController::class, 'busca'])->name('buscar'); // Buscar alunos

    Route::get('{aluno}', [AlunoController::class, 'show'])->name('ver'); // Exibir um aluno específico
    Route::get('{aluno}/editar', [AlunoController::class, 'edit'])->name('editar'); // Formulário de edição
    Route::put('{aluno}/atualizar', [AlunoController::class, 'update'])->name('atualizar'); // Atualizar aluno
});

Route::prefix('professores')->name('professores.')->group(function () {
    Route::get('listar', [ProfessorController::class, 'index'])->name('listar'); // Listar professores
    Route::get('criar', [ProfessorController::class, 'create'])->name('criar'); // Formulário de criaçãoj
    Route::post('salvar', [ProfessorController::class, 'store'])->name('salvar'); // Processar criação (POST)
    Route::get('buscar', [ProfessorController::class, 'busca'])->name('buscar'); // Buscar professores

    Route::get('{professor}', [ProfessorController::class, 'show'])->name('ver'); // Exibir um professor específico
    Route::get('{professor}/editar', [ProfessorController::class, 'edit'])->name('editar'); // Formulário de edição
    Route::put('{professor}/atualizar', [ProfessorController::class, 'update'])->name('atualizar'); // Atualizar aluno
});

Route::prefix('coordenadoras')->name('coordenadoras.')->group(function () {
    Route::get('listar', [CoordenadoraController::class, 'index'])->name('listar'); // Listar professores
    Route::get('criar', [CoordenadoraController::class, 'create'])->name('criar'); // Formulário de criaçãoj
    Route::post('salvar', [CoordenadoraController::class, 'store'])->name('salvar'); // Processar criação (POST)
    Route::get('buscar', [CoordenadoraController::class, 'busca'])->name('buscar'); // Buscar professores

    Route::get('{coordenadora}', [CoordenadoraController::class, 'show'])->name('ver'); // Exibir um professor específico
    Route::get('{coordenadora}/editar', [CoordenadoraController::class, 'edit'])->name('editar'); // Formulário de edição
    Route::put('{coordenadora}/atualizar', [CoordenadoraController::class, 'update'])->name('atualizar'); // Atualizar aluno
});


