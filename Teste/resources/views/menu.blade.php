<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alunos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-blue-600 text-white p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <a href="#" class="text-xl font-bold">Meu Sistema</a>
            <ul class="hidden md:flex space-x-6">
                <li><a href="#" class="hover:text-gray-300">Início</a></li>
                <li><a href="#" class="hover:text-gray-300">Alunos</a></li>
                <li><a href="#" class="hover:text-gray-300">Sobre</a></li>
                <li><a href="#" class="hover:text-gray-300">Contato</a></li>
            </ul>
            <button class="md:hidden text-white focus:outline-none" id="menu-toggle">
                ☰
            </button>
        </div>
    </nav>

    <!-- Menu Mobile -->
    <div class="hidden md:hidden bg-blue-700 text-white p-4" id="mobile-menu">
        <a href="#" class="block py-2">Início</a>
        <a href="#" class="block py-2">Alunos</a>
        <a href="#" class="block py-2">Sobre</a>
        <a href="#" class="block py-2">Contato</a>
    </div>

    <div class="container mx-auto p-8 bg-white shadow-xl rounded-lg mt-6">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Lista de Alunos</h1>
    </div>

    <script>
        document.getElementById("menu-toggle").addEventListener("click", function () {
            document.getElementById("mobile-menu").classList.toggle("hidden");
        });
    </script>
</body>

</html>
