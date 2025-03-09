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

    <h2 class="text-2xl font-bold mb-6 text-black-500 text-center">EDITAR ALUNO</h2>

    <form action="{{ route('alunos.atualizar', $aluno->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <fieldset class="border border-gray-400 p-4 rounded-lg">
            <legend class="text-gray-600 font-semibold px-2">Informações Pessoais</legend>

            <div class="mb-4 grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label for="matricula" class="block text-gray-500">Matrícula</label>
                    <input type="text" id="matricula" name="matricula"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-blue-100"
                        value="{{($aluno->id)}}" readonly>
                </div>
                <div>
                    <label for="foto" class="block text-gray-500">Foto</label>

                    <!-- Contêiner flex para alinhar a foto e o input com mais espaço entre eles -->
                    <div class="flex items-center space-x-8 mb-4">
                        <!-- Exibe a foto atual se existir -->
                        @if($aluno->foto == 'sem_foto')
                        <p>SEM FOTO</p>
                        @else
                        <img src="{{ asset('storage/' . $aluno->foto) }}" alt="Foto do Aluno"
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
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-blue-100"
                        placeholder="Digite seu nome completo" value="{{($aluno->nome)}}">
                </div>

                <div>
                    <label for="data_de_nascimento" class="block text-gray-500">Data de Nascimento</label>
                    <input type="date" id="data_de_nascimento" name="data_de_nascimento"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-blue-100"
                        value="{{ old('data_de_nascimento', isset($aluno) ? $aluno->data_de_nascimento : '') }}"
                        onchange="calcularIdade()">
                </div>

                <div>
                    <label for="idade" class="block text-gray-500">Idade</label>
                    <input type="text" id="idade" name="idade"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-blue-100"
                        value="{{ old('idade', isset($aluno) ? \Carbon\Carbon::parse($aluno->data_de_nascimento)->age : '') }}"
                        placeholder="Só números" readonly>
                </div>

                <div>
                    <label for="sexo" class="block text-gray-500">Sexo</label>
                    <select id="sexo" name="sexo"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-blue-100">
                        <option value="" disabled>Selecione o sexo</option>
                        <option value="Masculino" @selected($aluno?->sexo == 'Masculino')>Masculino</option>
                        <option value="Feminino" @selected($aluno?->sexo == 'Feminino')>Feminino</option>
                        <option value="Outros" @selected($aluno?->sexo == 'Outros')>Outros</option>
                    </select>
                </div>



                <div>
                    <label for="cpf" class="block text-gray-500">CPF</label>
                    <input type="text" id="cpf" name="cpf"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-blue-100"
                        placeholder="Só números" value="{{($aluno->cpf)}}">
                </div>
            </div>

            <div class="mb-4 grid grid-cols-1 md:grid-cols-7 gap-4">

                <div>
                    <label for="rg" class="block text-gray-500">RG</label>
                    <input type="text" id="rg" name="rg"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-blue-100"
                        placeholder="Só números" value="{{($aluno->rg)}}">
                </div>

                <div class="md:col-span-2">
                    <label for="pai" class="block text-gray-500">Pai</label>
                    <input type="text" id="pai" name="pai"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-blue-100"
                        placeholder="Digite nome do pai" value="{{($aluno->pai)}}">
                </div>

                <div class="md:col-span-2">
                    <label for="mae" class="block text-gray-500">Mãe</label>
                    <input type="text" id="mae" name="mae"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-blue-100"
                        placeholder="Digite nome da mae" value="{{($aluno->mae)}}">
                </div>

                <div class="md:col-span-2">
                    <label for="certidao" class="block text-gray-500">Certidão de Nascimento</label>
                    <input type="text" id="certidao" name="certidao"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-blue-100"
                        placeholder="Só números" oninput="mascaraCertidaoNascimento(this)"
                        value="{{($aluno->certidao)}}">
                </div>

            </div>

            <div class="mb-4 grid grid-cols-1 md:grid-cols-3 gap-4">

                <div>
                    <label for="naturalidade" class="block text-gray-500">Naturalidade</label>
                    <input type="text" id="naturalidade" name="naturalidade"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-blue-100"
                        placeholder="Digite a cidade" value="{{($aluno->naturalidade)}}">
                </div>

                <div>
                    <label for="nacionalidade" class="block text-gray-500">Nacionalidade</label>
                    <input type="text" id="nacionalidade" name="nacionalidade"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-blue-100"
                        placeholder="Automático" value="{{($aluno->nacionalidade)}}" readonly>
                </div>

                <div>
                    <label for="celular" class="block text-gray-500">Celular</label>
                    <input type="text" id="celular" name="celular"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-blue-100"
                        placeholder="Só números" oninput="mascaraCelular(this)" value="{{($aluno->celular)}}">
                </div>

            </div>



            <div class="mb-4 grid grid-cols-1 md:grid-cols-6 gap-4">
                <div>
                    <label for="cep" class="block text-gray-500">CEP</label>
                    <input type="text" id="cep" name="cep"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-blue-100"
                        placeholder="Só números" value="{{($aluno->cep)}}">
                </div>

                <div>
                    <label for="rua" class="block text-gray-500">Rua</label>
                    <input type="text" id="rua" name="rua"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-blue-100"
                        placeholder="Automático" value="{{($aluno->rua)}}" readonly>
                </div>

                <div>
                    <label for="numero" class="block text-gray-500">Número</label>
                    <input type="text" id="numero" name="numero"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-blue-100"
                        placeholder="Só números" value="{{($aluno->numero)}}">
                </div>

                <div>
                    <label for="bairro" class="block text-gray-500">Bairro</label>
                    <input type="text" id="bairro" name="bairro"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-blue-100"
                        placeholder="Automático" value="{{($aluno->bairro)}}" readonly>
                </div>

                <div>
                    <label for="cidade" class="block text-gray-500">Cidade</label>
                    <input type="text" id="cidade" name="cidade"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-blue-100"
                        placeholder="Automático" value="{{($aluno->cidade)}}" readonly>
                </div>

                <div>
                    <label for="estado" class="block text-gray-500">Estado</label>
                    <input type="text" id="estado" name="estado"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-blue-100"
                        placeholder="Automático" value="{{($aluno->estado)}}" readonly>
                </div>
            </div>

        </fieldset>

        <fieldset class="border border-gray-400 p-4 rounded-lg">
            <legend class="text-gray-600 font-semibold px-2">Informações dos Responsáveis</legend>
            <div>
                <label for="foto" class="block text-gray-500">Foto</label>

                <!-- Contêiner flex para alinhar a foto e o input com mais espaço entre eles -->
                <div class="flex items-center space-x-8 mb-4">
                    <!-- Exibe a foto atual se existir -->
                    @if($aluno->foto_responsavel == 'sem_foto')
                    <p>SEM FOTO</p>
                    @else
                    <img src="{{ asset('storage/' . $aluno->foto_responsavel) }}" alt="Foto do Aluno"
                        class="w-16 h-16 object-cover rounded-full mt-2">
                    @endif

                    <!-- Input para selecionar nova foto (alinhado à direita da foto) -->
                    <input type="file" id="foto_responsavel" name="foto_responsavel"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-blue-100">
                </div>
            </div>

            <div class="mb-4 grid grid-cols-1 md:grid-cols-6 gap-4">
                <div>
                    <label for="parentesco" class="block text-gray-500">Parentesco</label>
                    <select id="parentesco" name="parentesco"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-blue-100">
                        <option value="" disabled>Selecione um parentesco</option>
                        <option value="pai" @selected($aluno->parentesco == 'pai')>Pai</option>
                        <option value="mae" @selected($aluno->parentesco == 'mae')>Mãe</option>
                        <option value="irmao" @selected($aluno->parentesco == 'irmao')>Irmão</option>
                        <option value="irma" @selected($aluno->parentesco == 'irma')>Irmã</option>
                        <option value="tio" @selected($aluno->parentesco == 'tio')>Tio</option>
                        <option value="tia" @selected($aluno->parentesco == 'tia')>Tia</option>
                        <option value="primo" @selected($aluno->parentesco == 'primo')>Primo</option>
                        <option value="prima" @selected($aluno->parentesco == 'prima')>Prima</option>
                        <option value="avo_paterno" @selected($aluno->parentesco == 'avo_paterno')>Avô Paterno</option>
                        <option value="avo_materno" @selected($aluno->parentesco == 'avo_materno')>Avô Materno</option>
                        <option value="ava_paterna" @selected($aluno->parentesco == 'ava_paterna')>Avó Paterna</option>
                        <option value="ava_materna" @selected($aluno->parentesco == 'ava_materna')>Avó Materna</option>
                    </select>
                </div>


                <div class="md:col-span-2">
                    <label for="nome_completo_responsavel" class="block text-gray-500">Nome</label>
                    <input type="text" id="nome_completo_responsavel" name="nome_completo_responsavel"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-blue-100"
                        placeholder="Digite seu nome completo" value="{{($aluno->nome_completo_responsavel)}}" readonly>
                </div>

                <div>
                    <label for="data_de_nascimento_responsavel" class="block text-gray-500">Data de Nascimento</label>
                    <input type="date" id="data_de_nascimento_responsavel" name="data_de_nascimento_responsavel"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-blue-100"
                        value="{{ old('data_de_nascimento_responsavel', isset($aluno) ? $aluno->data_de_nascimento_responsavel : '') }}"
                        onchange="calcularIdadeResponsavel()">
                </div>

                <div>
                    <label for="idade_responsavel" class="block text-gray-500">Idade</label>
                    <input type="text" id="idade_responsavel" name="idade_responsavel"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-blue-100"
                        value="{{ old('idade_responsavel', isset($responsavel) && $responsavel->data_de_nascimento_responsavel ? \Carbon\Carbon::parse($responsavel->data_de_nascimento_responsavel)->age : '') }}"
                        placeholder="Só números" readonly>
                </div>



                <div>
                    <label for="sexo_responsavel" class="block text-gray-500">Sexo</label>
                    <select id="sexo_responsavel" name="sexo_responsavel"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-blue-100">
                        <option value="" disabled
                            {{ old('sexo_responsavel', isset($aluno) ? $aluno->sexo_responsavel : '') ? '' : 'selected' }}>
                            Selecione o sexo</option>
                        <option value="Masculino"
                            {{ old('sexo_responsavel', isset($aluno) ? $aluno->sexo_responsavel : '') == 'masculino' ? 'selected' : '' }}>
                            Masculino</option>
                        <option value="Feminino"
                            {{ old('sexo_responsavel', isset($aluno) ? $aluno->sexo_responsavel : '') == 'feminino' ? 'selected' : '' }}>
                            Feminino</option>
                        <option value="Outros"
                            {{ old('sexo_responsavel', isset($aluno) ? $aluno->sexo_responsavel : '') == 'outros' ? 'selected' : '' }}>
                            Outros</option>
                    </select>
                </div>

            </div>

            <div class="mb-4 grid grid-cols-1 md:grid-cols-5 gap-4">

                <div>
                    <label for="cpf_responsavel" class="block text-gray-500">CPF</label>
                    <input type="text" id="cpf_responsavel" name="cpf_responsavel"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-blue-100"
                        placeholder="Só números" value="{{($aluno->cpf_responsavel)}}">
                </div>

                <div>
                    <label for="rg_responsavel" class="block text-gray-500">RG</label>
                    <input type="text" id="rg_responsavel" name="rg_responsavel"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-blue-100"
                        placeholder="Só números" value="{{($aluno->rg_responsavel)}}">
                </div>

                <div>
                    <label for="naturalidade_responsavel" class="block text-gray-500">Naturalidade</label>
                    <input type="text" id="naturalidade_responsavel" name="naturalidade_responsavel"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-blue-100"
                        value="{{($aluno->naturalidade_responsavel)}}">
                </div>

                <div>
                    <label for="nacionalidade_responsavel" class="block text-gray-500">Nacionalidade</label>
                    <input type="text" id="nacionalidade_responsavel" name="nacionalidade_responsavel"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-blue-100"
                        value="{{($aluno->nacionalidade_responsavel)}}" readonly>
                </div>

                <div>
                    <label for="celular_responsavel" class="block text-gray-500">Celular</label>
                    <input type="text" id="celular_responsavel" name="celular_responsavel"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-blue-100"
                        placeholder="Só números" oninput="mascaraCelular_responsavel(this)"
                        value="{{($aluno->celular_responsavel)}}">
                </div>

            </div>

            <div class="mb-4 grid grid-cols-1 md:grid-cols-6 gap-4">
                <div>
                    <label for="cep_responsavel" class="block text-gray-500">CEP</label>
                    <input type="text" id="cep_responsavel" name="cep_responsavel"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-blue-100"
                        placeholder="Só números" value="{{($aluno->cep_responsavel)}}">
                </div>

                <div>
                    <label for="rua_responsavel" class="block text-gray-500">Rua</label>
                    <input type="text" id="rua_responsavel" name="rua_responsavel"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-blue-100"
                        value="{{($aluno->rua_responsavel)}}" readonly>
                </div>

                <div>
                    <label for="numero_responsavel" class="block text-gray-500">Número</label>
                    <input type="text" id="numero_responsavel" name="numero_responsavel"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-blue-100"
                        value="{{($aluno->numero_responsavel)}}">
                </div>

                <div>
                    <label for="bairro_responsavel" class="block text-gray-500">Bairro</label>
                    <input type="text" id="bairro_responsavel" name="bairro_responsavel"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-blue-100"
                        value="{{($aluno->bairro_responsavel)}}" readonly>
                </div>

                <div>
                    <label for="cidade_responsavel" class="block text-gray-500">Cidade</label>
                    <input type="text" id="cidade_responsavel" name="cidade_responsavel"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-blue-100"
                        value="{{($aluno->cidade_responsavel)}}" readonly>
                </div>

                <div>
                    <label for="estado_responsavel" class="block text-gray-500">Estado</label>
                    <input type="text" id="estado_responsavel" name="estado_responsavel"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-blue-100"
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
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-blue-100"
                        placeholder="Só números" value="{{($aluno->ano_letivo)}}">
                </div>

                <div>
                    <label for="turno" class="block text-gray-500">Turno</label>
                    <select id="turno" name="turno"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-blue-100">
                        <option value="" disabled {{ empty($aluno->turno) ? 'selected' : '' }}>Selecione o turno
                        </option>
                        <option value="Manhã" {{ $aluno->turno == 'Manhã' ? 'selected' : '' }}>Manhã</option>
                        <option value="Tarde" {{ $aluno->turno == 'Tarde' ? 'selected' : '' }}>Tarde
                        </option>
                        <option value="Noite" {{ $aluno->turno == 'Noite' ? 'selected' : '' }}>Noite</option>
                    </select>
                </div>


                <div>
                    <label for="status_da_matricula" class="block text-gray-500">Status da matrícula</label>
                    <select id="status_da_matricula" name="status_da_matricula"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-blue-100">
                        <option value="" disabled {{ empty($aluno->status_da_matricula) ? 'selected' : '' }}>Selecione o
                            status</option>
                        <option value="Ativo" {{ $aluno->status_da_matricula == 'Ativo' ? 'selected' : '' }}>Ativo
                        </option>
                        <option value="Inativo" {{ $aluno->status_da_matricula == 'Inativo' ? 'selected' : '' }}>Inativo
                        </option>
                        <option value="Transferido"
                            {{ $aluno->status_da_matricula == 'Transferido' ? 'selected' : '' }}>Transferido</option>
                    </select>
                </div>


                <div>
                    <label for="data_de_ingresso" class="block text-gray-500">Data de Ingresso</label>
                    <input type="date" id="data_de_ingresso" name="data_de_ingresso" maxlength="4"
                        class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-blue-100"
                        value="{{ $aluno->data_de_ingresso ? \Carbon\Carbon::parse($aluno->data_de_ingresso)->format('Y-m-d') : '' }}"
                        readonly>

                </div>

        </fieldset>

        <!-- <fieldset class="border border-gray-400 p-4 rounded-lg">
            <legend class="text-gray-600 font-semibold px-2">Informações Acadêmicas</legend>

        </fieldset> -->

        <div class="flex flex-col sm:flex-row justify-center gap-2">
            <button type="submit"
                class="bg-transparent text-blue-500 border border-blue-500 px-6 py-3 rounded-lg mt-4 hover:bg-blue-500 hover:text-white hover:font-bold transition">Editar</button>

            <a href="{{ route('alunos.ver', $aluno->id)}}"
                class="bg-transparent text-purple-500 border border-purple-500 px-6 py-3 rounded-lg mt-4 hover:bg-purple-500 hover:text-white hover:font-bold transition"
                title="Adicionar Novo Aluno">
                Voltar
            </a>
        </div>


    </form>

    <script src="{{ asset('js/alunos/alunos.js') }}"></script>


</body>
@endsection