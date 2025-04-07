<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Aluno;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
            'certidao' => 'nullable|string|max:255|unique:alunos,certidao',
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
            $validated['foto'] = $request->file('foto')->store('foto_alunos', 'public');
        }

        // 📷 Upload da foto do responsável (se enviada)
        if ($request->hasFile('foto_responsavel')) {
            $validated['foto_responsavel'] = $request->file('foto_responsavel')->store('foto_responsaveis', 'public');
        }

        // Criar o aluno no banco de dados e recuperar o aluno criado
        $aluno = Aluno::create($validated);
        User::create([
            'name' => $aluno->nome,
            'email' => $aluno->email,
            'password' => Hash::make($aluno->data_de_nascimento),
        ]);

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
            'sexo_responsavel' => 'nullable|string',
            'cpf_responsavel' => 'nullable|string|max:14',
            'rg_responsavel' => 'nullable|string|max:20',
            'naturalidade_responsavel' => 'nullable|string|max:255',
            'nacionalidade_responsavel' => 'nullable|string|max:255',
            'celular_responsavel' => 'nullable|string|max:16',
            'cep_responsavel' => 'nullable|string|max:10',
            'rua_responsavel' => 'nullable|string|max:255',
            'numero_responsavel' => 'nullable|string|max:10',
            'bairro_responsavel' => 'nullable|string|max:255',
            'cidade_responsavel' => 'nullable|string|max:255',
            'estado_responsavel' => 'nullable|string|max:255',
            'ano_letivo' => 'nullable|digits:4|integer|min:1900|max:2099',
            'turno' => 'nullable|in:Manhã,Tarde,Noite',
            'status_da_matricula' => 'nullable|in:Ativo,Inativo,Transferido',
        ]);

        // 📷 Atualizar a foto do Aluno
        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            // Caso o aluno já tenha foto, apague a antiga
            if ($aluno->foto) {
                $fotoAntiga = $aluno->foto; // Caminho correto relativo ao disco "public"

                // Verificar se o arquivo existe antes de tentar excluir
                if (Storage::disk('public')->exists($fotoAntiga)) {
                    Storage::disk('public')->delete($fotoAntiga);
                }
            }

            // Salvar a nova foto (primeira foto ou substituição da anterior)
            $validated['foto'] = $request->file('foto')->store('foto_aluno', 'public');
        } elseif (!$request->hasFile('foto') && $aluno->foto) {
            // Caso não tenha enviado uma nova foto, manter a foto existente
            $validated['foto'] = $aluno->foto;
        } else {
            // Caso não tenha foto e o aluno não tenha uma foto registrada
            $validated['foto'] = null;  // Ou você pode definir um valor padrão, se desejar
        }

        // 📷 Atualizar a foto do Responsável
        if ($request->hasFile('foto_responsavel') && $request->file('foto_responsavel')->isValid()) {
            // Caso o responsável já tenha foto, apague a antiga
            if ($aluno->foto_responsavel) {
                $fotoAntiga = $aluno->foto_responsavel; // Caminho correto relativo ao disco "public"

                // Verificar se o arquivo existe antes de tentar excluir
                if (Storage::disk('public')->exists($fotoAntiga)) {
                    Storage::disk('public')->delete($fotoAntiga);
                }
            }

            // Salvar a nova foto (primeira foto ou substituição da anterior)
            $validated['foto_responsavel'] = $request->file('foto_responsavel')->store('foto_responsavel', 'public');
        } elseif (!$request->hasFile('foto_responsavel') && $aluno->foto_responsavel) {
            // Caso não tenha enviado uma nova foto, manter a foto existente
            $validated['foto_responsavel'] = $aluno->foto_responsavel;
        } else {
            // Caso não tenha foto e o responsável não tenha uma foto registrada
            $validated['foto_responsavel'] = null;  // Ou você pode definir um valor padrão, se desejar
        }

        // Atualizar o aluno com os dados
        $aluno->update($validated);

        // Redirecionar após atualização
        return redirect()->route('alunos.listar')->with('success', 'Aluno(a): <strong>' . $aluno->nome . '!</strong><br> Atualizado(a) com sucesso!');
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
                    ->orWhere('nome_completo_responsavel', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('cpf_responsavel', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('cpf', 'LIKE', '%' . $request->search . '%');
            });
        }

        $alunos = $query->get();
        return view('alunos.listar', compact('alunos'));
    }
}