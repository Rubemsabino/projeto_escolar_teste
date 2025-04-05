<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Meu Sistema')</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('imagens/logo.png') }}">

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Flowbite Icons -->
    <link href="https://unpkg.com/flowbite@1.5.1/dist/flowbite.min.css" rel="stylesheet" />

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-300">
    <!-- Navbar modificada para ficar fixa -->
    <nav class="bg-blue-600 text-white p-4 shadow-md fixed top-0 left-0 right-0 z-50"
        x-data="{ open: false, scrolled: false }" @scroll.window="scrolled = window.scrollY > 10">
        <div class="container mx-auto flex justify-between items-center">
            <img src="{{ asset('imagens/logo.png') }}" alt="Foto do Aluno" class="w-10 h-10 rounded-full">
            <h1>
                @php
                $roles = [
                'master' => 'Super Administrador',
                'admin' => 'Administrador',
                'professor' => 'Professor',
                'aluno' => 'Aluno',
                'coordenacao' => 'Coordenação',
                'direcao' => 'Direção'
                ];
                echo $roles[auth()->user()->role] ?? auth()->user()->role;
                @endphp
            </h1>

            <div class="flex items-center space-x-4">
                <span class="hidden md:block">Seja Bem-Vindo, {{ auth()->user()->name }}</span>

                <!-- Ícone do usuário (opcional) -->
                <div class="relative" x-data="{ openDropdown: false }">
                    <button @click="openDropdown = !openDropdown"
                        class="flex items-center space-x-1 focus:outline-none">
                        <span class="md:hidden">{{ auth()->user()->name }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </button>

                    <!-- Dropdown (opcional) -->
                    <div x-show="openDropdown" @click.away="openDropdown = false"
                        class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 w-full text-left">
                                Sair
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Menu Desktop -->
            <ul class="hidden md:flex space-x-6">
                <li><a href="{{ route('home') }}" class="hover:text-gray-300">Início</a></li>

                @if(auth()->user()->role !== 'aluno')
                <!-- Verifica se o usuário logado é um aluno e nao exibe as opcoes abaixo -->
                <li><a href="{{ route('alunos.listar') }}" class="hover:text-gray-300">Aluno</a></li>
                <li><a href="{{ route('professores.listar') }}" class="hover:text-gray-300">Professor</a></li>
                <li><a href="#" class="hover:text-gray-300">Coordenação</a></li>
                <li><a href="#" class="hover:text-gray-300">Direção</a></li>
                @endif
            </ul>

            <!-- Botão Menu Mobile -->
            <button @click="open = !open" class="md:hidden text-white focus:outline-none">
                ☰
            </button>
        </div>

        <!-- Menu Mobile -->
        <div x-show="open" class="md:hidden bg-blue-700 text-white p-4 space-y-2">
            <div class="pb-2 border-b border-blue-600">
                <span class="font-semibold">{{ auth()->user()->name }}</span>
            </div>
            <a href="{{ route('home') }}" class="block py-2 hover:text-gray-300">Início</a>
            @if(auth()->user()->role !== 'aluno')
            <a href="{{ route('alunos.listar') }}" class="block py-2 hover:text-gray-300">Aluno</a>
            <a href="{{ route('professores.listar') }}" class="block py-2 hover:text-gray-300">Professor</a>
            <a href="#" class="block py-2 hover:text-gray-300">Coordenação</a>
            <a href="#" class="block py-2 hover:text-gray-300">Direção</a>
            @endif
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="block py-2 hover:text-gray-300 w-full text-left">Sair</button>
            </form>
        </div>
    </nav>

    <!-- Conteúdo da Página - Adicionado padding-top para compensar a navbar fixa -->
    <div class="container mx-auto p-8 bg-white shadow-xl rounded-lg mt-24">
        <!-- Aumentei o mt para mt-24 -->
        @yield('content')
    </div>
</body>

</html>