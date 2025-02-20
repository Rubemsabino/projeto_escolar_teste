@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Lista de Alunos</h1>

    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border p-2">ID</th>
                <th class="border p-2">Nome Completo</th>
                <th class="border p-2">CPF</th>
                <th class="border p-2">Idade</th>
                <th class="border p-2">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alunos as $aluno)
                <tr class="border">
                    <td class="border p-2">{{ $aluno->id }}</td>
                    <td class="border p-2">{{ $aluno->nome_completo }}</td>
                    <td class="border p-2">{{ $aluno->cpf }}</td>
                    <td class="border p-2">{{ $aluno->idade }}</td>
                    <td class="border p-2">
                        <a href="{{ route('alunos.listar', $aluno->id) }}" class="text-blue-500">Ver</a>
                        <a href="#" class="text-yellow-500 ml-2">Editar</a>
                        <form action="#" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 ml-2">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
