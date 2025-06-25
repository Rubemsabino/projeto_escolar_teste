<?php

namespace App\Service;

use App\Models\Escola;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Type\Integer;

class EscolaService
{
    public function index()
    {
        $escolas = Escola::all();
        return view('escolas.listar', compact('escolas'));
    }


    public function store($request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'nome_fantasia' => 'nullable|string|max:255',
            'codigo_inep' => 'nullable|integer',
            'tipo_escola' => 'nullable|string|max:255',

            'cnpj' => 'nullable|string|max:18',
            'ato_criacao' => 'nullable|string|max:255',
            'inscricao_estadual' => 'nullable|string|max:255',
            'inscricao_municipal' => 'nullable|string|max:255',

            'telefone' => 'nullable|string|max:16',
            'email' => 'nullable|string|email|max:255',
            'site' => 'nullable|string|max:255',
            'whatsapp' => 'nullable|string|max:16',

            'cep' => 'nullable|string|max:10',
            'logradouro' => 'nullable|string|max:255',
            'numero' => 'nullable|string|max:10',
            'complemento' => 'nullable|string|max:255',
            'bairro' => 'nullable|string|max:255',
            'cidade' => 'nullable|string|max:255',
            'estado' => 'nullable|string|max:255',
            'pais' => 'nullable|string|max:255',

            'diretora' => 'required|string|max:16',
            'data_fundacao' => 'nullable|date',

            // 'ano_letivo_id' => 'nullable|integer',
            // 'logo_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

            // 'timezone' => 'nullable|string|max:255',
            // 'configuracao_geral' => 'nullable|string|max:255', // Corrigido de 'confiracao_geral'
            // 'ativo' => 'nullable|boolean',
            // 'suspensa' => 'nullable|boolean',
        ]);

        try {
            $escola = Escola::create($validated);
            return $escola;
        } catch (\Exception $e) {
            // Log do erro ou retorno adequado
            throw $e; // ou retorne uma resposta de erro
        };
    }

    public function update($request, Escola $escola)
    {
        // dd($request->all());
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'nome_fantasia' => 'nullable|string|max:255',
            'codigo_inep' => 'nullable|integer',
            'tipo_escola' => 'nullable|string|max:255',

            'cnpj' => 'nullable|string|max:18',
            'ato_criacao' => 'nullable|string|max:255',
            'inscricao_estadual' => 'nullable|string|max:255',
            'inscricao_municipal' => 'nullable|string|max:255',

            'telefone' => 'nullable|string|max:16',
            'email' => 'nullable|string|email|max:255',
            'site' => 'nullable|string|max:255',
            'whatsapp' => 'nullable|string|max:16',

            'cep' => 'nullable|string|max:10',
            'logradouro' => 'nullable|string|max:255',
            'numero' => 'nullable|string|max:10',
            'complemento' => 'nullable|string|max:255',
            'bairro' => 'nullable|string|max:255',
            'cidade' => 'nullable|string|max:255',
            'estado' => 'nullable|string|max:255',
            'pais' => 'nullable|string|max:255',

            'diretora' => 'required|string|max:16',
            'data_fundacao' => 'nullable|date',

            // 'ano_letivo_id' => 'nullable|integer',
            // 'logo_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

            // 'timezone' => 'nullable|string|max:255',
            // 'configuracao_geral' => 'nullable|string|max:255', // Corrigido de 'confiracao_geral'
            // 'ativo' => 'nullable|boolean',
            // 'suspensa' => 'nullable|boolean',
        ]);

        try {
            $escola->update($validated);
            return $escola;
        } catch (\Exception $e) {
            // Log do erro ou retorno adequado
            throw $e; // ou retorne uma resposta de erro
        };
    }


    public function busca($request)
    {
        $query = Escola::query();

        if ($request->has('search') && !empty($request->search)) {
            $query->where(function ($q) use ($request) {
                $q->where('id', $request->search)
                    ->orWhere('nome', 'LIKE', '%' . $request->search . '%');
            });
        }

        return  $query->get();
    }
}
