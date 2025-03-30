<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $professores = Professor::all();
        return view('professores.listar', compact('professores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('professores.criar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nome' => 'required|string|max:255',
            'data_de_nascimento' => 'nullable|date',
            'idade' => 'nullable|integer',
            'sexo' => 'nullable|string',
            'cpf' => 'required|string|max:14',
            'rg' => 'nullable|string|max:20',
            'naturalidade' => 'nullable|string|max:255',
            'nacionalidade' => 'nullable|string|max:255',
            'celular' => 'nullable|string|max:16',
            'cep' => 'nullable|string|max:10',
            'rua' => 'nullable|string|max:255',
            'numero' => 'nullable|string|max:10',
            'bairro' => 'nullable|string|max:255',
            'cidade' => 'nullable|string|max:255',
            'estado' => 'nullable|string|max:255',
            'formacao_graduacao' => 'nullable|string|max:255',
            'turno_que_trabalha' => 'nullable|string|max:255',
            'data_de_admissao' => 'nullable|date',
            'vinculo_empregaticio' => 'nullable|string|max:255',
        ]);

        // 📷 Upload da foto (se enviada)
        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('fotos_professores', 'public');
        }

        // Criar o professor no banco de dados
        Professor::create($validated);
        User::create([
            'name' => $validated['nome'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['cpf']),
            'role' => 'professor'
        ]);

        return redirect()->route('professores.listar')->with('success', 'Professor criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Encontrar o professor pelo ID
        $professor = Professor::findOrFail($id);

        // Retornar a view com os dados do professor
        return view('professores.ver', compact('professor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Encontrar o professor pelo ID
        $professor = Professor::findOrFail($id);

        // Retornar a view com os dados do professor
        return view('professores.editar', compact('professor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Professor $professor)
    {
        $validated = $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nome' => 'nullable|string|max:255',
            'data_de_nascimento' => 'nullable|date',
            'idade' => 'nullable|integer',
            'sexo' => 'nullable|string',
            'cpf' => 'nullable|string|max:14',
            'rg' => 'nullable|string|max:20',
            'naturalidade' => 'nullable|string|max:255',
            'nacionalidade_responsavel' => 'nullable|string|max:255',
            'celular' => 'nullable|string|max:16',
            'cep' => 'nullable|string|max:10',
            'rua' => 'nullable|string|max:255',
            'numero' => 'nullable|string|max:10',
            'bairro' => 'nullable|string|max:255',
            'cidade' => 'nullable|string|max:255',
            'estado' => 'nullable|string|max:255',
            'formacao_graduacao' => 'nullable|string|max:255',
            'turno_que_trabalha' => 'nullable|string|max:255',
            'data_de_admissao' => 'nullable|date',
            'vinculo_empregaticio' => 'nullable|string|max:255',
        ]);

        // 📷 Atualizar a foto do professor 
        if ($request->hasFile('foto')) {
            // Apagar a foto antiga se existir
            if ($professor->foto) {
                $fotoAntiga = $professor->foto; // Caminho correto relativo ao disco "public"

                // Verificar se o arquivo existe antes de tentar excluir
                if (Storage::disk('public')->exists($fotoAntiga)) {
                    Storage::disk('public')->delete($fotoAntiga);
                } else {
                    dd('Arquivo antigo não encontrado: ' . $fotoAntiga);
                }
            }

            // Salvar a nova foto
            $validated['foto'] = $request->file('foto')->store('fotos_professores', 'public');
        }


        if ($request->hasFile('fotos_professores')) {
            // Apagar a foto antiga se existir
            if ($professor->foto_responsavel) {
                $fotoAntiga = $professor->foto_responsavel; // Remova "public/"

                // Verificar se o arquivo realmente existe antes de tentar excluir
                if (Storage::disk('public')->exists($fotoAntiga)) {
                    Storage::disk('public')->delete($fotoAntiga);
                } else {
                    dd('Arquivo antigo não encontrado: ' . $fotoAntiga);
                }
            }

            // Salvar a nova foto
            $validated['foto_responsavel'] = $request->file('foto_responsavel')->store('fotos_responsaveis', 'public');
        }



        // Atualizar os dados do professor no banco
        $professor->update($validated);

        // Redirecionar com uma mensagem de sucesso
        return redirect()->route('professores.listar')->with('success', 'Professor(a): <strong>' . $professor->nome . '!</strong><br> Atualizado(a) com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Professor $professor)
    {
        // Lógica para excluir o professor, se necessário
        $professor->delete();

        return redirect()->route('professores.listar')->with('success', 'Professor excluído com sucesso!');
    }

    /**
     * Buscar alunos com base em critérios fornecidos pelo usuário.
     */
    public function busca(Request $request)
    {
        $query = Professor::query();

        if ($request->has('search') && !empty($request->search)) {
            $query->where(function ($q) use ($request) {
                $q->where('id', $request->search)
                    ->orWhere('nome', 'LIKE', '%' . $request->search . '%');
            });
        }

        $professores = $query->get();
        return view('professores.listar', compact('professores'));
    }
}
