@extends('layouts.app')

@section('title', 'Painel Administrativo')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
    <!-- Card de Matrículas Pendentes -->
    <div class="bg-white p-6 rounded-lg shadow border-l-4 border-yellow-500">
        <div class="flex items-center">
            <div class="bg-yellow-100 p-3 rounded-full mr-4">
                <i class="fas fa-clipboard-list text-yellow-500"></i>
            </div>
            <div>
                <h3 class="text-sm text-gray-500">Matrículas Pendentes</h3>
                <p class="text-2xl font-bold">{{ $pendingEnrollments }}</p>
            </div>
        </div>
    </div>

    <!-- Card de Financeiro -->
    <div class="bg-white p-6 rounded-lg shadow border-l-4 border-red-500">
        <div class="flex items-center">
            <div class="bg-red-100 p-3 rounded-full mr-4">
                <i class="fas fa-money-bill-wave text-red-500"></i>
            </div>
            <div>
                <h3 class="text-sm text-gray-500">Pagamentos Atrasados</h3>
                <p class="text-2xl font-bold">{{ $overduePayments }}</p>
            </div>
        </div>
    </div>

    <!-- ... outros cards administrativos ... -->
</div>

<!-- Seção de Relatórios -->
<div class="mt-8 bg-white p-6 rounded-lg shadow">
    <h2 class="text-xl font-bold mb-4">Relatórios Recentes</h2>
    <table class="min-w-full">...</table>
</div>
@endsection