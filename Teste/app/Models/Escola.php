<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escola extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'nome_fantasia',
        'codigo_inep',
        'tipo_escola',
        
        'cnpj',
        'ato_criacao',
        'inscricao_estadual',
        'inscricao_municipal',
        
        'telefone',
        'email',
        'site',
        'whatsapp',
        
        'cep',
        'logradouro',
        'numero',
        'complemento', // Corrigido de 'comlemento'
        'bairro',
        'cidade',
        'estado',
        'pais',
        
        'diretor_id',
        'data_fundacao',
        
        'ano_letivo_id',
        'logo_path',
        'timezone',
        'configuracao_geral', // Corrigido de 'confiracao_geral'
        'ativo',
        'suspensa'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'data_fundacao' => 'date',
        'configuracao_geral' => 'array',
        'ativo' => 'boolean',
        'suspensa' => 'boolean'
    ];

    /**
     * Tipos de escola disponíveis
     */
    public const TIPOS_ESCOLA = [
        'Pública',
        'Privada'
    ];

    /**
     * Tipos de gestão disponíveis
     */
    public const TIPOS_GESTAO = [
        'Municipal',
        'Estadual',
        'Privada'
    ];

    /**
     * Relacionamento com o diretor
     */
    public function diretor()
    {
        return $this->belongsTo(User::class, 'diretor_id');
    }

    /**
     * Relacionamento com o responsável
     */
    public function responsavel()
    {
        return $this->belongsTo(User::class, 'responsavel_id');
    }
}