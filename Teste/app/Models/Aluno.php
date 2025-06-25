<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    protected $fillable = [
        'foto',
        'nome',
        'data_de_nascimento',
        'idade',
        'sexo',
        'cpf',
        'rg',
        'email',
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
        'email_responsavel',
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

    /**
     * Relacionamento com o modelo User
     */
    public function user()
    {
        return $this->hasOne(User::class, 'aluno_id', 'id');
    }


    /**
     * Acessor para a foto do aluno
     */
    public function getFotoAttribute($value)
    {
        return $value ? asset('storage/' . $value) : asset('imagens/sem-foto.jpg');
    }

    /**
     * Acessor para a foto do responsável
     */
    public function getFotoResponsavelAttribute($value)
    {
        return $value ? asset('storage/' . $value) : asset('imagens/sem-foto.jpg');
    }

    /**
     * Escopo para alunos ativos
     */
    public function scopeAtivos($query)
    {
        return $query->where('status_da_matricula', 'ativo');
    }

    /**
     * Escopo para alunos inativos
     */
    public function scopeInativos($query)
    {
        return $query->where('status_da_matricula', 'inativo');
    }
}