<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <!-- Menu -->
    <div class="flex justify-between p-4 bg-blue-600 text-white">
        <div class="text-lg font-semibold">Sistema Escolar</div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="bg-red-500 px-4 py-2 rounded hover:bg-red-600">Sair</button>
        </form>
    </div>

    <!-- Dashboard Content -->
    <div class="p-6">
        <h1 class="text-3xl font-bold mb-4">Bem-vindo, {{ auth()->user()->name }}!</h1>

        <div class="grid grid-cols-3 gap-6">
            <!-- Card de Informações Rápidas -->
            <div class="bg-white p-6 rounded shadow-md">
                <h2 class="text-xl font-semibold">Total de Alunos</h2>
                <p class="text-2xl">150</p>
            </div>

            <!-- Card de Informações Rápidas -->
            <div class="bg-white p-6 rounded shadow-md">
                <h2 class="text-xl font-semibold">Total de Professores</h2>
                <p class="text-2xl">25</p>
            </div>

            <!-- Card de Informações Rápidas -->
            <div class="bg-white p-6 rounded shadow-md">
                <h2 class="text-xl font-semibold">Total de Aulas</h2>
                <p class="text-2xl">20</p>
            </div>
        </div>
    </div>

</body>
</html>
