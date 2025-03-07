<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coordenadora extends Model
{
    /** @use HasFactory<\Database\Factories\CoordenadoraFactory> */
    use HasFactory;
    protected $fillable = [
        'foto',
        'nome',
        'data_de_nascimento',
        'idade',
        'sexo',
        'cpf',
        'rg',
        'naturalidade',
        'nacionalidade',
        'celular',
        'cep',
        'rua',
        'numero',
        'bairro',
        'cidade',
        'estado',
        'formacao_graduacao',
        'turno_que_trabalha',
        'data_de_admissao',
        'vinculo_empregaticio',
    ];
}
