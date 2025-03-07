<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlunosTable extends Migration
{
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->id();
            $table->string('foto')->nullable();
            $table->string('nome');
            $table->date('data_de_nascimento')->nullable();
            $table->integer('idade')->nullable();
            $table->enum('sexo', ['masculino', 'feminino', 'outros']);
            $table->string('cpf')->nullable();
            $table->string('rg')->nullable();
            $table->string('pai')->nullable();
            $table->string('mae')->nullable();
            $table->string('certidao')->nullable();
            $table->string('naturalidade')->nullable();
            $table->string('nacionalidade')->nullable();
            $table->string('celular')->nullable();
            $table->string('cep')->nullable();
            $table->string('rua')->nullable();
            $table->string('numero')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cidade')->nullable();
            $table->string('estado')->nullable();

            // Informações dos Responsáveis
            $table->string('foto_responsavel')->nullable();
            $table->enum('parentesco', ['pai', 'mae', 'irmao', 'irma', 'tio', 'tia', 'primo', 'prima', 'avo', 'ava'])->nullable();
            $table->string('nome_completo_responsavel')->nullable();
            $table->date('data_de_nascimento_responsavel')->nullable();
            $table->integer('idade_responsavel')->nullable();
            $table->enum('sexo_responsavel', ['masculino', 'feminino', 'outros']);
            $table->string('cpf_responsavel')->nullable();
            $table->string('rg_responsavel')->nullable();
            $table->string('naturalidade_responsavel')->nullable();
            $table->string('nacionalidade_responsavel')->nullable();
            $table->string('celular_responsavel')->nullable();
            $table->string('cep_responsavel')->nullable();
            $table->string('rua_responsavel')->nullable();
            $table->string('numero_responsavel')->nullable();
            $table->string('bairro_responsavel')->nullable();
            $table->string('cidade_responsavel')->nullable();
            $table->string('estado_responsavel')->nullable();

            // Informações Acadêmicas
            $table->string('ano_letivo', 4)->nullable();
            $table->enum('turno', ['matutino', 'vespertino', 'noturno']);
            $table->enum('status_da_matricula', ['ativo', 'inativo', 'transferido']);
            $table->date('data_de_ingresso')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('alunos');
    }
}
