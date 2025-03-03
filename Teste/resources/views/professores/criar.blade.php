@extends('layouts.app')

@section('title', 'Criar professor')

@section('content')

<!-- Logo -->
<div class="mb-6 flex justify-center">
    <img src="{{ asset('imagens/logo.png') }}" alt="Foto do Aluno"
        class="w-20 h-20 rounded-full border-4 border-gray-300">
</div>

<h2 class="text-2xl font-bold mb-6 text-gray-500 text-center">NOVO PROFESSOR</h2>

<form action="" method="POST" enctype="multipart/form-data"
    class="flex-1 overflow-y-auto p-4">
    @csrf
    <fieldset class="border border-gray-400 p-4 rounded-lg">
        <legend class="text-gray-600 font-semibold px-2">Informações Pessoais</legend>

        <!-- <div class="mb-4 grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label for="foto" class="block text-gray-500">Foto</label>
                <input type="file" id="foto" name="foto"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100 focus:bg-gray-100">
            </div>
        </div> -->

        <div class="mb-4 grid grid-cols-1 md:grid-cols-6 gap-4">
            <div class="md:col-span-2">
                <label for="nome" class="block text-gray-500">Nome</label>
                <input type="text" id="nome" name="nome"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100"
                    placeholder="Digite seu nome completo" required>
            </div>

            <!-- <div>
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
            </div> -->
        </div>

        <!-- <div class="mb-4 grid grid-cols-1 md:grid-cols-7 gap-4">

            <div>
                <label for="rg" class="block text-gray-500">RG</label>
                <input type="text" id="rg" name="rg"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100 focus:border-red-500"
                    placeholder="Só números">
            </div>

            <div class="md:col-span-2">
                <label for="pai" class="block text-gray-500">Pai</label>
                <input type="text" id="pai" name="pai"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100"
                    placeholder="Digite nome do pai">
            </div>

            <div class="md:col-span-2">
                <label for="mae" class="block text-gray-500">Mãe</label>
                <input type="text" id="mae" name="mae"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100"
                    placeholder="Digite nome da mae">
            </div>

            <div class="md:col-span-2">
                <label for="certidao" class="block text-gray-500">Certidão de Nascimento</label>
                <input type="text" id="certidao" name="certidao"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100 focus:border-red-500"
                    placeholder="Só números" oninput="mascaraCertidaoNascimento(this)">
            </div>

        </div>

        <div class="mb-4 grid grid-cols-1 md:grid-cols-3 gap-4">

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
        <legend class="text-gray-600 font-semibold px-2">Informações dos Responsáveis</legend>
        <div class="mb-4 grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label for="foto_responsavel" class="block text-gray-500">Foto</label>
                <input type="file" id="foto_responsavel" name="foto_responsavel"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100 focus:bg-gray-100">
            </div>
        </div>

        <div class="mb-4 grid grid-cols-1 md:grid-cols-6 gap-4">
            <div>
                <label for="parentesco" class="block text-gray-500">Parentesco</label>
                <select id="parentesco" name="parentesco"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100">
                    <option value="" disabled selected>Selecione um parentesco</option>
                    <option value="pai">Pai</option>
                    <option value="mae">Mãe</option>
                    <option value="irmao">Irmão</option>
                    <option value="irma">Irmã</option>
                    <option value="tio">Tio</option>
                    <option value="tia">Tia</option>
                    <option value="primo">Primo</option>
                    <option value="prima">Prima</option>
                    <option value="avo">Avô</option>
                    <option value="avo">Avó</option>

                </select>
            </div>

            <div class="md:col-span-2">
                <label for="nome_completo_responsavel" class="block text-gray-500">Nome</label>
                <input type="text" id="nome_completo_responsavel" name="nome_completo_responsavel"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100"
                    placeholder="Digite seu nome completo">
            </div>

            <div>
                <label for="data_de_nascimento_responsavel" class="block text-gray-500">Data de Nascimento</label>
                <input type="date" id="data_de_nascimento_responsavel" name="data_de_nascimento_responsavel"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100"
                    onchange="calcularIdade_responsavel()">
            </div>

            <div>
                <label for="idade_responsavel" class="block text-gray-500">Idade</label>
                <input type="text" id="idade_responsavel" name="idade_responsavel"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100"
                    placeholder="Só números" readonly>
            </div>

            <div>
                <label for="sexo_responsavel" class="block text-gray-500">Sexo</label>
                <select id="sexo_responsavel" name="sexo_responsavel"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100">
                    <option value="" disabled selected>Selecione o sexo</option>
                    <option value="masculino">Masculino</option>
                    <option value="feminino">Feminino</option>
                    <option value="outros">Outros</option>
                </select>
            </div>
        </div>

        <div class="mb-4 grid grid-cols-1 md:grid-cols-5 gap-4">

            <div>
                <label for="cpf_responsavel" class="block text-gray-500">CPF</label>
                <input type="text" id="cpf_responsavel" name="cpf_responsavel"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100"
                    placeholder="Só números">
            </div>

            <div>
                <label for="rg_responsavel" class="block text-gray-500">RG</label>
                <input type="text" id="rg_responsavel" name="rg_responsavel"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100 focus:border-red-500"
                    placeholder="Só números">
            </div>

            <div>
                <label for="naturalidade_responsavel" class="block text-gray-500">Naturalidade</label>
                <input type="text" id="naturalidade_responsavel" name="naturalidade_responsavel"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100"
                    placeholder="Digite a cidade">
            </div>

            <div>
                <label for="nacionalidade_responsavel" class="block text-gray-500">Nacionalidade</label>
                <input type="text" id="nacionalidade_responsavel" name="nacionalidade_responsavel"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100"
                    placeholder="Automático" readonly>
            </div>

            <div>
                <label for="celular_responsavel" class="block text-gray-500">Celular</label>
                <input type="text" id="celular_responsavel" name="celular_responsavel"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100 focus:border-red-500"
                    placeholder="Só números" oninput="mascaraCelular_responsavel(this)">
            </div>

        </div>

        <div class="mb-4 grid grid-cols-1 md:grid-cols-6 gap-4">
            <div>
                <label for="cep_responsavel" class="block text-gray-500">CEP</label>
                <input type="text" id="cep_responsavel" name="cep_responsavel"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100"
                    placeholder="Só números">
            </div>

            <div>
                <label for="rua_responsavel" class="block text-gray-500">Rua</label>
                <input type="text" id="rua_responsavel" name="rua_responsavel"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100"
                    placeholder="Automático" readonly>
            </div>

            <div>
                <label for="numero_responsavel" class="block text-gray-500">Número</label>
                <input type="text" id="numero_responsavel" name="numero_responsavel"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100"
                    placeholder="Só números">
            </div>

            <div>
                <label for="bairro_responsavel" class="block text-gray-500">Bairro</label>
                <input type="text" id="bairro_responsavel" name="bairro_responsavel"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100"
                    placeholder="Automático" readonly>
            </div>

            <div>
                <label for="cidade_responsavel" class="block text-gray-500">Cidade</label>
                <input type="text" id="cidade_responsavel" name="cidade_responsavel"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100"
                    placeholder="Automático" readonly>
            </div>

            <div>
                <label for="estado_responsavel" class="block text-gray-500">Estado</label>
                <input type="text" id="estado_responsavel" name="estado_responsavel"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100"
                    placeholder="Automático" readonly>
            </div>
        </div>

    </fieldset>

    <fieldset class="border border-gray-400 p-4 rounded-lg">
        <legend class="text-gray-600 font-semibold px-2">Informações Acadêmicas</legend>

        <div class="mb-4 grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label for="ano_letivo" class="block text-gray-500">Ano Letivo</label>
                <input type="text" id="ano_letivo" name="ano_letivo" maxlength="4"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100"
                    placeholder="Só números">
            </div>

            <div>
                <label for="turno" class="block text-gray-500">Turno</label>
                <select id="turno" name="turno"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100">
                    <option value="" disabled selected>Selecione o turno</option>
                    <option value="matutino">Matutino</option>
                    <option value="vespetino">Vespetino</option>
                    <option value="nortuno">Nortuno</option>
                </select>
            </div>

            <div>
                <label for="status_da_matricula" class="block text-gray-500">Status da matricula</label>
                <select id="status_da_matricula" name="status_da_matricula"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100">
                    <option value="" disabled selected>Selecione o status</option>
                    <option value="ativo">Ativo</option>
                    <option value="inativo">Inativo</option>
                    <option value="transferido">Transferido</option>
                </select>
            </div>

            <div>
                <label for="data_de_ingresso" class="block text-gray-500">Data de de igresso</label>
                <input type="date" id="data_de_ingresso" name="data_de_ingresso"
                    class="w-full p-2 mt-2 border border-gray-400 rounded-lg bg-white focus:bg-gray-100">
            </div>

        </div>
    </fieldset> -->

    <!-- <fieldset class="border border-gray-400 p-4 rounded-lg">
            <legend class="text-gray-600 font-semibold px-2">Informações Acadêmicas</legend>

        </fieldset> -->

    <div class="flex flex-col sm:flex-row justify-end gap-2">
        <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-lg mt-4">Criar</button>
        <!-- <button id="closeModalBtn" class="bg-red-500 text-white px-6 py-3 rounded-lg mt-4">Fechar</button> -->
    </div>
</form>

<script src="{{ asset('js/alunos/alunos.js') }}"></script>

@endsection