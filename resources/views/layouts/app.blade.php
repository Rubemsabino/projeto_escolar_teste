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

    <!-- SweetAlert2: -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



</head>

<body class="bg-gray-300">
    <!-- Navbar -->
    <nav class="bg-blue-600 text-white p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <img src="{{ asset('imagens/logo.png') }}" alt="Foto do Aluno" class="w-10 h-10 rounded-full">
            <a href="{{ route('home') }}" class="text-xl font-bold">Meu Sistema</a>
            <ul class="hidden md:flex space-x-6">
                <li><a href="{{ route('home') }}" class="hover:text-gray-300">Início</a></li>
                <li><a href="{{ route('alunos.listar') }}" class="hover:text-gray-300">Alunos</a></li>
                <li><a href="{{ route('professores.listar') }}" class="hover:text-gray-300">Professores</a></li>
                <li><a href="{{ route('coordenadoras.listar') }}" class="hover:text-gray-300">Coordenação</a></li>
            </ul>
            <button class="md:hidden text-white focus:outline-none" id="menu-toggle">
                ☰
            </button>
        </div>
    </nav>

    <!-- Menu Mobile -->
    <div class="hidden md:hidden bg-blue-700 text-white p-4" id="mobile-menu">
        <a href="{{ route('home') }}" class="block py-2">Início</a>
        <a href="{{ route('alunos.listar') }}" class="block py-2">Alunos</a>
    </div>

    <!-- Conteúdo da Página -->
    <div class="container mx-auto p-8 bg-white shadow-xl rounded-lg mt-6">
        @yield('content')
    </div>

    <script>
    document.getElementById("menu-toggle").addEventListener("click", function() {
        document.getElementById("mobile-menu").classList.toggle("hidden");
    });
    </script>
</body>

</html>