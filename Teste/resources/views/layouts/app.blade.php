@php
$exibir_menu=in_array(auth()->user()->role, ['master']);
@endphp
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

    <style>
        .main-content {
            transition: transform 0.3s ease-in-out;
        }

        .sidebar-open .main-content {
            transform: translateX(16rem);
        }
    </style>
</head>

<body class="bg-gray-300" x-data="{ sidebarOpen: false }" :class="{ 'sidebar-open': sidebarOpen }">
    <!-- Navbar fixa no topo -->
    <nav class="bg-blue-300 text-black p-4 shadow-md fixed top-0 left-0 right-0 z-50"
        x-data="{ open: false, scrolled: false }" @scroll.window="scrolled = window.scrollY > 10">

        <div class="container mx-auto flex justify-between items-center">
            <!-- Botão para abrir o menu lateral -->
            <button @click="sidebarOpen = true" class="mr-4 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

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

                    @if($exibir_menu)
                    <li class="relative group">
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
                            <a href="{{ route('escolas.listar') }}" class="block px-4 py-2 hover:bg-gray-100">Listar
                                Escala</a>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100">Gerenciar Escalas</a>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100">Histórico</a>
                        </div>
                    </li>
                    <li><a href="{{ route('alunos.listar') }}" class="hover:text-gray-200 transition-colors">Alunos</a>
                    </li>
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

            @if($exibir_menu)
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

    <!-- Menu Lateral -->
    <div class="fixed inset-0 z-50" x-show="sidebarOpen">
        <!-- Sidebar -->
        <div class="fixed inset-y-0 left-0 w-64 bg-white shadow-lg transform transition-transform duration-300 ease-in-out"
            :class="{ '-translate-x-full': !sidebarOpen, 'translate-x-0': sidebarOpen }">

            <div class="flex flex-col h-full">
                <!-- Cabeçalho do Sidebar -->
                <div class="flex items-center justify-between p-4 border-b">
                    <div class="flex items-center space-x-2">
                        <img src="{{ asset('imagens/jmws_logo.png') }}" alt="Logo" class="w-8 h-8 rounded-full">
                        <span class="font-semibold">Menu</span>
                    </div>
                    <button @click="sidebarOpen = false" class="text-gray-500 hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Conteúdo do Sidebar -->
                <div class="flex-1 overflow-y-auto p-4">
                    <ul class="space-y-2">
                        <li>
                            <a href="{{ route('home') }}"
                                class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                                Início
                            </a>
                        </li>

                        @if($exibir_menu)
                        <li>
                            <a href="{{ route('escolas.listar') }}"
                                class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                                Escolas
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('alunos.listar') }}"
                                class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                                Alunos
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('professores.listar') }}"
                                class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                Professores
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                                Coordenação
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                                </svg>
                                Direção
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>

                <!-- Rodapé do Sidebar -->
                <div class="p-4 border-t">
                    <div class="flex items-center">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=random"
                            alt="User" class="w-8 h-8 rounded-full mr-2">
                        <div>
                            <p class="font-medium">{{ auth()->user()->name }}</p>
                            <p class="text-sm text-gray-500">{{ auth()->user()->email }}</p>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('logout') }}" class="mt-4">
                        @csrf
                        <button type="submit"
                            class="w-full flex items-center justify-center p-2 text-red-600 hover:bg-red-50 rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            Sair
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Conteúdo principal -->
    <main class="main-content container mx-auto p-6 bg-white shadow-xl rounded-lg mt-24">
        @yield('content')
    </main>
</body>

</html>