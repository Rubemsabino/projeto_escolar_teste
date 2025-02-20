<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    protected $table = 'alunos';  // Nome da tabela

    // Defina os campos que são preenchíveis
    protected $fillable = [
        'foto',
        'nome_completo',
        'data_de_nascimento',
        'idade',
        'sexo',
        'cpf',
        'rg',
        'certidao_de_nascimento',
        'celular',
        'cep',
        'endereco_rua',
        'endereco_numero',
        'endereco_bairro',
        'endereco_cidade',
        'endereco_estado',
        'foto_responsavel',
        'nome_do_responsavel_principal',
        'data_de_nascimento_responsavel',
        'idade_responsavel',
        'sexo_responsavel',
        'cpf_responsavel',
        'rg_responsavel',
        'celular_responsavel',
        'parentesco',
        'cep_responsavel',
        'endereco_rua_responsavel',
        'endereco_numero_responsavel',
        'endereco_bairro_responsavel',
        'endereco_cidade_responsavel',
        'endereco_estado_responsavel',
        'ano_letivo',
        'turno',
        'status_da_matricula',
        'data_de_ingresso',
        'hora_de_ingresso',
        'parte_do_dia',
        'necessidades_especiais',
        'tipo_sanguineo',
        'fator_rh',
        'observacoes'
    ];

    // Defina os tipos dos campos
    protected $casts = [
        'data_de_nascimento' => 'date',
    ];
    
}
