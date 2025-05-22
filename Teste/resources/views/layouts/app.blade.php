<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Meu Sistema')</title>

    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('imagens/logo.png') }}">

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-300">
    <!-- Navbar fixa no topo -->
    <nav class="bg-blue-300 text-black p-4 shadow-md fixed top-0 left-0 right-0 z-50"
        x-data="{ open: false, scrolled: false }" @scroll.window="scrolled = window.scrollY > 10">

        <div class="container mx-auto flex justify-between items-center">
            <!-- Logo e função do usuário -->
            <div class="flex items-center space-x-4">
                <img src="{{ asset('imagens/jmws_logo.png') }}" alt="Logo do Sistema" class="w-10 h-10 rounded-full">
                <h1 class="text-lg font-semibold">
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
            </div>

            <!-- Área do usuário -->
            <div class="flex items-center space-x-6">
                <!-- Nome do usuário (visível apenas em desktop) -->
                <span class="hidden md:block text-sm font-medium">Seja Bem-Vindo, {{ auth()->user()->name }}</span>

                <!-- Dropdown do usuário -->
                <div class="relative" x-data="{ openDropdown: false }">
                    <button @click="openDropdown = !openDropdown"
                        class="flex items-center space-x-1 focus:outline-none hover:text-gray-200 transition-colors">
                        <span class="md:hidden text-sm">{{ auth()->user()->name }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </button>

                    <!-- Menu dropdown -->
                    <div x-show="openDropdown" @click.away="openDropdown = false"
                        class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 divide-y divide-gray-100">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors">
                                Sair
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Menu desktop -->
                <ul class="hidden md:flex space-x-6">
                    <li><a href="{{ route('home') }}" class="hover:text-gray-200 transition-colors">Início</a></li>

                    @if(auth()->user()->role !== 'aluno')
                    <<li class="relative group">
                        <a href="{{ route('escolas.listar') }}"
                            class="hover:text-gray-200 transition-colors flex items-center">
                            Escalas
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </a>

                        <!-- Dropdown menu -->
                        <div
                            class="absolute hidden group-hover:block bg-white text-gray-800 rounded-md shadow-lg py-2 min-w-[200px] z-10">
                            <a href="{{ route('escolas.criar') }}" class="block px-4 py-2 hover:bg-gray-100">Criar
                                Escala</a>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100">Gerenciar Escalas</a>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100">Histórico</a>
                        </div>
                        </li>
                        <li><a href="{{ route('alunos.listar') }}"
                                class="hover:text-gray-200 transition-colors">Alunos</a></li>
                        <li><a href="{{ route('professores.listar') }}"
                                class="hover:text-gray-200 transition-colors">Professores</a></li>
                        <li><a href="#" class="hover:text-gray-200 transition-colors">Coordenação</a></li>
                        <li><a href="#" class="hover:text-gray-200 transition-colors">Direção</a></li>
                        @endif
                </ul>

                <!-- Botão do menu mobile -->
                <button @click="open = !open"
                    class="md:hidden text-white focus:outline-none hover:text-gray-200 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Menu mobile -->
        <div x-show="open" class="md:hidden bg-blue-700 text-white p-4 space-y-2 mt-2">
            <div class="pb-2 border-b border-blue-600">
                <span class="font-semibold">{{ auth()->user()->name }}</span>
            </div>

            <a href="{{ route('home') }}" class="block py-2 hover:text-gray-200 transition-colors">Início</a>

            @if(auth()->user()->role !== 'aluno')
            <a href="{{ route('alunos.listar') }}" class="block py-2 hover:text-gray-200 transition-colors">Alunos</a>
            <a href="{{ route('professores.listar') }}"
                class="block py-2 hover:text-gray-200 transition-colors">Professores</a>
            <a href="#" class="block py-2 hover:text-gray-200 transition-colors">Coordenação</a>
            <a href="#" class="block py-2 hover:text-gray-200 transition-colors">Direção</a>
            @endif

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="block w-full text-left py-2 hover:text-gray-200 transition-colors">
                    Sair
                </button>
            </form>
        </div>
    </nav>

    <!-- Conteúdo principal -->
    <main class="container mx-auto p-6 bg-white shadow-xl rounded-lg mt-24">
        @yield('content')
    </main>
</body>

</html>