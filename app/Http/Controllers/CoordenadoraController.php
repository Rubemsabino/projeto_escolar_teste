<?php

namespace App\Http\Controllers;

use App\Models\Coordenadora;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CoordenadoraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $coordenadoras = Coordenadora::all();
    return view('coordenadoras.listar', compact('coordenadoras'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('coordenadoras.criar');
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
        Coordenadora::create($validated);

        return redirect()->route('professores.listar')->with('success', 'Professor criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Encontrar o professor pelo ID
        $coordenadora = Coordenadora::findOrFail($id);

        // Retornar a view com os dados do professor
        return view('coordenadoras.ver', compact('coordenadora'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Encontrar o professor pelo ID
        $coordenadora = Coordenadora::findOrFail($id);

        // Retornar a view com os dados do professor
        return view('coordenadoras.editar', compact('coordenadora'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coordenadora $coordenadora)
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
            if ($professor->foto && Storage::exists('public/' . $professor->foto)) {
                Storage::delete('public/' . $professor->foto);
            }

            // Salvar a nova foto
            $validated['foto'] = $request->file('foto')->store('fotos_professores', 'public');
        }

        // Atualizando os dados do professor
        $coordenadora->update($validated);

        // Redirecionar com uma mensagem de sucesso
        return redirect()->route('coordenadoras.listar')->with('success', 'Coordenadora atualizado com sucesso!');
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

    public function busca(Request $request)
    {
        $query = Coordenadora::query();

        if ($request->has('search') && !empty($request->search)) {
            $query->where(function ($q) use ($request) {
                $q->where('id', $request->search)
                  ->orWhere('nome', 'LIKE', '%' . $request->search . '%')
                  ->orWhere('cpf', 'LIKE', '%' . $request->search . '%');
            });
        }

        $coordenadora = $query->get();
        return view('coordenadoras.listar', compact('coordenadoras'));
    }

}
