<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Escola;
use App\Service\EscolaService;

class EscolaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return (new EscolaService())->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('escolas.criar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $escola = (new EscolaService())->store($request);
        // Retornar uma mensagem de sucesso com o nome do escola
        return redirect()->route('escolas.listar')->with('success', 'Escola: <strong>' . $escola->nome . '</strong><br> Criado(a) com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $escola = Escola::findOrFail($id);
        return view('escolas.ver', compact('escola'));
    }

    /**
     * Mostrar o formulário de edição de um aluno.
     */
    public function edit($id)
    {
        $escola = Escola::findOrFail($id);
        return view('Escolas.editar', compact('escola'));
    }

    /**
     * Atualizar os dados de um aluno específico.
     */
    public function update(Request $request, Escola $escola)
    {
        $escola  = (new EscolaService())->update($request, $escola);
        // Redirecionar após atualização
        return redirect()->route('escolas.listar')->with('success', 'Escola: <strong>' . $escola->nome . '!</strong><br> Atualizado(a) com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Escola $escola)
    {
        //
    }

    /**
     * Buscar escolas com base em critérios fornecidos pelo usuário.
     */
    public function busca(Request $request)
    {
        $escolas = (new EscolaService())->busca($request);
        return view('escolas.listar', compact('escolas'));
    }
}
