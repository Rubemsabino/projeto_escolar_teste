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
        <form method="GET" action="{{ route('alunos.buscar') }} "
            class="flex items-center space-x-2 bg-white p-4 rounded-full shadow-lg">
            <input type="text" name="search" placeholder="Buscar..." value="{{ request('search') }}"
                class="border p-3 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-400 w-64">
            <button type="submit" class="bg-blue-500 text-white px-4 py-1 rounded-full hover:bg-blue-600"
                title="Buscar aluno">Buscar</button>
        </form>
    </div>

    <!-- Tabela Responsiva -->
    <div class="overflow-x-auto">
        <table class="w-full table-auto border-collapse mt-4">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border-b px-4 py-2 text-center text-sm font-medium text-gray-700">Matrícula</th>
                    <th class="border-b px-4 py-2 text-center text-sm font-medium text-gray-700">Foto Aluno(a)</th>
                    <th class="border-b px-4 py-2 text-center text-sm font-medium text-gray-700">Nome Completo</th>
                    <th class="border-b px-4 py-2 text-center text-sm font-medium text-gray-700">Foto Responsável</th>
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
                    <td class="border-b px-4 py-2 text-sm text-gray-700 text-center">
                        @if($aluno->foto == 'sem_foto')
                        <p>SEM FOTO</p>
                        @else
                        <div class="flex justify-center">
                            <img src="{{ asset('storage/' . $aluno->foto) }}" alt="Foto do Aluno"
                                class="w-16 h-16 object-cover rounded-full mt-2">
                        </div>
                        @endif
                    </td>
                    <td class="border-b px-4 py-2 text-sm text-gray-700 text-center">{{ $aluno->nome }}</td>
                    <td class="border-b px-4 py-2 text-sm text-gray-700 text-center">
                        @if($aluno->foto == 'sem_foto')
                        <p>SEM FOTO</p>
                        @else
                        <div class="flex justify-center">
                            <img src="{{ asset('storage/' . $aluno->foto_responsavel) }}" alt="Foto do Responsável"
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
                            <a href="{{ route('alunos.ver', $aluno->id) }}"
                                class="inline-flex items-center text-blue-600 hover:text-blue-700 bg-blue-100 hover:bg-blue-200 px-4 py-2 rounded-lg"
                                title="Ver dados do aluno">
                                Ver
                            </a>
                            <a href="#"
                                class="inline-flex items-center text-green-600 hover:text-green-700 bg-green-100 hover:bg-green-200 px-4 py-2 rounded-lg ml-4"
                                title="Matricular aluno">
                                Matricular
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
</body>

@endsection
