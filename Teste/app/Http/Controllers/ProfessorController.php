<?php

namespace App\Http\Controllers;

use App\Models\professor;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        {
            $professores = Professor::all();
            return view('professores.listar', compact('professores'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('professores.criar'); // Certifique-se de que a view existe
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação
        $validated = $request->validate([
            'nome' => 'required|string|max:255', // Altere conforme os campos necessários
        ]);

        // Criar o professor
        $professor = Professor::create($validated);

        // Redirecionar com sucesso
        return redirect()->route('professores.listar')->with('success', 'Professor criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    // Exibir dados do professor
    public function show($id)
    {
        // Encontrar o professor pelo ID
        $professor = Professor::findOrFail($id);

        // Retornar a view com os dados do professor
        return view('professores.editar', compact('professor'));
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
    // Validação dos dados recebidos
    $validated = $request->validate([
        'nome' => 'required|string|max:255', // Adicione mais campos conforme necessário
    ]);

    // Atualizando os dados do professor
    $professor->update($validated);

    // Redirecionar com uma mensagem de sucesso
    return redirect()->route('professores.listar')->with('success', 'Professor atualizado com sucesso!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(professor $professor)
    {
        //
    }

    // * Buscar professores com base em critérios fornecidos pelo usuário.
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