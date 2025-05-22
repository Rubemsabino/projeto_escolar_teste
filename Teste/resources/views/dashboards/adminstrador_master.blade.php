@extends('layouts.app')

@section('title', 'Nossas Escolas')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Nossas Escolas</h1>
        <div class="relative w-64">
            <input type="text" placeholder="Buscar escola..."
                class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
        </div>
    </div>

    <!-- Filtros -->
    <div class="flex flex-wrap gap-3 mb-8">
        <span class="px-4 py-2 bg-blue-100 text-blue-800 rounded-full text-sm font-medium">Todas</span>
        <span class="px-4 py-2 bg-gray-100 text-gray-800 rounded-full text-sm font-medium">Municipais</span>
        <span class="px-4 py-2 bg-gray-100 text-gray-800 rounded-full text-sm font-medium">Estaduais</span>
        <span class="px-4 py-2 bg-gray-100 text-gray-800 rounded-full text-sm font-medium">Particulares</span>
        <span class="px-4 py-2 bg-gray-100 text-gray-800 rounded-full text-sm font-medium">Ativas</span>
        <span class="px-4 py-2 bg-gray-100 text-gray-800 rounded-full text-sm font-medium">Em obras</span>
    </div>

    <!-- Grid de Escolas -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        <!-- Card Escola 1 -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
            <div class="p-1 bg-gradient-to-r from-blue-500 to-blue-300">
                <div class="bg-white p-4 rounded-t-lg flex justify-center">
                    <img src="https://via.placeholder.com/150x80?text=Escola+Primavera" alt="Logo Escola Primavera"
                        class="h-20 object-contain">
                </div>
            </div>
            <div class="p-6">
                <div class="flex justify-between items-start mb-2">
                    <h2 class="text-xl font-bold text-gray-800">Escola Municipal Primavera</h2>
                    <span class="px-2 py-1 bg-green-100 text-green-800 text-xs font-semibold rounded-full">Ativa</span>
                </div>
                <p class="text-gray-600 mb-4">Educação Infantil e Fundamental I</p>

                <div class="space-y-3">
                    <div class="flex items-center">
                        <i class="fas fa-map-marker-alt text-gray-400 mr-2"></i>
                        <span class="text-sm text-gray-600">Rua das Flores, 123 - Centro</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-phone-alt text-gray-400 mr-2"></i>
                        <span class="text-sm text-gray-600">(11) 1234-5678</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-users text-gray-400 mr-2"></i>
                        <span class="text-sm text-gray-600">342 alunos</span>
                    </div>
                </div>

                <div class="mt-6 pt-4 border-t border-gray-100 flex justify-between">
                    <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-medium">Detalhes</a>
                    <div class="flex space-x-1">
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star-half-alt text-yellow-400"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Escola 2 -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
            <div class="p-1 bg-gradient-to-r from-green-500 to-green-300">
                <div class="bg-white p-4 rounded-t-lg flex justify-center">
                    <img src="https://via.placeholder.com/150x80?text=Colégio+Sol+Nascente"
                        alt="Logo Colégio Sol Nascente" class="h-20 object-contain">
                </div>
            </div>
            <div class="p-6">
                <div class="flex justify-between items-start mb-2">
                    <h2 class="text-xl font-bold text-gray-800">Colégio Estadual Sol Nascente</h2>
                    <span class="px-2 py-1 bg-green-100 text-green-800 text-xs font-semibold rounded-full">Ativa</span>
                </div>
                <p class="text-gray-600 mb-4">Ensino Fundamental II e Médio</p>

                <div class="space-y-3">
                    <div class="flex items-center">
                        <i class="fas fa-map-marker-alt text-gray-400 mr-2"></i>
                        <span class="text-sm text-gray-600">Av. Principal, 456 - Zona Norte</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-phone-alt text-gray-400 mr-2"></i>
                        <span class="text-sm text-gray-600">(11) 2345-6789</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-users text-gray-400 mr-2"></i>
                        <span class="text-sm text-gray-600">520 alunos</span>
                    </div>
                </div>

                <div class="mt-6 pt-4 border-t border-gray-100 flex justify-between">
                    <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-medium">Detalhes</a>
                    <div class="flex space-x-1">
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="far fa-star text-yellow-400"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Escola 3 -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
            <div class="p-1 bg-gradient-to-r from-purple-500 to-purple-300">
                <div class="bg-white p-4 rounded-t-lg flex justify-center">
                    <img src="https://via.placeholder.com/150x80?text=Instituto+Saber" alt="Logo Instituto Saber"
                        class="h-20 object-contain">
                </div>
            </div>
            <div class="p-6">
                <div class="flex justify-between items-start mb-2">
                    <h2 class="text-xl font-bold text-gray-800">Instituto Educacional Saber</h2>
                    <span class="px-2 py-1 bg-green-100 text-green-800 text-xs font-semibold rounded-full">Ativa</span>
                </div>
                <p class="text-gray-600 mb-4">Educação Infantil ao Ensino Médio</p>

                <div class="space-y-3">
                    <div class="flex items-center">
                        <i class="fas fa-map-marker-alt text-gray-400 mr-2"></i>
                        <span class="text-sm text-gray-600">Rua do Conhecimento, 789 - Zona Sul</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-phone-alt text-gray-400 mr-2"></i>
                        <span class="text-sm text-gray-600">(11) 3456-7890</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-users text-gray-400 mr-2"></i>
                        <span class="text-sm text-gray-600">680 alunos</span>
                    </div>
                </div>

                <div class="mt-6 pt-4 border-t border-gray-100 flex justify-between">
                    <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-medium">Detalhes</a>
                    <div class="flex space-x-1">
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Escola 4 -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
            <div class="p-1 bg-gradient-to-r from-yellow-500 to-yellow-300">
                <div class="bg-white p-4 rounded-t-lg flex justify-center">
                    <img src="https://via.placeholder.com/150x80?text=Futuro+Brilhante" alt="Logo Futuro Brilhante"
                        class="h-20 object-contain">
                </div>
            </div>
            <div class="p-6">
                <div class="flex justify-between items-start mb-2">
                    <h2 class="text-xl font-bold text-gray-800">Centro Educacional Futuro Brilhante</h2>
                    <span class="px-2 py-1 bg-yellow-100 text-yellow-800 text-xs font-semibold rounded-full">Em
                        obras</span>
                </div>
                <p class="text-gray-600 mb-4">Ensino Fundamental I e II</p>

                <div class="space-y-3">
                    <div class="flex items-center">
                        <i class="fas fa-map-marker-alt text-gray-400 mr-2"></i>
                        <span class="text-sm text-gray-600">Av. do Progresso, 101 - Zona Leste</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-phone-alt text-gray-400 mr-2"></i>
                        <span class="text-sm text-gray-600">(11) 4567-8901</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-users text-gray-400 mr-2"></i>
                        <span class="text-sm text-gray-600">280 alunos</span>
                    </div>
                </div>

                <div class="mt-6 pt-4 border-t border-gray-100 flex justify-between">
                    <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-medium">Detalhes</a>
                    <div class="flex space-x-1">
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="far fa-star text-yellow-400"></i>
                        <i class="far fa-star text-yellow-400"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Adicione mais cards conforme necessário -->
    </div>

    <!-- Paginação -->
    <div class="mt-8 flex justify-center">
        <nav class="inline-flex rounded-md shadow">
            <a href="#" class="px-3 py-2 rounded-l-md border border-gray-300 bg-white text-gray-500 hover:bg-gray-50">
                <i class="fas fa-chevron-left"></i>
            </a>
            <a href="#" class="px-4 py-2 border-t border-b border-gray-300 bg-white text-blue-600 font-medium">1</a>
            <a href="#" class="px-4 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-50">2</a>
            <a href="#" class="px-4 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-50">3</a>
            <a href="#" class="px-3 py-2 rounded-r-md border border-gray-300 bg-white text-gray-500 hover:bg-gray-50">
                <i class="fas fa-chevron-right"></i>
            </a>
        </nav>
    </div>
</div>
@endsection