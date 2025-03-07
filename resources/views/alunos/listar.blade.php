@extends('layouts.app')

@section('title', 'Lista de Alunos')

@section('content')

<body class="bg-gray-300">

    <!-- Logo -->
    <div class="mb-6 flex justify-center">
        <img src="{{ asset('imagens/logo.png') }}" alt="Foto do Aluno"
            class="w-20 h-20 rounded-full border-4 border-gray-300">
    </div>

    <h2 class="text-2xl font-bold mb-6 text-black-500 text-center">LISTA DE ALUNOS</h2>

    <!-- Botão -->
    <div class="flex justify-center">
        <a href="{{ route('alunos.criar') }}"
            class="bg-blue-400 hover:bg-green-700 text-white px-4 py-1 rounded-full ml-4 transition duration-300"
            title="Adicionar Novo Aluno">
            Novo
        </a>
    </div>

    <div class="flex justify-center items-center">
        <form method="GET" action="{{ route('alunos.buscar') }}"
            class="flex items-center space-x-2 bg-white p-4 rounded-full shadow-lg">
            <input type="text" name="search" placeholder="Buscar..." value="{{ request('search') }}"
                class="border p-3 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-400 w-64">
            <button type="submit" class="bg-blue-500 text-white px-4 py-1 rounded-full hover:bg-blue-600"
                title="Buscar aluno">Buscar</button>
        </form>
    </div>

    <table class="w-full table-auto border-collapse mt-4">
        <thead>
            <tr class="bg-gray-100">
                <th class="border-b px-4 py-2 text-center text-sm font-medium text-gray-700">Matrícula</th>
                <th class="border-b px-4 py-2 text-center text-sm font-medium text-gray-700">Nome Completo</th>
                <th class="border-b px-4 py-2 text-center text-sm font-medium text-gray-700">Foto</th>
                <th class="border-b px-4 py-2 text-center text-sm font-medium text-gray-700">Responsável</th>
                <th class="border-b px-4 py-2 text-center text-sm font-medium text-gray-700">CPF</th>
                <th class="border-b px-4 py-2 text-center text-sm font-medium text-gray-700">Idade</th>
                <th class="border-b px-4 py-2 text-center text-sm font-medium text-gray-700">Ações</th>
            </tr>
        </thead>

        <tbody>
            @foreach($alunos as $aluno)
            <tr class="hover:bg-gray-100">
                <td class="border-b px-4 py-2 text-sm text-gray-700 text-center">{{ $aluno->id }}</td>
                <td class="border-b px-4 py-2 text-sm text-gray-700 text-center">{{ $aluno->nome}}</td>
                <td class="border-b px-4 py-2 text-sm text-gray-700 text-center">
                    <!-- Exemplo na View de Exibição -->
                    @if($aluno->foto == 'sem_foto')
                    <p>SEM FOTO</p>
                    @else
                    <div class="flex justify-center">
                        <img src="{{ asset('storage/' . $aluno->foto) }}" alt="Foto do Aluno"
                            class="w-16 h-16 object-cover rounded-full mt-2">
                    </div>
                    @endif

                </td>
                <td class="border-b px-4 py-2 text-sm text-gray-700 text-center">{{ $aluno->nome_completo_responsavel }}
                </td>
                <td class="border-b px-4 py-2 text-sm text-gray-700 text-center">{{ $aluno->cpf }}</td>
                <td class="border-b px-4 py-2 text-sm text-gray-700 text-center">{{ $aluno->idade }}</td>

                <td class="border-b px-4 py-2 text-sm text-center">
                    <div class="flex items-center justify-center">
                        <!-- Botão com ícone azul -->
                        <a href="{{ route('alunos.ver', $aluno->id) }}"
                            class="inline-flex items-center text-blue-600 hover:text-blue-700 bg-blue-100 hover:bg-blue-200 px-4 py-2 rounded-lg"
                            title="Ver dados do aluno">
                            <svg class="w-6 h-6 text-blue-600 mr-2" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M14.6144 7.19994c.3479.48981.5999 1.15357.5999 1.80006 0 1.6569-1.3432 3-3 3-1.6569 0-3.00004-1.3431-3.00004-3 0-.67539.22319-1.29865.59983-1.80006M6.21426 6v4m0-4 6.00004-3 6 3-6 2-2.40021-.80006M6.21426 6l3.59983 1.19994M6.21426 19.8013v-2.1525c0-1.6825 1.27251-3.3075 2.95093-3.6488l3.04911 2.9345 3-2.9441c1.7026.3193 3 1.9596 3 3.6584v2.1525c0 .6312-.5373 1.1429-1.2 1.1429H7.41426c-.66274 0-1.2-.5117-1.2-1.1429Z" />
                            </svg>
                            Ver
                        </a>

                        <!-- Botão com ícone verde -->
                        <a href="#"
                            class="inline-flex items-center text-green-600 hover:text-green-700 bg-green-100 hover:bg-green-200 px-4 py-2 rounded-lg ml-4"
                            title="Matrícular aluno">
                            <svg class="w-6 h-6 text-green-600 mr-2" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M14.6144 7.19994c.3479.48981.5999 1.15357.5999 1.80006 0 1.6569-1.3432 3-3 3-1.6569 0-3.00004-1.3431-3.00004-3 0-.67539.22319-1.29865.59983-1.80006M6.21426 6v4m0-4 6.00004-3 6 3-6 2-2.40021-.80006M6.21426 6l3.59983 1.19994M6.21426 19.8013v-2.1525c0-1.6825 1.27251-3.3075 2.95093-3.6488l3.04911 2.9345 3-2.9441c1.7026.3193 3 1.9596 3 3.6584v2.1525c0 .6312-.5373 1.1429-1.2 1.1429H7.41426c-.66274 0-1.2-.5117-1.2-1.1429Z" />
                            </svg>
                            Matricular
                        </a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
@endsection