<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Professor extends Model
{
    use HasFactory;
    protected $table = 'professores'; // Nome correto da tabela no banco

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
