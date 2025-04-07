@extends('layouts.app')

@section('title', 'Painel Escolar')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Cabeçalho -->
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Bem-vindo ao Sistema Escolar</h1>
        <p class="text-gray-600 mt-2">Gerencie sua instituição de ensino de forma eficiente</p>
    </div>

    <!-- Cards de Resumo -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Alunos -->
        <div class="bg-white rounded-lg shadow p-6 border-l-4 border-blue-500">
            <div class="flex items-center">
                <div class="bg-blue-100 p-3 rounded-full mr-4">
                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-gray-500 text-sm font-medium">Total de Alunos</h3>
                    <p class="text-2xl font-bold text-gray-800">1,248</p>
                </div>
            </div>
        </div>

        <!-- Professores -->
        <div class="bg-white rounded-lg shadow p-6 border-l-4 border-green-500">
            <div class="flex items-center">
                <div class="bg-green-100 p-3 rounded-full mr-4">
                    <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-gray-500 text-sm font-medium">Total de Professores</h3>
                    <p class="text-2xl font-bold text-gray-800">58</p>
                </div>
            </div>
        </div>

        <!-- Turmas -->
        <div class="bg-white rounded-lg shadow p-6 border-l-4 border-yellow-500">
            <div class="flex items-center">
                <div class="bg-yellow-100 p-3 rounded-full mr-4">
                    <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-gray-500 text-sm font-medium">Turmas Ativas</h3>
                    <p class="text-2xl font-bold text-gray-800">32</p>
                </div>
            </div>
        </div>

        <!-- Eventos -->
        <div class="bg-white rounded-lg shadow p-6 border-l-4 border-purple-500">
            <div class="flex items-center">
                <div class="bg-purple-100 p-3 rounded-full mr-4">
                    <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-gray-500 text-sm font-medium">Eventos Hoje</h3>
                    <p class="text-2xl font-bold text-gray-800">3</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Duas colunas -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Calendário -->
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Calendário Escolar</h2>
            <div class="bg-gray-100 rounded-lg p-4 min-h-64 flex items-center justify-center">
                <p class="text-gray-500">Aqui viria o componente de calendário</p>
            </div>
        </div>

        <!-- Avisos -->
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Avisos Recentes</h2>
            <div class="space-y-4">
                <div class="p-4 bg-blue-50 rounded-lg border-l-4 border-blue-500">
                    <h3 class="font-medium text-blue-800">Reunião de Pais - 15/05</h3>
                    <p class="text-sm text-blue-600 mt-1">Próxima reunião de pais e mestres marcada para às 19h no
                        auditório.</p>
                </div>
                <div class="p-4 bg-yellow-50 rounded-lg border-l-4 border-yellow-500">
                    <h3 class="font-medium text-yellow-800">Feriado Municipal</h3>
                    <p class="text-sm text-yellow-600 mt-1">Dia 20/05 não haverá aula devido ao feriado municipal.</p>
                </div>
                <div class="p-4 bg-green-50 rounded-lg border-l-4 border-green-500">
                    <h3 class="font-medium text-green-800">Olimpíada de Matemática</h3>
                    <p class="text-sm text-green-600 mt-1">Inscrições abertas até 30/05 para a olimpíada escolar de
                        matemática.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabela de Aulas -->
    <div class="bg-white rounded-lg shadow p-6 mt-8">
        <h2 class="text-xl font-bold text-gray-800 mb-4">Aulas de Hoje</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Horário</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Turma
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Disciplina</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Professor</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">07:30 - 08:20</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">9º Ano A</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Matemática</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Prof. Carlos Silva</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">08:20 - 09:10</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">9º Ano A</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Português</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Prof. Ana Oliveira</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">09:30 - 10:20</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">9º Ano A</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">História</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Prof. Marcos Souza</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection