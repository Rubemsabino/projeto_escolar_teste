<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alunos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-300 flex">

    <!-- Sidebar -->
    <div id="sidebar"
        class="bg-blue-600 text-white w-64 min-h-screen p-4 space-y-4 transition-transform transform -translate-x-64 md:translate-x-0 fixed md:relative">
        <button id="menu-toggle" class="md:hidden text-white text-2xl focus:outline-none">
            ☰
        </button>
        <h2 class="text-xl font-bold">Meu Sistema</h2>
        <nav class="space-y-2 mt-4">
            <a href="#" class="block py-2 px-3 rounded hover:bg-blue-500">Início</a>
            <a href="#" class="block py-2 px-3 rounded hover:bg-blue-500">Alunos</a>
            <a href="#" class="block py-2 px-3 rounded hover:bg-blue-500">Sobre</a>
            <a href="#" class="block py-2 px-3 rounded hover:bg-blue-500">Contato</a>
        </nav>
    </div>

    <!-- Conteúdo Principal -->
    <div class="flex-1 p-8">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Lista de Alunos</h1>
        <div class="bg-white shadow-xl rounded-lg p-6">
            <p>Conteúdo aqui...</p>
        </div>
    </div>

    <script>
    document.getElementById("menu-toggle").addEventListener("click", function() {
        document.getElementById("sidebar").classList.toggle("-translate-x-64");
    });
    </script>

</body>

</html>