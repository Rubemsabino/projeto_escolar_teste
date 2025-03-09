@extends('layouts.app')

@section('title', 'Editar professor')

@section('content')

@if(session('success'))
<script>
Swal.fire({
    title: 'Sucesso!',
    text: '{{ session('
    success ') }}',
    icon: 'success',
    confirmButtonText: 'OK'
});
</script>
@endif

@if($errors->any())
<script>
Swal.fire({
    title: 'Erro!',
    text: '{{ $errors->first() }}',
    icon: 'error',
    confirmButtonText: 'OK'
});
</script>
@endif

<!-- Logo -->
<div class="mb-6 flex justify-center">
    <img src="{{ asset('imagens/logo.png') }}" alt="Foto do Aluno"
        class="w-20 h-20 rounded-full border-4 border-gray-300">
</div>

<h2 class="text-2xl font-bold mb-6 text-bleck-500 text-center">EDITAR PROFESSOR</h2>

<form action="{{ route('professores.atualizar', $professor->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <!-- Método HTTP PUT para atualização -->
    <fieldset class="border border-gray-400 p-4 rounded-lg">
        <legend class="text-gray-600 font-semibold px-2">Informações Pessoais</legend>

        <div class="mb-4 grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label for="matricula" class="block text-gray-500">Matrícula</label>
                <input type="text" id="matricula" name="matricula"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-yellow-100"
                    value="{{($professor->id)}}" readonly>
            </div>
            <div>
                <label for="foto" class="block text-gray-500">Foto</label>
                <!-- Contêiner flex para alinhar a foto e o input com mais espaço entre eles -->
                <div class="flex items-center space-x-8 mb-4">
                    <!-- Exibe a foto atual se existir -->
                    @if($professor->foto == 'sem_foto')
                    <p>SEM FOTO</p>
                    @else
                    <img src="{{ asset('storage/' . $professor->foto) }}" alt="Foto do Aluno"
                        class="w-16 h-16 object-cover rounded-full mt-2">
                    @endif

                    <!-- Input para selecionar nova foto (alinhado à direita da foto) -->
                    <input type="file" id="foto" name="foto"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-blue-100">
                </div>
            </div>
        </div>

        <div class="mb-4 grid grid-cols-1 md:grid-cols-6 gap-4">
            <div class="md:col-span-2">
                <label for="nome" class="block text-gray-500">Nome</label>
                <input type="text" id="nome" name="nome"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100"
                    placeholder="Digite seu nome completo" value="{{($professor->nome)}}">
            </div>

            <div>
                <label for="data_de_nascimento" class="block text-gray-500">Data de Nascimento</label>
                <input type="date" id="data_de_nascimento" name="data_de_nascimento"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100"
                    onchange="calcularIdade()" value="{{($professor->data_de_nascimento)}}">
            </div>

            <div>
                <label for="idade" class="block text-gray-500">Idade</label>
                <input type="text" id="idade" name="idade"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100"
                    placeholder="Só números" value="{{($professor->idade)}}">
            </div>

            <div>
                <label for="sexo" class="block text-gray-500">Sexo</label>
                <select id="sexo" name="sexo"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-blue-100">
                    <option value="" disabled>Selecione o sexo</option>
                    <option value="masculino" @selected($professor->sexo == 'masculino')>Masculino</option>
                    <option value="feminino" @selected($professor->sexo == 'feminino')>Feminino</option>
                    <option value="outros" @selected($professor->sexo == 'outros')>Outros</option>
                </select>
            </div>

            <div>
                <label for="cpf" class="block text-gray-500">CPF</label>
                <input type="text" id="cpf" name="cpf"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100"
                    placeholder="Só números" value="{{($professor->cpf)}}">
            </div>
        </div>

        <div class="mb-4 grid grid-cols-1 md:grid-cols-4 gap-4">

            <div>
                <label for="rg" class="block text-gray-500">RG</label>
                <input type="text" id="rg" name="rg"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100 focus:border-red-500"
                    placeholder="Só números" value="{{($professor->rg)}}">
            </div>

            <div>
                <label for="naturalidade" class="block text-gray-500">Naturalidade</label>
                <input type="text" id="naturalidade" name="naturalidade"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100"
                    placeholder="Digite a cidade" value="{{($professor->naturalidade)}}">
            </div>

            <div>
                <label for="nacionalidade" class="block text-gray-500">Nacionalidade</label>
                <input type="text" id="nacionalidade" name="nacionalidade"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100"
                    placeholder="Automático" value="{{($professor->nacionalidade)}}">
            </div>

            <div>
                <label for="celular" class="block text-gray-500">Celular</label>
                <input type="text" id="celular" name="celular"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100 focus:border-red-500"
                    placeholder="Só números" oninput="mascaraCelular(this)" value="{{($professor->celular)}}">
            </div>

        </div>

        <div class="mb-4 grid grid-cols-1 md:grid-cols-6 gap-4">
            <div>
                <label for="cep" class="block text-gray-500">CEP</label>
                <input type="text" id="cep" name="cep"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100"
                    placeholder="Só números" value="{{($professor->cep)}}">
            </div>

            <div>
                <label for="rua" class="block text-gray-500">Rua</label>
                <input type="text" id="rua" name="rua"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100"
                    placeholder="Automático" value="{{($professor->rua)}}">
            </div>

            <div>
                <label for="numero" class="block text-gray-500">Número</label>
                <input type="text" id="numero" name="numero"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100"
                    placeholder="Só números" value="{{($professor->numero)}}">
            </div>

            <div>
                <label for="bairro" class="block text-gray-500">Bairro</label>
                <input type="text" id="bairro" name="bairro"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100"
                    placeholder="Automático" value="{{($professor->bairro)}}">
            </div>

            <div>
                <label for="cidade" class="block text-gray-500">Cidade</label>
                <input type="text" id="cidade" name="cidade"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100"
                    placeholder="Automático" value="{{($professor->cidade)}}">
            </div>

            <div>
                <label for="estado" class="block text-gray-500">Estado</label>
                <input type="text" id="estado" name="estado"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100"
                    placeholder="Automático" value="{{($professor->estado)}}">
            </div>
        </div>

    </fieldset>

    <fieldset class="border border-gray-400 p-4 rounded-lg">
        <legend class="text-gray-600 font-semibold px-2">Informações sobre formação</legend>

        <div class="mb-4 grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label for="formacao_graduacao" class="block text-gray-500">Graduação</label>
                <select id="formacao_graduacao" name="formacao_graduacao"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100">
                    <option value="" disabled selected>Selecione uma graduação</option>
                    <option value="Pedagogia"
                        {{ old('formacao_graduacao', $professor->formacao_graduacao ?? '') == 'Pedagogia' ? 'selected' : '' }}>
                        Pedagogia</option>
                    <option value="Letras Português"
                        {{ old('formacao_graduacao', $professor->formacao_graduacao ?? '') == 'Letras Português' ? 'selected' : '' }}>
                        Letras Português</option>
                    <option value="Letras Inglês"
                        {{ old('formacao_graduacao', $professor->formacao_graduacao ?? '') == 'Letras Inglês' ? 'selected' : '' }}>
                        Letras Inglês</option>
                    <option value="Letras Espanhol"
                        {{ old('formacao_graduacao', $professor->formacao_graduacao ?? '') == 'Letras Espanhol' ? 'selected' : '' }}>
                        Letras Espanhol</option>
                    <option value="Letras Francês"
                        {{ old('formacao_graduacao', $professor->formacao_graduacao ?? '') == 'Letras Francês' ? 'selected' : '' }}>
                        Letras Francês</option>
                    <option value="Letras Libras"
                        {{ old('formacao_graduacao', $professor->formacao_graduacao ?? '') == 'Letras Libras' ? 'selected' : '' }}>
                        Letras Libras</option>
                    <option value="Matemática"
                        {{ old('formacao_graduacao', $professor->formacao_graduacao ?? '') == 'Matemática' ? 'selected' : '' }}>
                        Matemática</option>
                    <option value="História"
                        {{ old('formacao_graduacao', $professor->formacao_graduacao ?? '') == 'História' ? 'selected' : '' }}>
                        História</option>
                    <option value="Geografia"
                        {{ old('formacao_graduacao', $professor->formacao_graduacao ?? '') == 'Geografia' ? 'selected' : '' }}>
                        Geografia</option>
                    <option value="Química"
                        {{ old('formacao_graduacao', $professor->formacao_graduacao ?? '') == 'Química' ? 'selected' : '' }}>
                        Química</option>
                    <option value="Filosofia"
                        {{ old('formacao_graduacao', $professor->formacao_graduacao ?? '') == 'Filosofia' ? 'selected' : '' }}>
                        Filosofia</option>
                    <option value="Sociologia"
                        {{ old('formacao_graduacao', $professor->formacao_graduacao ?? '') == 'Sociologia' ? 'selected' : '' }}>
                        Sociologia</option>
                    <option value="Educação Física"
                        {{ old('formacao_graduacao', $professor->formacao_graduacao ?? '') == 'Educação Física' ? 'selected' : '' }}>
                        Educação Física</option>
                    <option value="Artes Visuais"
                        {{ old('formacao_graduacao', $professor->formacao_graduacao ?? '') == 'Artes Visuais' ? 'selected' : '' }}>
                        Artes Visuais</option>
                    <option value="Música"
                        {{ old('formacao_graduacao', $professor->formacao_graduacao ?? '') == 'Música' ? 'selected' : '' }}>
                        Música</option>
                    <option value="Teatro"
                        {{ old('formacao_graduacao', $professor->formacao_graduacao ?? '') == 'Teatro' ? 'selected' : '' }}>
                        Teatro</option>
                    <option value="Teologia"
                        {{ old('formacao_graduacao', $professor->formacao_graduacao ?? '') == 'Teologia' ? 'selected' : '' }}>
                        Teologia</option>
                </select>
            </div>


            <div>
                <label for="turno_que_trabalha" class="block text-gray-500">Turno que Trabalha</label>
                <select id="turno_que_trabalha" name="turno_que_trabalha"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100">
                    <option value="" disabled selected>Selecione o turno</option>
                    <option value="Matutino"
                        {{ old('turno_que_trabalha', $professor->turno_que_trabalha ?? '') == 'Matutino' ? 'selected' : '' }}>
                        Matutino</option>
                    <option value="Vespertino"
                        {{ old('turno_que_trabalha', $professor->turno_que_trabalha ?? '') == 'Vespertino' ? 'selected' : '' }}>
                        Vespertino</option>
                    <option value="Noturno"
                        {{ old('turno_que_trabalha', $professor->turno_que_trabalha ?? '') == 'Noturno' ? 'selected' : '' }}>
                        Noturno</option>
                </select>
            </div>

            <div>
                <label for="data_de_admissao" class="block text-gray-500">Data de Admissão</label>
                <input type="date" id="data_de_admissao" name="data_de_admissao"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100"
                    value="{{($professor->data_de_admissao)}}">
            </div>

            <div>
                <label for="vinculo_empregaticio" class="block text-gray-500">Vínculo empregatício</label>
                <select id="vinculo_empregaticio" name="vinculo_empregaticio"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100">
                    <option value="" disabled selected>Selecione o vínculo</option>
                    <option value="CLT"
                        {{ old('vinculo_empregaticio', $professor->vinculo_empregaticio ?? '') == 'CLT' ? 'selected' : '' }}>
                        CLT</option>
                    <option value="Estatutário"
                        {{ old('vinculo_empregaticio', $professor->vinculo_empregaticio ?? '') == 'Estatutário' ? 'selected' : '' }}>
                        Estatutário</option>
                    <option value="Temporário"
                        {{ old('vinculo_empregaticio', $professor->vinculo_empregaticio ?? '') == 'Temporário' ? 'selected' : '' }}>
                        Temporário</option>
                    <option value="Estágio"
                        {{ old('vinculo_empregaticio', $professor->vinculo_empregaticio ?? '') == 'Estágio' ? 'selected' : '' }}>
                        Estágio</option>
                    <option value="Freelancer"
                        {{ old('vinculo_empregaticio', $professor->vinculo_empregaticio ?? '') == 'Freelancer' ? 'selected' : '' }}>
                        Freelancer</option>
                    <option value="Cooperado"
                        {{ old('vinculo_empregaticio', $professor->vinculo_empregaticio ?? '') == 'Cooperado' ? 'selected' : '' }}>
                        Cooperado</option>
                    <option value="Terceirizado"
                        {{ old('vinculo_empregaticio', $professor->vinculo_empregaticio ?? '') == 'Terceirizado' ? 'selected' : '' }}>
                        Terceirizado</option>
                </select>
            </div>
        </div>
    </fieldset>

    <div class="flex flex-col sm:flex-row justify-center gap-2">
        <button type="submit"
            class="bg-transparent text-blue-500 border border-blue-500 px-6 py-3 rounded-lg mt-4 hover:bg-blue-500 hover:text-white hover:font-bold transition">Editar</button>
        <a href="{{ route('professores.ver', $professor->id)}}"
            class="bg-transparent text-purple-500 border border-purple-500 px-6 py-3 rounded-lg mt-4 hover:bg-purple-500 hover:text-white hover:font-bold transition"
            title="Adicionar Novo Aluno">
            Voltar
        </a>
    </div>

</form>

<script src="{{ asset('js/alunos/alunos.js') }}"></script>

@endsection