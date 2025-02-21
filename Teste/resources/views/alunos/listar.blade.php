@extends('layouts.app')

@section('title', 'Lista de Alunos')

@section('content')

<body class="bg-gray-100">
    <h1 class="text-3xl font-semibold text-gray-800 mb-6 text-center">Lista de Alunos</h1>

    <div class="overflow-x-auto bg-white shadow-md rounded-lg p-4 mx-4">
        <table class="w-full table-auto border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border-b px-4 py-2 text-center text-sm font-medium text-gray-700">ID</th>
                    <th class="border-b px-4 py-2 text-center text-sm font-medium text-gray-700">Nome Completo</th>
                    <th class="border-b px-4 py-2 text-center text-sm font-medium text-gray-700">Responsável</th>
                    <th class="border-b px-4 py-2 text-center text-sm font-medium text-gray-700">CPF</th>
                    <th class="border-b px-4 py-2 text-center text-sm font-medium text-gray-700">Idade</th>
                    <th class="border-b px-4 py-2 text-center text-sm font-medium text-gray-700">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($alunos as $aluno)
                <tr class="hover:bg-gray-50">
                    <td class="border-b px-4 py-2 text-sm text-gray-700 text-center">{{ $aluno->id }}</td>
                    <td class="border-b px-4 py-2 text-sm text-gray-700 text-center">{{ $aluno->nome_completo }}</td>
                    <td class="border-b px-4 py-2 text-sm text-gray-700 text-center">{{ $aluno->nome_do_responsavel_principal }}</td>
                    <td class="border-b px-4 py-2 text-sm text-gray-700 text-center">{{ $aluno->cpf }}</td>
                    <td class="border-b px-4 py-2 text-sm text-gray-700 text-center">{{ $aluno->idade }}</td>
                    <td class="border-b px-4 py-2 text-sm text-center">
                        <a href="{{ route('alunos.listar') }}" class="btn bg-blue-600 text-white px-4 py-1 rounded hover:bg-blue-700">Ver</a>
                        <a href="#" class="btn bg-yellow-500 text-white px-4 py-1 rounded ml-4 hover:bg-yellow-600">Editar</a>
                        <a href="#" class="btn bg-green-600 hover:bg-green-700 text-white px-4 py-1 rounded ml-4 hover:bg-green-600 hover:bg-green-700">Matricular</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
@endsection
