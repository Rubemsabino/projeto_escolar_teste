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
        Schema::create('escolas', function (Blueprint $table) {
            // identificação
            $table->id();
            $table->string('nome');
            $table->string('nome_fantasia')->nullable();
            $table->string('codigo_inep')->nullable();
            $table->enum('tipo_escola', ['Pública', 'Privada'])->nullable();

            // Documentos
            $table->string('cnpj')->nullable();
            $table->string('ato_criacao')->nullable();
            $table->string('inscricao_estadual')->nullable();
            $table->string('inscricao_municipal')->nullable();

            // Contato
            $table->string('telefone')->nullable();
            $table->string('email')->nullable();
            $table->string('site')->nullable();
            $table->string('whatsapp')->nullable();

            // Endereço
            $table->string('cep')->nullable();
            $table->string('logradouro')->nullable();
            $table->string('numero')->nullable();
            $table->string('comlemento')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cidade')->nullable();
            $table->string('estado')->nullable();
            $table->string('pais')->nullable();

            // Gestão e Administrativo
            $table->foreignId('diretor_id')->nullable();
            $table->date('data_fundacao')->nullable();

            // Configurações
            $table->foreignId('ano_letivo_id')->nullable();
            $table->string('logo_path')->nullable();
            $table->string('timezone')->nullable(); //não criado no frontend
            $table->json('confiracao_geral')->nullable(); //não criado no frontend

            // Status
            $table->boolean('ativo', ['ativa', 'inativa'])->nullable();
            $table->boolean('suspensa', ['sim', 'nao'])->nullable();

            // Auditoria
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('escolas');
    }
};