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

            // Informações Pessoais do Aluno
            $table->string('foto')->nullable();
            $table->string('nome_completo');
            $table->date('data_de_nascimento');
            $table->integer('idade');
            $table->enum('sexo', ['masculino', 'feminino', 'outro']);
            $table->string('cpf')->nullable();
            $table->string('rg')->nullable();
            $table->string('certidao_de_nascimento');
            $table->string('celular')->nullable();
            $table->string('cep');
            $table->string('endereco_rua');
            $table->string('endereco_numero');
            $table->string('endereco_bairro');
            $table->string('endereco_cidade');
            $table->string('endereco_estado');

            // Informações dos Responsáveis
            $table->string('foto_responsavel')->nullable();
            $table->string('nome_do_responsavel_principal');
            $table->date('data_de_nascimento_responsavel');
            $table->integer('idade_responsavel');
            $table->enum('sexo_responsavel', ['masculino', 'feminino', 'outro']);
            $table->string('cpf_responsavel')->nullable();
            $table->string('rg_responsavel')->nullable();
            $table->string('celular_responsavel')->nullable();
            $table->string('parentesco');
            $table->string('cep_responsavel');
            $table->string('endereco_rua_responsavel');
            $table->string('endereco_numero_responsavel');
            $table->string('endereco_bairro_responsavel');
            $table->string('endereco_cidade_responsavel');
            $table->string('endereco_estado_responsavel');

            // Informações Acadêmicas
            $table->year('ano_letivo');
            $table->enum('turno', ['matutino', 'vespertino', 'noturno']);
            $table->enum('status_da_matricula', ['ativa', 'inativa', 'trancada']);
            $table->date('data_de_ingresso');
            $table->time('hora_de_ingresso');
            $table->enum('parte_do_dia', ['manhã', 'tarde', 'noite']);

            // Informações Extras
            $table->string('necessidades_especiais')->nullable();
            $table->string('tipo_sanguineo')->nullable();
            $table->enum('fator_rh', ['positivo', 'negativo'])->nullable();
            $table->text('observacoes')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('alunos');
    }
}
