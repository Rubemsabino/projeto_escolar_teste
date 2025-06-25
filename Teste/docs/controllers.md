- [VOLTAR](documentatian.md)
# Trabalhando os Métodos no controllers para implementar a lógica.
Abra: app/Http/ e a controllers que você criou

6.1 index()	Ajusta o método para lista todos os registros.
```sh
public function index()
    {
        return (new AlunoService())->index();
    }
```
Paralelo a isto, Abra: app/Service/ e crie o arquivo AlunoService.php
Faça as devidas atualizações.



6.2 Criar o grupo de rota.
```sh
Route::prefix('alunos')->name('alunos.')->group(function () {
    
});
```
6.3 Criar a rota para lista, dentro do grupo de rota aluno no exemplo, olhe se no inicio tem use da rota criada
EX: use App\Http\Controllers\CoordenadorController;
```sh
Route::prefix('alunos')->name('alunos.')->group(function () {
    Route::get('listar', [AlunoController::class, 'index'])->name('listar'); // Listar alunos
    
});
```
6.4 Trabalhando com as views.
Abra: database/views/ e criar uma pasta para colocar os arquivo blade.php nela ex: aluno.

6.5 Dentro da pasta criada aluno, crie o arquivo blade.
Abra: alunos/ e crie um arquivo chamado no exemplo: listar.blade.php

*TAMBÉM CRIAR O MENU PARA SER COLOCADO DENTRO DOS ARQUIVOS

6.6 No arquivo 
Abra: listar.blade.php/ e crie os scrips para as logicas.

6.7 Testando o arquivo
Terminal:
	php artisan serve

