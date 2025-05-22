<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Aluno;

use App\Service\AlunoService;


class AlunoController extends Controller
{
    /**
     * Exibir uma lista de alunos.
     */
    public function index()
    {
        return (new AlunoService())->getAlunos();
    }

    /**
     * Mostrar o formulário de criação de um novo aluno.
     */
    public function create()
    {
        return view('alunos.criar');
    }

    /**
     * Armazenar um novo aluno no banco de dados.
     */
    public function store(Request $request)
    {
        $aluno = (new AlunoService())->store($request);
        // Retornar uma mensagem de sucesso com o nome do aluno
        return redirect()->route('alunos.listar')->with('success', 'Aluno(a): <strong>' . $aluno->nome . '</strong><br> Criado(a) com sucesso!');
    }

    /**
     * Exibir os detalhes de um aluno específico.
     */
    public function show($id)
    {
        $aluno = Aluno::findOrFail($id);
        return view('alunos.ver', compact('aluno'));
    }

    /**
     * Mostrar o formulário de edição de um aluno.
     */
    public function edit($id)
    {
        $aluno = Aluno::findOrFail($id);
        return view('alunos.editar', compact('aluno'));
    }

    /**
     * Atualizar os dados de um aluno específico.
     */
    public function update(Request $request, Aluno $aluno)
    {
        $aluno = (new AlunoService())->update($request, $aluno);
        // Redirecionar após atualização
        return redirect()->route('alunos.listar')->with('success', 'Aluno(a): <strong>' . $aluno->nome . '!</strong><br> Atualizado(a) com sucesso!');
    }



    /**
     * Buscar alunos com base em critérios fornecidos pelo usuário.
     */
    public function busca(Request $request)
    {
        $alunos = (new AlunoService())->busca($request);
        return view('alunos.listar', compact('alunos'));
    }
}