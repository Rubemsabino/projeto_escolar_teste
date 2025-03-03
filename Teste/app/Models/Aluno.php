<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    // Defina os campos que podem ser preenchidos em massa (mass assignment)
    protected $fillable = [
        'foto',

        'nome',
        'data_de_nascimento',
        'idade',
        'sexo',
        'cpf',

        'rg',
        'pai',
        'mae',
        'certidao',

        'naturalidade',
        'nacionalidade',
        'celular',

        'cep',
        'rua',
        'numero',
        'bairro',
        'cidade',
        'estado',

        'foto_responsavel',
        
        'parentesco',
        'nome_completo_responsavel',
        'data_de_nascimento_responsavel',
        'idade_responsavel',
        'sexo_responsavel',
        
        'cpf_responsavel',
        'rg_responsavel',
        'naturalidade_responsavel',
        'nacionalidade_responsavel',
        'celular_responsavel',

        'cep_responsavel',
        'rua_responsavel',
        'numero_responsavel',
        'bairro_responsavel',
        'cidade_responsavel',
        'estado_responsavel',
        
        'ano_letivo',
        'turno',
        'status_da_matricula',
        'data_de_ingresso',
    ];
}
