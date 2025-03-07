<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('coordenadoras', function (Blueprint $table) {
            $table->id();

            $table->string('foto')->nullable();
            
            $table->string('nome');
            $table->date('data_de_nascimento')->nullable();
            $table->integer('idade')->nullable();
            $table->enum('sexo', ['masculino', 'feminino', 'outros']);
            $table->string('cpf');

            $table->string('rg')->nullable();
            $table->string('naturalidade')->nullable();
            $table->string('nacionalidade')->nullable();
            $table->string('celular')->nullable();
            
            $table->string('cep')->nullable();
            $table->string('rua')->nullable();
            $table->string('numero')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cidade')->nullable();
            $table->string('estado')->nullable();

            $table->string('formacao_graduacao')->nullable();
            $table->string('turno_que_trabalha')->nullable();
            $table->date('data_de_admissao')->nullable();
            $table->string('vinculo_empregaticio')->nullable();

            $table->timestamps(); // Garante que created_at e updated_at existam

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coordenadoras');
    }
};