6.8 No terminal segure Ctrl e clique em algo assim: Server running on [http://127.0.0.1:8000], para abrir o projeto no front.

6.9 veja se o arquivo lista abriu e faça os testes.



_____________
7. create()	Exibe formulário de criação	/alunos/create	GET

7.1
public function create()
    {
        return view('alunos.criar');
    }

7.2 Criar a rota para chamar o formulário paracriar, dentro do grupo de rota aluno no exemplo.
Route::prefix('alunos')->name('alunos.')->group(function () {
    Route::get('listar', [AlunoController::class, 'index'])->name('listar'); // Listar alunos
    Route::get('criar', [AlunoController::class, 'create'])->name('criar'); // Formulário de criação
    
});
_____________
8.store()	Salva novo registro	/alunos	POST (para melhor compreensão os nomes dos campos da migrations, use como base para validar os campos no método store, ficando assim como exemplo:

*OBS: Caso já tenha algum método store criado olhe por ele, pois estou usando os mesmos campos para criar todos os outros para manter um único padrão.

$validated = $request->validate([
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

        'nome' => 'required|string|max:255',
        'data_de_nascimento' => 'nullable|date',
        'idade' => 'nullable|integer',
        'sexo' => 'nullable|string',
        'cpf' => 'nullable|string|max:14',
       
    ]);

Obs: caso tenha campo para foto faça como aqui, ou olhe em outros exemplos.
Se não tiver campo para foto não se esqueça de colocar a parte que realmente cria o aluno no caso no BD = Aluno::create($validated);
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

8.1 Criar a rota para salvar, dentro do grupo de rota aluno no exemplo.
Route::prefix('alunos')->name('alunos.')->group(function () {
    Route::get('listar', [AlunoController::class, 'index'])->name('listar'); // Listar alunos
    Route::get('criar', [AlunoController::class, 'create'])->name('criar'); // Formulário de criação
    Route::post('salvar', [AlunoController::class, 'store'])->name('salvar'); // Salvar novo aluno (POST)

});

8.2 Dentro da pasta criada aluno, crie o arquivo blade.
Abra: alunos/ e crie um arquivo chamado no exemplo: criar.blade.php

8.3 No arquivo 
Abra: criar.blade.php/ e crie os scrips para as logicas.
*OBS: Caso já tenha algum arquivo.ble.php criado olhe por ele, pois estou usando os mesmos campos para criar todos os outros para manter um único padrão, mas não esqueça de manter a ordem destes, olhando pela as migrations daquilo que esteja criando.

_____________
9.show()	Mostra um registro específico	/alunos/{id}	GET
public function show($id)
    {
        // Encontrar o professor pelo ID
        $professor = Professor::findOrFail($id);

        // Retornar a view com os dados do professor
        return view('professores.editar', compact('professor'));
    }

9.1 Criar a rota para mostrar um registro, dentro do grupo de rota aluno no exemplo.
Route::prefix('professores')->name('professores.')->group(function () {
    Route::get('listar', [ProfessorController::class, 'index'])->name('listar'); // Listar professores
    Route::get('criar', [ProfessorController::class, 'create'])->name('criar'); // Formulário de criaçãoj
    Route::post('salvar', [ProfessorController::class, 'store'])->name('salvar'); // Processar criação (POST)
    Route::get('buscar', [ProfessorController::class, 'busca'])->name('buscar'); // Buscar professores

    Route::get('{professor}', [ProfessorController::class, 'show'])->name('ver'); // Exibir um professor específico
    
});


9.2 Dentro da pasta criada aluno, crie o arquivo blade.
Abra: alunos/ e crie um arquivo chamado no exemplo: ver.blade.php

9.3 No arquivo
Abra: ver.blade.php/ e crie os scrips para as logicas. (Obs: copie os campos do formulário de criação e neles acrescente o EX:(value="{{($aluno->parentesco)}}" readonly) ).
*OBS: Caso já tenha algum arquivo.ble.php criado olhe por ele, pois estou usando os mesmos campos para criar todos os outros para manter um único padrão, mas não esqueça de manter a ordem destes, olhando pela as migrations daquilo que esteja criando.

_____________
10. edit()	Exibe formulário de edição	/alunos/{id}/edit	GET
public function edit($id)
    {
        // Encontrar o professor pelo ID
        $professor = Professor::findOrFail($id);
    
        // Retornar a view com os dados do professor
        return view('professores.editar', compact('professor'));
    }

_____________
11. update()	Atualiza um registro	/alunos/{id}	PUT/PATCH (Obs: copie os mesmos campos do método store no validated e todos com nullable, e colo no validated no update)
Obs: caso tenha campo para foto faça como aqui, ou olhe em outros exemplos.
Se não tiver campo para foto não se esqueça de colocar a parte que realmente cria o aluno no caso no BD = Aluno::create($validated);

public function update(Request $request, Professor $professor)
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

// 📷 Atualizar a foto do aluno
if ($request->hasFile('foto')) {
    // Apagar a foto antiga se existir
    if ($professor->foto) {
        Storage::delete($professor->foto);
    }

    // Salvar a nova foto
    $validated['foto'] = $request->file('foto')->store('fotos_professores', 'public');
}

    // Atualizando os dados do professor
    $professor->update($validated);

    // Redirecionar com uma mensagem de sucesso
    return redirect()->route('professores.listar')->with('success', 'Professor atualizado com sucesso!');
}

11.1 Criar a rota para edidtar, dentro do grupo de rota aluno no exemplo
Route::prefix('professores')->name('professores.')->group(function () {
    Route::get('listar', [ProfessorController::class, 'index'])->name('listar'); // Listar professores
    Route::get('criar', [ProfessorController::class, 'create'])->name('criar'); // Formulário de criaçãoj
    Route::post('salvar', [ProfessorController::class, 'store'])->name('salvar'); // Processar criação (POST)
    Route::get('buscar', [ProfessorController::class, 'busca'])->name('buscar'); // Buscar professores

    Route::get('{professor}', [ProfessorController::class, 'show'])->name('ver'); // Exibir um professor específico
    Route::get('{professor}/editar', [ProfessorController::class, 'edit'])->name('editar'); // Formulário de edição
    
});


11.2 Dentro da pasta criada aluno, crie o arquivo blade.
Abra: alunos/ e crie um arquivo chamado no exemplo: editar.blade.php

11.33 No arquivo
Abra: ediatar.blade.php/ e crie os scrips para as logicas. (Obs: copie os campos do formulário de criação e do formulário de ver, neles acrescente o EX:(value="{{($aluno->parentesco)}}") ).
*OBS: Caso já tenha algum arquivo.ble.php criado olhe por ele, pois estou usando os mesmos campos para criar todos os outros para manter um único padrão, mas não esqueça de manter a ordem destes, olhando pela as migrations daquilo que esteja criando.





























destroy()	Exclui um registro	/alunos/{id}	DELETE

5.Criar as routes para implementar a lógica.
Atualizando e usando isto em cada rota criada: use App\Http\Controllers\ProfessorController;

- [VOLTAR](documentatian.md)