@extends('layouts.app')

@section('title', 'Criar professor')

@section('content')

<!-- Logo -->
<div class="mb-6 flex justify-center">
    <img src="{{ asset('imagens/logo.png') }}" alt="Foto do Aluno"
        class="w-20 h-20 rounded-full border-4 border-gray-300">
</div>

<h2 class="text-2xl font-bold mb-6 text-gray-500 text-center">VER PROFESSOR</h2>

<form action="" method="POST" enctype="multipart/form-data" class="flex-1 overflow-y-auto p-4">
    @csrf
    <fieldset class="border border-gray-400 p-4 rounded-lg">
        <legend class="text-gray-600 font-semibold px-2">Informações Pessoais</legend>

        <div class="mb-4 grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label for="matricula" class="block text-gray-500">Matrícula</label>
                <input type="text" id="matricula" name="matricula"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-yellow-100"
                    value="{{($professor->id)}}" readonly>
            </div>
            <div class="mt-4">
                <label for="foto" class="block text-gray-500">Foto do Aluno</label>
                <!-- Exemplo na View de Exibição -->
                @if($professor->foto == 'sem_foto')
                <p>SEM FOTO</p>
                @else
                <img src="{{ asset('storage/' . $professor->foto) }}" alt="Foto do Aluno"
                    class="w-16 h-16 object-cover rounded-full mt-2">
                @endif
            </div>
        </div>

        <div class="mb-4 grid grid-cols-1 md:grid-cols-6 gap-4">
            <div class="md:col-span-2">
                <label for="nome" class="block text-gray-500">Nome</label>
                <input type="text" id="nome" name="nome"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100"
                    value="{{($professor->nome)}}" readonly>
            </div>

            <div>
                <label for="data_de_nascimento" class="block text-gray-500">Data de Nascimento</label>
                <input type="text" id="data_de_nascimento" name="data_de_nascimento"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-yellow-100"
                    value="{{ $professor->data_de_nascimento ? \Carbon\Carbon::parse($professor->data_de_nascimento)->format('d/m/Y') : '' }}"
                    readonly>
            </div>

            <div>
                <label for="idade" class="block text-gray-500">Idade</label>
                <input type="text" id="idade" name="idade"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100"
                    value="{{($professor->idade)}}" readonly>
            </div>

            <div>
                <label for="sexo" class="block text-gray-500">Sexo</label>
                <input type="text" id="sexo" name="sexo"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-yellow-100"
                    value="{{($professor->sexo)}}" readonly>
            </div>

            <div>
                <label for="cpf" class="block text-gray-500">CPF</label>
                <input type="text" id="cpf" name="cpf"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100"
                    value="{{($professor->cpf)}}" readonly>
            </div>
        </div>

        <div class="mb-4 grid grid-cols-1 md:grid-cols-4 gap-4">

            <div>
                <label for="rg" class="block text-gray-500">RG</label>
                <input type="text" id="rg" name="rg"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100 focus:border-red-500"
                    value="{{($professor->rg)}}" readonly>
            </div>

            <div>
                <label for="naturalidade" class="block text-gray-500">Naturalidade</label>
                <input type="text" id="naturalidade" name="naturalidade"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100"
                    value="{{($professor->naturalidade)}}" readonly>
            </div>

            <div>
                <label for="nacionalidade" class="block text-gray-500">Nacionalidade</label>
                <input type="text" id="nacionalidade" name="nacionalidade"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100"
                    value="{{($professor->nacionalidade)}}" readonly>
            </div>

            <div>
                <label for="celular" class="block text-gray-500">Celular</label>
                <input type="text" id="celular" name="celular"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100 focus:border-red-500"
                    value="{{($professor->celular)}}" readonly>
            </div>

        </div>

        <div class="mb-4 grid grid-cols-1 md:grid-cols-6 gap-4">
            <div>
                <label for="cep" class="block text-gray-500">CEP</label>
                <input type="text" id="cep" name="cep"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100"
                    value="{{($professor->cep)}}" readonly>
            </div>

            <div>
                <label for="rua" class="block text-gray-500">Rua</label>
                <input type="text" id="rua" name="rua"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100"
                    value="{{($professor->rua)}}" readonly>
            </div>

            <div>
                <label for="numero" class="block text-gray-500">Número</label>
                <input type="text" id="numero" name="numero"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100"
                    value="{{($professor->numero)}}" readonly>
            </div>

            <div>
                <label for="bairro" class="block text-gray-500">Bairro</label>
                <input type="text" id="bairro" name="bairro"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100"
                    value="{{($professor->bairro)}}" readonly>
            </div>

            <div>
                <label for="cidade" class="block text-gray-500">Cidade</label>
                <input type="text" id="cidade" name="cidade"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100"
                    value="{{($professor->cidade)}}" readonly>
            </div>

            <div>
                <label for="estado" class="block text-gray-500">Estado</label>
                <input type="text" id="estado" name="estado"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100"
                    value="{{($professor->estado)}}" readonly>
            </div>
        </div>

    </fieldset>

    <fieldset class="border border-gray-400 p-4 rounded-lg">
        <legend class="text-gray-600 font-semibold px-2">Informações sobre formação</legend>

        <div class="mb-4 grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label for="formacao_graduacao" class="block text-gray-500">Gradução</label>
                <input type="text" id="estado" name="estado"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100"
                    value="{{($professor->formacao_graduacao)}}" readonly>
            </div>

            <div>
                <label for="turno_que_trabalha" class="block text-gray-500">Turno que Trabalha</label>
                <input type="text" id="turno_que_trabalha" name="turno_que_trabalha"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100"
                    value="{{($professor->turno_que_trabalha)}}" readonly>
            </div>

            <div>
                <label for="data_de_admissao" class="block text-gray-500">Data de Admissão</label>
                <input type="text" id="data_de_admissao" name="data_de_admissao"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-yellow-100"
                    value="{{ $professor->data_de_admissao ? \Carbon\Carbon::parse($professor->data_de_admissao)->format('d/m/Y') : '' }}"
                    readonly>
            </div>

            <div>
                <label for="vinculo_empregaticio" class="block text-gray-500">Vínculo empregatício</label>
                <input type="text" id="vinculo_empregaticio" name="vinculo_empregaticio"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100"
                    value="{{($professor->vinculo_empregaticio)}}" readonly>
            </div>
        </div>

        <div class="flex flex-col sm:flex-row justify-center gap-2">
            <a href="{{ route('professores.editar', $professor->id)}}"
                class="bg-transparent text-yellow-500 border border-yellow-500 px-6 py-3 rounded-lg mt-4 hover:bg-yellow-500 hover:text-white hover:font-bold transition"
                title="Adicionar Novo Aluno">
                Editar Campos
            </a>
            <a href="{{ route('professores.listar', $professor->id)}}"
                class="bg-transparent text-purple-500 border border-purple-500 px-6 py-3 rounded-lg mt-4 hover:bg-purple-500 hover:text-white hover:font-bold transition"
                title="Adicionar Novo Aluno">
                Voltar
            </a>
        </div>
    </fieldset>
</form>

<script src="{{ asset('js/alunos/alunos.js') }}"></script>

@endsection