<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\Aluno;

class AlunoController extends Controller
{
    /**
     * Exibir uma lista de alunos.
     */
    public function index()
    {
        $alunos = Aluno::all();
        return view('alunos.listar', compact('alunos'));
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
    $validated = $request->validate([
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

        'nome' => 'required|string|max:255',
        'data_de_nascimento' => 'nullable|date',
        'idade' => 'nullable|integer',
        'sexo' => 'nullable|string',
        'cpf' => 'nullable|string|max:14',
        
        'rg' => 'nullable|string|max:20',
        'pai' => 'nullable|string|max:255',
        'mae' => 'nullable|string|max:255',
        'certidao' => 'required|string|max:255|unique:alunos,certidao',
        
        'naturalidade' => 'nullable|string|max:255',
        'nacionalidade' => 'nullable|string|max:255',
        'celular' => 'nullable|string|max:16',
        
        'cep' => 'nullable|string|max:10',
        'rua' => 'nullable|string|max:255',
        'numero' => 'nullable|string|max:10',
        'bairro' => 'nullable|string|max:255',
        'cidade' => 'nullable|string|max:255',
        'estado' => 'nullable|string|max:255',
        
        'foto_responsavel' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        
        'parentesco' => 'nullable|string|max:255',
        'nome_completo_responsavel' => 'nullable|string|max:255',
        'data_de_nascimento_responsavel' => 'nullable|date',
        'idade_responsavel' => 'nullable|integer',
        'sexo' => 'nullable|string',
        
        'cpf_responsavel' => 'nullable|string|max:14',
        'rg' => 'nullable|string|max:20',
        'naturalidade_responsavel' => 'nullable|string|max:255',
        'nacionalidade_responsavel' => 'nullable|string|max:255',
        'celular_responsavel' => 'nullable|string|max:16',
        
        'cep_responsavel' => 'nullable|string|max:10',
        'rua_responsavel' => 'nullable|string|max:255',
        'numero_responsavel' => 'nullable|string|max:10',
        'bairro_responsavel' => 'nullable|string|max:255',
        'cidade_responsavel' => 'nullable|string|max:255',
        'estado_responsavel' => 'nullable|string|max:255',

        'ano_letivo' => 'nullable|digits:4',
        'turno' => 'nullable|string|max:10',
        'status_da_matricula' => 'nullable|in:ativo,inativo,transferido',
        'data_de_ingresso' => 'nullable|date',
    ]);

    // 📷 Upload da foto do aluno (se enviada)
    if ($request->hasFile('foto')) {
        $validated['foto'] = $request->file('foto')->store('fotos_alunos', 'public');
    }

    // 📷 Upload da foto do responsável (se enviada)
    if ($request->hasFile('foto_responsavel')) {
        $validated['foto_responsavel'] = $request->file('foto_responsavel')->store('fotos_responsaveis', 'public');
    }

    // Criar o aluno no banco de dados
    Aluno::create($validated);

    return redirect()->route('alunos.listar')->with('success', 'Aluno criado com sucesso!');
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
    // Validação dos dados recebidos
    $validated = $request->validate([
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

        'nome' => 'nullable|string|max:255',
        'data_de_nascimento' => 'nullable|date',
        'idade' => 'nullable|integer',
        'sexo' => 'nullable|string',
        'cpf' => 'nullable|string|max:14',
        'rg' => 'nullable|string|max:20',
        'pai' => 'nullable|string|max:255',
        'mae' => 'nullable|string|max:255',
        'certidao' => 'nullable|string|max:255',
        'naturalidade' => 'nullable|string|max:255',
        'nacionalidade' => 'nullable|string|max:255',
        'celular' => 'nullable|string|max:16',

        'cep' => 'nullable|string|max:10',
        'rua' => 'nullable|string|max:255',
        'numero' => 'nullable|string|max:10',
        'bairro' => 'nullable|string|max:255',
        'cidade' => 'nullable|string|max:255',
        'estado' => 'nullable|string|max:255',

        'foto_responsavel' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

        'parentesco' => 'nullable|string|max:255',
        'nome_completo_responsavel' => 'nullable|string|max:255',
        'data_de_nascimento_responsavel' => 'nullable|date',
        'idade_responsavel' => 'nullable|integer',
        'sexo_responsavel' => 'nullable|string', // Ajustado para evitar duplicidade
        'cpf_responsavel' => 'nullable|string|max:14',
        'rg_responsavel' => 'nullable|string|max:20', // Ajustado para evitar duplicidade
        'naturalidade_responsavel' => 'nullable|string|max:255',
        'nacionalidade_responsavel' => 'nullable|string|max:255',
        'celular_responsavel' => 'nullable|string|max:16',

        'cep_responsavel' => 'nullable|string|max:10',
        'rua_responsavel' => 'nullable|string|max:255',
        'numero_responsavel' => 'nullable|string|max:10',
        'bairro_responsavel' => 'nullable|string|max:255',
        'cidade_responsavel' => 'nullable|string|max:255',
        'estado_responsavel' => 'nullable|string|max:255',

        'ano_letivo' => 'nullable|digits:4',
        'turno' => 'nullable|string|max:10',
        'status_da_matricula' => 'nullable|in:ativo,inativo,transferido',
        'data_de_ingresso' => 'nullable|date',
    ]);

    // 📷 Atualizar a foto do aluno
    if ($request->hasFile('foto')) {
        // Apagar a foto antiga se existir
        if ($aluno->foto) {
            Storage::delete($aluno->foto);
        }

        // Salvar a nova foto
        $validated['foto'] = $request->file('foto')->store('fotos_alunos', 'public');
    }

    // 📷 Atualizar a foto do responsável
    if ($request->hasFile('foto_responsavel')) {
        // Apagar a foto antiga se existir
        if ($aluno->foto_responsavel) {
            Storage::delete($aluno->foto_responsavel);
        }

        // Salvar a nova foto
        $validated['foto_responsavel'] = $request->file('foto_responsavel')->store('fotos_responsaveis', 'public');
    }

    // Atualizar os dados do aluno no banco
    $aluno->update($validated);

    return redirect()->route('alunos.listar')->with('success', 'Aluno atualizado com sucesso!');
}

    /**
     * Remover um aluno do banco de dados.
     */
    public function destroy(Aluno $aluno)
    {
        $aluno->delete();
        return redirect()->route('alunos.listar')->with('success', 'Aluno excluído com sucesso!');
    }

    /**
     * Buscar alunos com base em critérios fornecidos pelo usuário.
     */
    public function busca(Request $request)
    {
        $query = Aluno::query();

        if ($request->has('search') && !empty($request->search)) {
            $query->where(function ($q) use ($request) {
                $q->where('id', $request->search)
                  ->orWhere('nome', 'LIKE', '%' . $request->search . '%')
                  ->orWhere('nome_completo_responsavel', 'LIKE', '%' . $request->search . '%');
            });
        }

        $alunos = $query->get();
        return view('alunos.listar', compact('alunos'));
    }
}