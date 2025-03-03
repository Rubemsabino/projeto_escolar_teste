@extends('layouts.app')

@section('title', 'Lista de Alunos')

@section('content')

<body class="bg-gray-300">
    <!-- Logo -->
    <div class="mb-6 flex justify-center">
        <img src="{{ asset('imagens/logo.png') }}" alt="Foto do Aluno"
            class="w-20 h-20 rounded-full border-4 border-gray-300">
    </div>

    <h2 class="text-2xl font-bold mb-6 text-gray-500 text-center">VER ALUNO</h2>

    <form class="flex-1 overflow-y-auto p-4">
        <fieldset class="border border-gray-400 p-4 rounded-lg">
            <legend class="text-gray-600 font-semibold px-2">Informações Pessoais</legend>

            <div class="mb-4 grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label for="matricula" class="block text-gray-500">Matrícula</label>
                    <input type="text" id="matricula" name="matricula"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-yellow-100"
                        value="{{($aluno->id)}}" readonly>
                </div>
                <div class="mt-4">
                    <label for="foto" class="block text-gray-500">Foto do Aluno</label>
                    <!-- Exemplo na View de Exibição -->
                    @if($aluno->foto == 'sem_foto')
                    <p>SEM FOTO</p>
                    @else
                    <img src="{{ asset('storage/' . $aluno->foto) }}" alt="Foto do Aluno"
                        class="w-16 h-16 object-cover rounded-full mt-2">
                    @endif
                </div>
            </div>

            <div class="mb-4 grid grid-cols-1 md:grid-cols-6 gap-4">
                <div class="md:col-span-2">
                    <label for="nome_completo" class="block text-gray-500">Nome</label>
                    <input type="text" id="nome_completo" name="nome_completo"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-yellow-100"
                        value="{{($aluno->nome)}}" readonly>
                </div>

                <div>
                    <label for="data_de_nascimento" class="block text-gray-500">Data de Nascimento</label>
                    <input type="text" id="data_de_nascimento" name="data_de_nascimento"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-yellow-100"
                        value="{{ $aluno->data_de_nascimento ? \Carbon\Carbon::parse($aluno->data_de_nascimento)->format('d/m/Y') : '' }}"
                        readonly>
                </div>

                <div>
                    <label for="idade" class="block text-gray-500">Idade</label>
                    <input type="text" id="idade" name="idade"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-yellow-100"
                        value="{{($aluno->idade)}}" readonly>
                </div>

                <div>
                    <label for="sexo" class="block text-gray-500">Sexo</label>
                    <input type="text" id="sexo" name="sexo"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-yellow-100"
                        value="{{($aluno->sexo)}}" readonly>
                </div>

                <div>
                    <label for="cpf" class="block text-gray-500">CPF</label>
                    <input type="text" id="cpf" name="cpf"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-yellow-100"
                        value="{{($aluno->cpf)}}" readonly>
                </div>
            </div>

            <div class="mb-4 grid grid-cols-1 md:grid-cols-7 gap-4">

                <div>
                    <label for="rg" class="block text-gray-500">RG</label>
                    <input type="text" id="rg" name="rg"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-yellow-100"
                        value="{{($aluno->rg)}}" readonly>
                </div>

                <div class="md:col-span-2">
                    <label for="pai" class="block text-gray-500">Pai</label>
                    <input type="text" id="pai" name="pai"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-yellow-100"
                        value="{{($aluno->pai)}}" readonly>
                </div>

                <div class="md:col-span-2">
                    <label for="mae" class="block text-gray-500">Mãe</label>
                    <input type="text" id="mae" name="mae"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-yellow-100"
                        value="{{($aluno->mae)}}" readonly>
                </div>

                <div class="md:col-span-2">
                    <label for="certidao" class="block text-gray-500">Certidão de Nascimento</label>
                    <input type="text" id="certidao" name="certidao"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-yellow-100"
                        value="{{($aluno->certidao)}}" readonly>
                </div>

            </div>

            <div class="mb-4 grid grid-cols-1 md:grid-cols-3 gap-4">

                <div>
                    <label for="naturalidade" class="block text-gray-500">Naturalidade</label>
                    <input type="text" id="naturalidade" name="naturalidade"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-yellow-100"
                        value="{{($aluno->naturalidade)}}" readonly>
                </div>

                <div>
                    <label for="nacionalidade" class="block text-gray-500">Nacionalidade</label>
                    <input type="text" id="nacionalidade" name="nacionalidade"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-yellow-100"
                        value="{{($aluno->nacionalidade)}}" readonly>
                </div>

                <div>
                    <label for="celular" class="block text-gray-500">Celular</label>
                    <input type="text" id="celular" name="celular"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-yellow-100"
                        value="{{($aluno->celular)}}" readonly>
                </div>

            </div>



            <div class="mb-4 grid grid-cols-1 md:grid-cols-6 gap-4">
                <div>
                    <label for="cep" class="block text-gray-500">CEP</label>
                    <input type="text" id="cep" name="cep"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-yellow-100"
                        value="{{($aluno->cep)}}" readonly>

                </div>

                <div>
                    <label for="rua" class="block text-gray-500">Rua</label>
                    <input type="text" id="rua" name="rua"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-yellow-100"
                        value="{{($aluno->rua)}}" readonly>

                </div>

                <div>
                    <label for="numero" class="block text-gray-500">Número</label>
                    <input type="text" id="numero" name="numero"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-yellow-100"
                        value="{{($aluno->numero)}}" readonly>

                </div>

                <div>
                    <label for="bairro" class="block text-gray-500">Bairro</label>
                    <input type="text" id="bairro" name="bairro"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-yellow-100"
                        value="{{($aluno->bairro)}}" readonly>

                </div>

                <div>
                    <label for="cidade" class="block text-gray-500">Cidade</label>
                    <input type="text" id="cidade" name="cidade"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-yellow-100"
                        value="{{($aluno->cidade)}}" readonly>

                </div>

                <div>
                    <label for="estado" class="block text-gray-500">Estado</label>
                    <input type="text" id="estado" name="estado"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-yellow-100"
                        value="{{($aluno->estado)}}" readonly>

                </div>
            </div>

        </fieldset>

        <fieldset class="border border-gray-400 p-4 rounded-lg">
            <legend class="text-gray-600 font-semibold px-2">Informações dos Responsáveis</legend>
            <div class="mb-4 grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label for="foto_responsavel" class="block text-gray-500">Foto</label>
                    <input type="text" id="foto_responsavel" name="foto_responsavel"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-yellow-100"
                        value="{{($aluno->foto_responsavel)}}" readonly>
                </div>
            </div>

            <div class="mb-4 grid grid-cols-1 md:grid-cols-6 gap-4">
                <div>
                    <label for="parentesco" class="block text-gray-500">Parentesco</label>
                    <input type="text" id="parentesco" name="foto_responsavel"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-yellow-100"
                        value="{{($aluno->parentesco)}}" readonly>
                </div>

                <div class="md:col-span-2">
                    <label for="nome_completo_responsavel" class="block text-gray-500">Nome</label>
                    <input type="text" id="nome_completo_responsavel" name="nome_completo_responsavel"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-yellow-100"
                        value="{{($aluno->nome_completo_responsavel)}}" readonly>
                </div>

                <div>
                    <label for="data_de_nascimento_responsavel" class="block text-gray-500">Data de Nascimento</label>
                    <input type="text" id="data_de_nascimento_responsavel" name="data_de_nascimento_responsavel"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-yellow-100"
                        value="{{ $aluno->data_de_nascimento ? \Carbon\Carbon::parse($aluno->data_de_nascimento_responsavel)->format('d/m/Y') : '' }}"
                        readonly>
                </div>

                <div>
                    <label for="idade_responsavel" class="block text-gray-500">Idade</label>
                    <input type="text" id="idade_responsavel" name="idade_responsavel"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-yellow-100"
                        value="{{($aluno->idade_responsavel)}}" readonly>
                </div>

                <div>
                    <label for="sexo_responsavel" class="block text-gray-500">Sexo</label>
                    <input type="text" id="sexo_responsavel" name="sexo_responsavel"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-yellow-100"
                        value="{{($aluno->sexo_responsavel)}}" readonly>
                </div>
            </div>

            <div class="mb-4 grid grid-cols-1 md:grid-cols-5 gap-4">

                <div>
                    <label for="cpf_responsavel" class="block text-gray-500">CPF</label>
                    <input type="text" id="cpf_responsavel" name="cpf_responsavel"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-yellow-100"
                        value="{{($aluno->cpf_responsavel)}}" readonly>
                </div>

                <div>
                    <label for="rg_responsavel" class="block text-gray-500">RG</label>
                    <input type="text" id="rg_responsavel" name="rg_responsavel"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-yellow-100"
                        value="{{($aluno->rg_responsavel)}}" readonly>
                </div>

                <div>
                    <label for="naturalidade_responsavel" class="block text-gray-500">Naturalidade</label>
                    <input type="text" id="naturalidade_responsavel" name="naturalidade_responsavel"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-yellow-100"
                        value="{{($aluno->naturalidade_responsavel)}}" readonly>
                </div>

                <div>
                    <label for="nacionalidade_responsavel" class="block text-gray-500">Nacionalidade</label>
                    <input type="text" id="nacionalidade_responsavel" name="nacionalidade_responsavel"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-yellow-100"
                        value="{{($aluno->nacionalidade_responsavel)}}" readonly>
                </div>

                <div>
                    <label for="celular_responsavel" class="block text-gray-500">Celular</label>
                    <input type="text" id="celular_responsavel" name="celular_responsavel"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-yellow-100"
                        value="{{($aluno->celular_responsavel)}}" readonly>
                </div>

            </div>

            <div class="mb-4 grid grid-cols-1 md:grid-cols-6 gap-4">
                <div>
                    <label for="cep_responsavel" class="block text-gray-500">CEP</label>
                    <input type="text" id="cep_responsavel" name="cep_responsavel"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-yellow-100"
                        value="{{($aluno->cep_responsavel)}}" readonly>
                </div>

                <div>
                    <label for="rua_responsavel" class="block text-gray-500">Rua</label>
                    <input type="text" id="rua_responsavel" name="rua_responsavel"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-yellow-100"
                        value="{{($aluno->rua_responsavel)}}" readonly>
                </div>

                <div>
                    <label for="numero_responsavel" class="block text-gray-500">Número</label>
                    <input type="text" id="numero_responsavel" name="numero_responsavel"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-yellow-100"
                        value="{{($aluno->numero_responsavel)}}" readonly>
                </div>

                <div>
                    <label for="bairro_responsavel" class="block text-gray-500">Bairro</label>
                    <input type="text" id="bairro_responsavel" name="bairro_responsavel"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-yellow-100"
                        value="{{($aluno->bairro_responsavel)}}" readonly>
                </div>

                <div>
                    <label for="cidade_responsavel" class="block text-gray-500">Cidade</label>
                    <input type="text" id="cidade_responsavel" name="cidade_responsavel"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-yellow-100"
                        value="{{($aluno->cidade_responsavel)}}" readonly>
                </div>

                <div>
                    <label for="estado_responsavel" class="block text-gray-500">Estado</label>
                    <input type="text" id="estado_responsavel" name="estado_responsavel"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-yellow-100"
                        value="{{($aluno->estado_responsavel)}}" readonly>
                </div>
            </div>

        </fieldset>

        <fieldset class="border border-gray-400 p-4 rounded-lg">
            <legend class="text-gray-600 font-semibold px-2">Informações Acadêmicas</legend>

            <div class="mb-4 grid grid-cols-1 md:grid-cols-4 gap-4">
                <div>
                    <label for="ano_letivo" class="block text-gray-500">Ano Letivo</label>
                    <input type="text" id="ano_letivo" name="ano_letivo" maxlength="4"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-yellow-100"
                        value="{{($aluno->ano_letivo)}}" readonly>
                </div>

                <div>
                    <label for="turno" class="block text-gray-500">Turno</label>
                    <input type="text" id="turno" name="turno" maxlength="4"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-yellow-100"
                        value="{{($aluno->turno)}}" readonly>
                </div>

                <div>
                    <label for="status_da_matricula" class="block text-gray-500">Status da matricula</label>
                    <input type="text" id="status_da_matricula" name="status_da_matricula" maxlength="4"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-yellow-100"
                        value="{{($aluno->status_da_matricula)}}" readonly>
                </div>

                <div>
                    <label for="data_de_ingresso" class="block text-gray-500">Data de de igresso</label>
                    <input type="text" id="	data_de_ingresso" name="	data_de_ingresso" maxlength="4"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-yellow-100"
                        value="{{ $aluno->data_de_ingresso ? \Carbon\Carbon::parse($aluno->data_de_nascimento_responsavel)->format('d/m/Y') : '' }}"
                        readonly>
                </div>

            </div>
        </fieldset>

        <!-- <fieldset class="border border-gray-400 p-4 rounded-lg">
            <legend class="text-gray-600 font-semibold px-2">Informações Acadêmicas</legend>

        </fieldset> -->



        <div class="flex flex-col sm:flex-row justify-center gap-2">
            <a href="{{ route('alunos.editar', $aluno->id)}}" class="bg-transparent text-yellow-500 border border-yellow-500 px-6 py-3 rounded-lg mt-4 hover:bg-yellow-500 hover:text-white hover:font-bold transition" title="Adicionar Novo Aluno">
                Editar Campos
            </a>
        </div>


    </form>

    <script src="{{ asset('js/alunos/alunos.js') }}"></script>

</body>
@endsection