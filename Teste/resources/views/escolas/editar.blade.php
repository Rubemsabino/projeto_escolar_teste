@extends('layouts.app')

@section('title', 'Lista de Alunos')

@section('content')

@if(session('success'))
<script>
    Swal.fire({
    title: 'Sucesso!',
    text: '{{ session('
    success ') }}', // Corrigido aqui para passar o valor diretamente
    icon: 'success',
    confirmButtonText: 'OK'
});
</script>
@endif


<body class="bg-gray-300">
    <!-- Logo -->
    <div class="mb-6 flex justify-center">
        <img src="{{ asset('imagens/logo.png') }}" alt="Foto do Aluno"
            class="w-20 h-20 rounded-full border-4 border-gray-300">
    </div>

    <h2 class="text-2xl font-bold mb-6 text-black-500 text-center">EDITAR ESCOLA</h2>

    <form action="{{ route('escolas.atualizar', $escola->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <fieldset class="border border-gray-400 p-4 rounded-lg">
            <legend class="text-gray-600 font-semibold px-2">Identificação</legend>


            <div class="mb-4 grid grid-cols-1 md:grid-cols-6 gap-4">
                <div class="md:col-span-2">
                    <label for="nome" class="block text-gray-500">Nome</label>
                    <input type="text" id="nome" name="nome"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-green-100"
                        placeholder="Nome completo da instituição" value="{{($escola->nome)}}">
                </div>

                <div class="md:col-span-2">
                    <label for="nome_fantasia" class="block text-gray-500">Nome Fantasia</label>
                    <input type="text" id="nome_fantasia" name="nome_fantasia"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-green-100"
                        placeholder="Nome abreviado/apelido da escola" value="{{($escola->nome_fantasia)}}">
                </div>

                <div>
                    <label for="codigo_inep" class="block text-gray-500">Codigo Inep</label>
                    <input type="text" id="codigo_inep" name="codigo_inep" maxlength="8"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-green-100"
                        placeholder="Só números" value="{{($escola->codigo_inep)}}">
                </div>

                <div>
                    <label for="tipo_escola" class="block text-gray-500">Tipo Escola</label>
                    <select id="tipo_escola" name="tipo_escola"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-green-100">
                        <option value="" disabled selected>Selecione o tipo escola</option>
                        <option value="Pública" @selected($escola->tipo_escola == 'Pública')>Pública</option>
                        <option value="Privada" @selected($escola->tipo_escola == 'Privada')>Privada</option>
                    </select>
                </div>

            </div>
        </fieldset>

        <fieldset class="border border-gray-400 p-4 rounded-lg">
            <legend class="text-gray-600 font-semibold px-2">Documentos</legend>

            <div class="mb-4 grid grid-cols-1 md:grid-cols-4 gap-4">

                <div>
                    <label for="cnpj" class="block text-gray-500">Cnpj</label>
                    <input type="text" id="cnpj" name="cnpj"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-green-100"
                        placeholder="Só números" value="{{($escola->cnpj)}}">
                </div>

                <div>
                    <label for="ato_criacao" class="block text-gray-500">Ato Criacão</label>
                    <input type="text" id="ato_criacao" name="ato_criacao"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-green-100"
                        placeholder="Só números" value="{{($escola->ato_criacao)}}">
                </div>

                <div>
                    <label for="inscricao_estadual" class="block text-gray-500">Inscricão Estadual</label>
                    <input type="text" id="inscricao_estadual" name="inscricao_estadual"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-green-100"
                        placeholder="Só números" value="{{($escola->inscricao_estadual)}}">
                </div>

                <div>
                    <label for="inscricao_municipal" class="block text-gray-500">Inscricão Municipal</label>
                    <input type="text" id="inscricao_municipal" name="inscricao_municipal"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-green-100"
                        placeholder="Só números" value="{{($escola->inscricao_municipal)}}">
                </div>
        </fieldset>

        <fieldset class="border border-gray-400 p-4 rounded-lg">
            <legend class="text-gray-600 font-semibold px-2">Contato</legend>
            <div class="mb-4 grid grid-cols-1 md:grid-cols-4 gap-4">
                <div>
                    <label for="telefone" class="block text-gray-500">Telefone</label>
                    <input type="text" id="telefone" name="telefone"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-green-100"
                        placeholder="Só números" oninput="mascaraCelular(this)" value="{{($escola->telefone)}}">
                </div>

                <div>
                    <label for="email" class="block text-gray-500">E-mail</label>
                    <input type="email" id="email" name="email"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-green-100"
                        placeholder="E-mail institucional" oninput="mascaraemail(this)" value="{{($escola->email)}}">
                </div>

                <div>
                    <label for="site" class="block text-gray-500">Site</label>
                    <input type="text" id="site" name="site"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-green-100"
                        placeholder="Só números" value="{{($escola->site)}}">
                </div>

                <div>
                    <label for="whatsapp" class="block text-gray-500">Whatsapp</label>
                    <input type="text" id="whatsapp" name="whatsapp"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-green-100"
                        placeholder="Só números" oninput="mascaraCelular(this)" value="{{($escola->whatsapp)}}">
                </div>
        </fieldset>

        <fieldset class="border border-gray-400 p-4 rounded-lg">
            <legend class="text-gray-600 font-semibold px-2">Endereço</legend>
            <div class="mb-4 grid grid-cols-1 md:grid-cols-4 gap-4">
                <div>
                    <label for="cep" class="block text-gray-500">CEP</label>
                    <input type="text" id="cep" name="cep"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-green-100"
                        placeholder="Só números" value="{{($escola->cep)}}">
                </div>

                <div>
                    <label for="logradouro" class="block text-gray-500">Logradouro</label>
                    <input type="text" id="logradouro" name="logradouro"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-green-100"
                        placeholder="Automático" readonly value="{{($escola->logradouro)}}">
                </div>

                <div>
                    <label for="numero" class="block text-gray-500">Número</label>
                    <input type="text" id="numero" name="numero"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-green-100"
                        placeholder="Só números" value="{{($escola->numero)}}">
                </div>

                <div>
                    <label for="complemento" class="block text-gray-500">Complemento</label>
                    <input type="text" id="complemento" name="complemento"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-green-100"
                        placeholder="Ex: ao lado da padaria Pão de Açucar" value="{{($escola->complemento)}}">
                </div>

                <div>
                    <label for="bairro" class="block text-gray-500">Bairro</label>
                    <input type="text" id="bairro" name="bairro"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-green-100"
                        placeholder="Automático" readonly value="{{($escola->bairro)}}">
                </div>

                <div>
                    <label for="cidade" class="block text-gray-500">Cidade</label>
                    <input type="text" id="cidade" name="cidade"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-green-100"
                        placeholder="Automático" readonly value="{{($escola->cidade)}}">
                </div>

                <div>
                    <label for="estado" class="block text-gray-500">Estado</label>
                    <input type="text" id="estado" name="estado"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-green-100"
                        placeholder="Automático" readonly value="{{($escola->estado)}}">
                </div>

                <div>
                    <label for="pais" class="block text-gray-500">Pais</label>
                    <input type="text" id="pais" name="pais"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-green-100"
                        placeholder="Automático" readonly value="{{($escola->pais)}}">
                </div>
            </div>

        </fieldset>

        <fieldset class="border border-gray-400 p-4 rounded-lg">
            <legend class="text-gray-600 font-semibold px-2">Gestão e Administrativo</legend>

            <div class="mb-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="diretora" class="block text-gray-500">Diretor(a)</label>
                    <select id="diretora" name="diretora"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-green-100">
                        <option value="" disabled selected>Selecione o(a) diretor(a)</option>
                        <option value="Maria Silva" @selected($escola->diretora == 'Maria Silva')>Maria Silva</option>
                        <option value="João Santos" @selected($escola->diretora == 'João Santos')>João Santos</option>
                        <option value="Ana Oliveira" @selected($escola->diretora == 'Ana Oliveira')>Ana Oliveira
                        </option>
                        <option value="Carlos Pereira" @selected($escola->diretora == 'Carlos Pereira')>Carlos Pereira
                        </option>
                    </select>
                </div>

                {{-- <div>
                    <label for="data_fundacao" class="block text-gray-500">Data de Fundação</label>
                    <input type="date" id="data_fundacao" name="data_fundacao"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-green-100"
                        onchange="calcularIdade()">
                </div> --}}
            </div>
        </fieldset>

        {{-- <fieldset class="border border-gray-400 p-4 rounded-lg">
            <legend class="text-gray-600 font-semibold px-2">Configurações</legend>

            <div class="mb-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="ano_letivo_atual_id" class="block text-gray-500">Ano Letivo</label>
                    <select id="ano_letivo_atual_id" name="ano_letivo_atual_id"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-green-100">
                        <option value="" disabled selected>Selecione o ano</option>
                        <option value="2015">2015</option>
                        <option value="2016">2016</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                    </select>
                </div>

                <div>
                    <label for="logo_path" class="block text-gray-500">Logo</label>
                    <input type="file" id="logo_path" name="logo_path"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-green-100">
                </div>
            </div>
        </fieldset>

        <fieldset class="border border-gray-400 p-4 rounded-lg">
            <legend class="text-gray-600 font-semibold px-2">Status</legend>
            <div>
                <label for="status" class="block text-gray-500">Condições</label>
                <select id="status" name="status"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-green-100">
                    <option value="" disabled selected>Selecione o status</option>
                    <option value="true">Ativa</option>
                    <option value="false">Inativa</option>
                </select>
            </div>
        </fieldset> --}}

        <div class="flex flex-col sm:flex-row justify-center gap-2 mt-4">
            <button type="submit"
                class="inline-flex justify-center items-center bg-transparent text-blue-500 border border-blue-500 px-6 py-3 rounded-lg mt-4 hover:bg-blue-500 hover:text-white hover:font-bold transition w-full sm:w-auto">
                Editar
            </button>

            <a href="{{ route('escolas.ver', $escola->id) }}"
                class="inline-flex justify-center items-center bg-transparent text-purple-500 border border-purple-500 px-6 py-3 rounded-lg mt-4 hover:bg-purple-500 hover:text-white hover:font-bold transition w-full sm:w-auto"
                title="Voltar">
                Voltar
            </a>
        </div>

    </form>

    <script src="{{ asset('js/script.js') }}">
        </script


</body>
@endsection