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
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('diretor_id')->nullable();
            $table->foreignId('secretaria_id')->nullable();
            $table->foreignId('coordenador_id')->nullable();
            $table->foreignId('professor_id')->nullable();
            $table->foreignId('aluno_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {}
};