@extends('layouts.app')

@section('title', 'Criar professor')

@section('content')

@if(session('success'))
    <script>
        Swal.fire({
            title: 'Sucesso!',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    </script>
@endif

@if($errors->any())
    <script>
        Swal.fire({
            title: 'Erro!',
            text: '{{ implode(' | ', $errors->all()) }}',  // Exibe todos os erros concatenados
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

<h2 class="text-2xl font-bold mb-6 text-gray-500 text-center">NOVO PROFESSOR</h2>

<form action="{{ route('professores.salvar') }}" method="POST" enctype="multipart/form-data" class="flex-1 overflow-y-auto p-4">
    @csrf
    <fieldset class="border border-gray-400 p-4 rounded-lg">
        <legend class="text-gray-600 font-semibold px-2">Informações Pessoais</legend>

        <div class="mb-4 grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label for="foto" class="block text-gray-500">Foto</label>
                <input type="file" id="foto" name="foto"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100 focus:bg-gray-100">
            </div>
        </div>

        <div class="mb-4 grid grid-cols-1 md:grid-cols-6 gap-4">
            <div class="md:col-span-2">
                <label for="nome" class="block text-gray-500">Nome</label>
                <input type="text" id="nome" name="nome"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100"
                    placeholder="Digite seu nome completo" required>
            </div>

            <div>
                <label for="data_de_nascimento" class="block text-gray-500">Data de Nascimento</label>
                <input type="date" id="data_de_nascimento" name="data_de_nascimento"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100"
                    onchange="calcularIdade()">
            </div>

            <div>
                <label for="idade" class="block text-gray-500">Idade</label>
                <input type="text" id="idade" name="idade"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100"
                    placeholder="Só números" readonly>
            </div>

            <div>
                <label for="sexo" class="block text-gray-500">Sexo</label>
                <select id="sexo" name="sexo"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100">
                    <option value="" disabled selected>Selecione o sexo</option>
                    <option value="masculino">Masculino</option>
                    <option value="feminino">Feminino</option>
                    <option value="outros">Outros</option>
                </select>
            </div>

            <div>
                <label for="cpf" class="block text-gray-500">CPF</label>
                <input type="text" id="cpf" name="cpf"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100"
                    placeholder="Só números">
            </div>
        </div>

        <div class="mb-4 grid grid-cols-1 md:grid-cols-4 gap-4">

            <div>
                <label for="rg" class="block text-gray-500">RG</label>
                <input type="text" id="rg" name="rg"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100 focus:border-red-500"
                    placeholder="Só números">
            </div>

            <div>
                <label for="naturalidade" class="block text-gray-500">Naturalidade</label>
                <input type="text" id="naturalidade" name="naturalidade"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100"
                    placeholder="Digite a cidade">
            </div>

            <div>
                <label for="nacionalidade" class="block text-gray-500">Nacionalidade</label>
                <input type="text" id="nacionalidade" name="nacionalidade"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100"
                    placeholder="Automático" readonly>
            </div>

            <div>
                <label for="celular" class="block text-gray-500">Celular</label>
                <input type="text" id="celular" name="celular"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100 focus:border-red-500"
                    placeholder="Só números" oninput="mascaraCelular(this)">
            </div>

        </div>

        <div class="mb-4 grid grid-cols-1 md:grid-cols-6 gap-4">
            <div>
                <label for="cep" class="block text-gray-500">CEP</label>
                <input type="text" id="cep" name="cep"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100"
                    placeholder="Só números">
            </div>

            <div>
                <label for="rua" class="block text-gray-500">Rua</label>
                <input type="text" id="rua" name="rua"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100"
                    placeholder="Automático" readonly>
            </div>

            <div>
                <label for="numero" class="block text-gray-500">Número</label>
                <input type="text" id="numero" name="numero"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100"
                    placeholder="Só números">
            </div>

            <div>
                <label for="bairro" class="block text-gray-500">Bairro</label>
                <input type="text" id="bairro" name="bairro"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100"
                    placeholder="Automático" readonly>
            </div>

            <div>
                <label for="cidade" class="block text-gray-500">Cidade</label>
                <input type="text" id="cidade" name="cidade"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100"
                    placeholder="Automático" readonly>
            </div>

            <div>
                <label for="estado" class="block text-gray-500">Estado</label>
                <input type="text" id="estado" name="estado"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100"
                    placeholder="Automático" readonly>
            </div>
        </div>

    </fieldset>

    <fieldset class="border border-gray-400 p-4 rounded-lg">
        <legend class="text-gray-600 font-semibold px-2">Informações sobre formação</legend>

        <div class="mb-4 grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label for="formacao_graduacao" class="block text-gray-500">Gradução</label>
                <select id="formacao_graduacao" name="formacao_graduacao"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100">
                    <option value="" disabled selected>Selecione uma graduação</option>
                    <option value="Pedagogia">Pedagogia</option>
                    <option value="Letras Português">Letras Português</option>
                    <option value="Letras Inglês">Letras Inglês</option>
                    <option value="Letras Espalhol">Letras Espalhol</option>
                    <option value="Letras Francês">Letras Francês</option>
                    <option value="Letras Libras">Letras Libras</option>
                    <option value="Matemática ">Matemática</option>
                    <option value="História ">História</option>
                    <option value="Geografia">Geografia</option>
                    <option value="Química ">Química</option>
                    <option value="Filosofia ">Filosofia</option>
                    <option value="Sociologia  ">Sociologia </option>
                    <option value="Educação Física ">Educação Física</option>
                    <option value="Artes Visuais ">Artes Visuais</option>
                    <option value="Música ">Música</option>
                    <option value="Teatro  ">Teatro </option>
                    <option value="Teologia ">Teologia</option>
                </select>
            </div>

            <div>
                <label for="turno_que_trabalha" class="block text-gray-500">Turno que Trabalha</label>
                <select id="turno_que_trabalha" name="turno_que_trabalha"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100">
                    <option value="" disabled selected>Selecione o turno</option>
                    <option value="Manhã">Manhã</option>
                    <option value="Tarde">Tarde</option>
                    <option value="Noite">Noite</option>
                </select>
            </div>

            <div>
                <label for="data_de_admissao" class="block text-gray-500">Data de Admissão</label>
                <input type="date" id="data_de_admissao" name="data_de_admissao"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100">
            </div>

            <div>
                <label for="vinculo_empregaticio" class="block text-gray-500">Vínculo empregatício</label>
                <select id="vinculo_empregaticio" name="vinculo_empregaticio"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100">
                    <option value="" disabled selected>Selecione o turno</option>
                    <option value="CLT">CLT</option>
                    <option value="Estatutário">Estatutário</option>
                    <option value="Temporário">Temporário</option>
                    <option value="Estágio">Estágio</option>
                    <option value="Freelancer ">Freelancer </option>
                    <option value="Cooperado">Cooperado</option>
                    <option value="Terceirizado">Terceirizado</option>
                </select>
            </div>
        </div>
    </fieldset>

    <div class="flex flex-col sm:flex-row justify-end gap-2">
        <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-lg mt-4">Criar</button>
    </div>
</form>

<script src="{{ asset('js/alunos/alunos.js') }}"></script>

@endsection