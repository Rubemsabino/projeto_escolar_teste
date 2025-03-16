 [
    documentação do mark dawn
 ](https://docs.pipz.com/central-de-ajuda/learning-center/guia-basico-de-markdown#open)
 
 
 Projeto Laravel, a ordem ideal para começar depende da abordagem e da funcionalidade que você quer implementar. Aqui está uma sugestão lógica e prática para organizar o trabalho:

# 0.Instale o XAMPP e o composer.


*Organizando o ambiente para a criação.

## 1.Na unidade C: crie uma pasta para armazenar o seu sistema. Ex: projeto_escolar_teste. vá em:

```sh
	C/xmpp/htdocs/crie a pasta.
```
1.2 No Vscode vá em:
	-File
	-Open folder.
	-Abra a unidade C/xmpp/htdocs.
	-E selecione a pasta que foi criada, no caso: projeto_escolar_teste.

1.3 Criar o Projeto Laravel, abra o terminal indo em (.../Terminal/New Terminal ou  (Ctrl+Shift+')).
	Rodar no terminal: composer create-project laravel/laravel Teste.
	Obs: Teste (é no meu caso, o nome do projeto).

1.2 Entre na pasta do projeto.
	Rodar no terminal: cd Teste.
	Obs: (Teste é no meu caso, o nome da pasta do projeto).

1.3 Vendo se instalou tudo certinho.
	Rodar no terminal: php artisan serve.
	Obs: (Tem que abrir na internet, a página do Laravel com endereço: http://127.0.0.1:8000/).

1.4 Abra o XAMPP, e inicie o Apache e o MySQL..

1.5 No Vscode, abra o arquivo .env, e configure a conexão com o banco:
	DB_CONNECTION=mysql 		  /ATENÇÃO: olhe se aqui o tipo de banco de dados em relação ao nome
	DB_HOST=127.0.0.1
	DB_PORT=3306
	DB_DATABASE=projeto_escolar_teste /ATENÇÃO: mude este nome para o nome do Banco de Dados que você irar criar, tire os (#) são cometarios
	DB_USERNAME=root
	DB_PASSWORD=

1.6 Planejar o banco de dados.
	-Abra o XAMPP, e click em Admin e crie o banco de dados no phpMyAdmin.
	-No phpMyAdmin vá em:
	-Novo.
	-Digite o nome do BD.
	-click em Criar.

_________________________________________________________________________________________

Para armazenar um projeto Laravel no GitHub, siga estes passos:

🛠️ 1. Criar um repositório no GitHub
Acesse GitHub e faça login.
Clique em New Repository.
Escolha um nome para o repositório.
Defina se será público ou privado.
Não marque a opção de adicionar README, .gitignore ou licença (faremos isso manualmente).
Clique em Create repository.

🔗 2. Inicializar o Git no projeto
No terminal do VS Code, navegue até a pasta do seu projeto Laravel e execute:
git init
Isso inicializa o repositório Git localmente.

📂 3. Criar um .gitignore (NÃO PRECISA)
O Laravel já possui um .gitignore padrão, mas garanta que ele esteja presente. Se não existir, crie um e adicione:
vendor/
node_modules/
storage/
bootstrap/cache/
.env
.env.example
Isso impede que arquivos sensíveis e dependências sejam enviados ao GitHub.

📌 4. Adicionar e versionar os arquivos
Adicione os arquivos ao Git:
git add .
git commit -m "Primeiro commit do projeto Laravel"

🔗 5. Conectar ao repositório remoto
Copie a URL do repositório no GitHub e execute:
git remote add origin https://github.com/SEU-USUARIO/NOME-DO-REPOSITORIO.git
Confirme a conexão:

git remote -v

📤 6. Enviar para o GitHub (
Suba o código para o repositório:
git branch -M main
git push -u origin main

✅ 7. Clonando o projeto depois
Caso precise baixar o projeto em outro local, execute:
git clone https://github.com/SEU-USUARIO/NOME-DO-REPOSITORIO.git
Depois, instale as dependências:
composer install
npm install && npm run dev

E crie o arquivo .env:
cp .env.example .env
php artisan key:generate
Pronto! Seu projeto Laravel está salvo no GitHub. 🚀




CLONEI MEU ARQUIVO NA MÁQUINA, AGORA QUERO SUBIR PAR O GIT
Para subir as alterações do seu repositório local para o GitHub, siga esses passos:

1. Verifique o status do repositório:

Execute o seguinte comando para ver as alterações feitas no repositório:
Terminal:
	git status

Obs: Irá aparecer o que foi alterado na cor vermelha indicando que os arquivos ainda não foram subidos.

2.Adicione os arquivos para o commit:

Se você tiver novos arquivos ou alterações, adicione-os ao staging area:
Terminal:
	git add .

OBS:O . significa que você está adicionando todos os arquivos modificados ou novos ao staging. Se quiser adicionar arquivos específicos, substitua o . pelo caminho do arquivo.

3. Faça o commit:

Agora, faça o commit com uma mensagem explicativa:
Terminal:
	git commit -m "Mensagem do commit explicando as alterações"

4. Suba as alterações para o GitHub:

Se você já tiver configurado o repositório remoto, pode simplesmente fazer o push das suas alterações com:
Terminal:
	git push origin main

5.Seu commit foi criado com sucesso! 🎉

Agora, para enviar as alterações para o GitHub, execute:
Terminal:
	git push origin main






Verifique se as alterações foram enviadas:

Você pode verificar se as alterações foram enviadas ao GitHub acessando o seu repositório na plataforma.

















AUTEREI ALGUMA COISA NO PROJETO, IREI SUBIR
Rodar no terminal: 
		  1º  git pull origin main
		   
	         2º   git add .
		      git commit -m "Alter aqui"
		      git push origin main


	Explicação:
	git pull origin main → Puxa as últimas mudanças do repositório remoto.
	git add . → Adiciona todas as mudanças ao commit.
	git commit -m "Descrição das alterações" → Cria um commit com a mensagem especificada.
	git push origin main → Envia as mudanças para o GitHub.

_________________________________________________________________________________________
DANDO INICIO AO PROJETO OU SEJA, DEPOIS DAS CONFIGURAÇÕES ACIMA...

1.Criando
Model: app/Models/Professor.php
Migration: database/migrations/xxxx_xx_xx_xxxxxx_create_professors_table.php
Controller Resource: app/Http/Controllers/ProfessorController.php
Factory: database/factories/ProfessorFactory.php
Seeder: database/seeders/ProfessorSeeder.php

Terminal:
	php artisan make:model Aluno -mcrfs
	
	Obs: Se for criar alguma migration que irar ter relacionamento com outra tabela, está outra terá que já existir.
	Obs: Aluno (é no meu caso, o nome do que quero criar para todos aqueles nomes anteriores).

SE QUISER APAGAR TUDO DE UMA ÚNICA VEZ (Aluno e a referencia para apagar.)
Terminal:
	rm -f app/Models/Aluno.php \ 
      	app/Http/Controllers/AlunoController.php \
      	database/migrations/*_create_alunos_table.php \
      	database/factories/AlunoFactory.php \
      	database/seeders/AlunoSeeder.php

2. Trabalhando a migrations criada.
Abra: database/migrations/ e a migrations que você criou.

2.1 Veja a questão do nome se estar escrita no plural certinho e crie os campos aqui:

2.2 Abrindo a migrations criada para criar os campos.

Schema::create('alunos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('cpf')->unique()->nullable(); // CPF do aluno, se aplicável
            $table->string('rg')->nullable(); // RG do aluno, se aplicável
            $table->date('data_nascimento');
            $table->string('sexo')->nullable(); // Masculino, Feminino, etc.
            $table->string('naturalidade')->nullable(); // Cidade/Estado onde nasceu
            $table->string('nacionalidade')->nullable(); // Nacionalidade (ex.: Brasileiro)
            $table->string('certidao')->nullable(); // Número da certidão de nascimento
	    $table->string('responsavel'); // responsável aluno
            $table->string('celular-resp')->nullable();
            $table->string('email')->nullable(); 
            $table->string('nome_pai')->nullable(); // Nome do pai
            $table->string('nome_mae')->nullable(); // Nome da mãe
            $table->string('imagem')->nullable(); // Caminho ou URL da imagem
            $table->timestamps();

O relacionamento para este exemplo, estou criando a migration turma.
	    $table->foreignId('professor_id')->constrained('professores')->onDelete('set null')->nullable(); // Professor responsável da turma.
            
        });


Se tiver relacionamento você precisa configurar os relacionamentos no Model correspondente.
No arquivo app/Models/Turma.php, você precisa definir o relacionamento pertence a (belongsTo), já que cada turma tem um professor.
acrescenta isto depois do protected do campos

// Relacionamento: Uma turma pertence a um professor
    public function professor()
    {
        return $this->belongsTo(Professor::class, 'professor_id');
    }
























No arquivo app/Models/Professor.php, defina o relacionamento tem muitas (hasMany), pois um professor pode ter várias turmas.
acrescenta isto depois do protected do campos

// Relacionamento: Um professor pode ter Várias turmas
    public function turmas()
    {
        return $this->hasMany(Turma::class, 'professor_id');

    }

ou

// Relacionamento: Um professor tem apenas UMA turma
    public function turma()
    {
        return $this->hasOne(Turma::class, 'professor_id');
    }









RELACIONAMENTO TURMA E PROFESSORES

Se uma turma pode ter vários professores, então o relacionamento deve ser "muitos para muitos" (belongsToMany). Isso exige uma tabela intermediária (professor_turma) para armazenar quais professores pertencem a quais turmas.

1️⃣ Criando a Migration da Tabela Intermediária
Essa tabela professor_turma será responsável por armazenar os IDs de professores e turmas.

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('professor_turma', function (Blueprint $table) {
            $table->id();
            $table->foreignId('professor_id')->constrained('professores')->onDelete('cascade');
            $table->foreignId('turma_id')->constrained('turmas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('professor_turma');
    }
};


2️⃣ Modificando os Models
Agora, alteramos Professor.php e Turma.php para usar belongsToMany.

Model Professor.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'email'];

    // Um professor pode estar em várias turmas
    public function turmas()
    {
        return $this->belongsToMany(Turma::class, 'professor_turma');
    }
}


Model Turma.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'ano_letivo', 'capacidade', 'turno'];

    // Uma turma pode ter vários professores
    public function professores()
    {
        return $this->belongsToMany(Professor::class, 'professor_turma');
    }
}












































2.2 Rodando as migrations criada.
Terminal:
	php artisan migrate 
(cria os campos da migrations)

Obs: roda só um determinada migration , tenha cuidado mudando apenas o nome.
Terminal:
	php artisan migrate --path=database/migrations/2025_03_06_184012_create_coordenadores_table.php






Obs: caso você queira apagar todas as tabelas e recria-las faça:
Terminal:
	php artisan migrate:fresh 
(pode ser rodado até antes do sistema ir para o servidor) Obs: cria só o BD em os campos)












_____________
2.5 Criar a migração para adicionar os campos ou acrescentar
Use o comando abaixo para criar uma migração para adicionar ou acrescentar os campos à tabela turmas:
Terminal:
	php artisan make:migration add_campos_to_turmas_table --table=turmas

2.6 Editar a migração para adicionar os campos
Abra o arquivo da migração criada em database/migrations e edite a função up() para adicionar os novos campos à tabela turmas. Por exemplo:

public function up()
{
    Schema::table('turmas', function (Blueprint $table) {
        $table->string('nome_professor')->nullable();  // Exemplo de campo para o nome do professor
        $table->integer('ano');  // Exemplo de campo para o ano da turma
        $table->string('curso'); // Exemplo de campo para o curso
    });
}

2.7 Rodar a migração
Após editar o arquivo de migração, execute o comando para aplicar a migração e adicionar os campos à tabela turmas no banco de dados:
Terminal:
	php artisan migrate

2.8 Verificar se os campos foram adicionados
Após rodar a migração, você pode verificar se os campos foram adicionados à tabela turmas, usando uma ferramenta como o MySQL Workbench o phpmyAdmin

2.9 Desfazer a última migração
Se você apenas deseja desfazer a última migração que foi executada, pode usar o comando:
Terminal:
	php artisan migrate:rollback



🔄 Como Excluir e Recriar Migrações no Laravel
✅ 1. Excluir os arquivos de migração
Acesse a pasta:
database/migrations
Exclua manualmente os arquivos de migração que você não deseja mais.

✅ 2. Remover registros das migrações no banco de dados
O Laravel registra as migrações executadas na tabela migrations. Para garantir que o Laravel permita rodar novamente a nova migração com o mesmo nome, exclua o registro correspondente.

abra as migration no bd e selecione as mesmas que você excluiu antes, para também serem excluídas.
delete a tabela da migration no bd

✅ 3. Criar uma nova migração
Agora, crie uma nova migração do jeito que deseja:
php artisan make:migration create_alunos_table --table=alunos

✅ 4. Definir a estrutura correta
No arquivo de migração gerado, defina os campos da tabela conforme necessário, conforme a atualização certa agora.

✅ 5. Rodar a migração
Execute o comando para aplicar as novas migrações:
php artisan migrate

✅ 6. Verificar se está tudo certo
Cheque se a tabela e as colunas foram criadas corretamente:

✅ Pronto! Agora você tem uma nova migração limpa e atualizada. Se tiver mais alguma dúvida ou quiser ajustar algo, só perguntar! 🚀










_____________
3.Trabalhando a models criada.

3.1 Pegue os campos da migrations menos o id, abra o gpt e peça para criar com base nestes scripts, um arquivo models.

3.2 Abrindo a models criada, atualize a models com o que gpt criou, ficando assim como o exemplo:
Abra: app/models/ e a models que você criou.

protected $fillable = [
        'foto',

        'nome',
        'data_de_nascimento',
        'idade',
        'sexo',
        'cpf',
];
Obs: separe por linha os campos para melhor organização.

_____________
4.Trabalhando a factories criada.
Abra: database/factories/ e a factories que você criou.

4.1 Pegue os campos da migrations, abra o gpt e peça para criar com base nestes scripts, um arquivo factories.
4.2 Abrindo a factories criada, logo abaixo no nomespace importe a: use App\Models\Professor;
4.3 Atualize a factories, logo abaixo da { da: class CoordenadoraFactory extends Factory, importe o:  protected $model = 4.4 Professor::class;
4.4 Atualize a factories com o que gpt criou, ficando assim como o exemplo:

return [

'foto' => $this->faker->imageUrl(),
'nome' => $this->faker->name(),
'data_de_nascimento' => $this->faker->date(),
'idade' => $this->faker->numberBetween(18, 60),
'sexo' => $this->faker->randomElement(['masculino', 'feminino', 'outros']),
'cpf' => $this->faker->regexify('[0-9]{3}\.[0-9]{3}\.[0-9]{3}-[0-9]{2}'),
'rg' => $this->faker->regexify('[0-9]{2}\.[0-9]{3}\.[0-9]{3}-[0-9]{1}'),
'pai' => $this->faker->name(),
'mae' => $this->faker->name(),
'certidao' => $this->faker->regexify('[0-9]{6} [0-9]{2} [0-9]{2} [0-9]{4} [0-9]{1} [0-9]{5} [0-9]{3} [0-9]{7} [0-9]{2}'),
'naturalidade' => $this->faker->city(),
'nacionalidade' => $this->faker->country(),
'celular' => $this->faker->regexify('\([1-9]{2}\) [2-9][0-9]{3}-[0-9]{4}'),
'cep' => $this->faker->postcode(),
'rua' => $this->faker->streetName(),
'numero' => $this->faker->numberBetween(1, 100),
'bairro' => $this->faker->word(),
'cidade' => $this->faker->city(),
'estado' => $this->faker->state(),

 ];

_____________ 
5.Trabalhando a seeders criada.  (se necessário).
	
5.1 No arquivo seeder criado, importar a model em questão Ex: Use App\Models\Aluno;
Abra: database/seeder/ e a seeder que você crio

5.2 No método rum fazer assim mudando nome Aluno para outro em questão Ex: Aluno::factory(100)->create();

5.3 No arquivo DatabaseSeeder.php, faça uma definição no método rum, fazer assim mudando nome Aluno para outro em questão Ex: $this->call(AlunoSeeder::class);

Terminal:
	php artisan db:seed (popular todas as tabelas do banco)

	php artisan db:seed --class=ProfessorSeeder (popular só a tabela de ProfessoresSeeder no caso)
	php artisan db:seed --class=AlunoSeeder
_____________
6.Trabalhando os Métodos no controllers para implementar a lógica.
Abra: app/Http/ e a controllers que você crio

6.1 index()	Ajusta o método para lista todos os registros.

public function index()
    {
        $alunos = Aluno::all();
        return view('alunos.listar', compact('alunos'));
    }

6.2 Criar o grupo de rota.

Route::prefix('alunos')->name('alunos.')->group(function () {
    
});

6.3 Criar a rota para lista, dentro do grupo de rota aluno no exemplo, olhe se no inicio tem use da rota criada
EX: use App\Http\Controllers\CoordenadorController;

Route::prefix('alunos')->name('alunos.')->group(function () {
    Route::get('listar', [AlunoController::class, 'index'])->name('listar'); // Listar alunos
    
});

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



_______________________________________________________________
6.Registrar as rotas.(criar)
6.1 ao criar a rota, atualizar o método no controler.
6.2 ver se a página da criação do aluno está ok.

7.Criar as views ou testar os endpoints da API.


15.2 Saber o IP
Terminal:
	ipconfig

15.php artisan serve no celular
Terminal
	php artisan serve --host=<SEU_IP> --port=8000
Ficando assim
Terminal
	php artisan serve --host=192.168.0.100 --port=8000
	php artisan serve --host=10.0.0.171 --port=8000


15.1 Celular
http://192.168.0.104:8000




CRUD
https://imasters.com.br/php/como-fazer-um-crud-no-laravel-do-zero-parte-1
https://imasters.com.br/php/como-fazer-um-crud-no-laravel-do-zero-parte-2

https://help.sistemaquality.com.br/2020/08/20/como-adicionar-meus-proprios-documentos-para-que-o-sistema-preencha-automaticamente-para-impressao/

Dados para criação do aluno

1. Informações Pessoais

foto
nome completo
data_de_nascimento
idade (Só exebição)
sexo
CPF
RG
certidão_de_nascimento
celular
cep
endereco_rua
endereco_numero
endereco bairro
endereco cidade
endereco estado


2. Informações dos Responsáveis
foto_responsavel
nome_do_responsavel_principal
data_de_nascimento
idade_responsavel
sexo_responsavel
CPF__responsavel
RG_responsavel
celular_responsavel
parentesco
cep_responsavel
endereco_rua_responsavel
endereco_numero_responsavel
endereco bairro_responsavel
endereco cidade_responsavel
endereco estado_responsavel

3. Informações Acadêmicas
ano_letivo
turno
status_da_matrícula
data_de_ingresso
hora_de_ingresso 
parte_do_dia

4. Informações Extras
necessidades_especiais
tipo sanguíneo
fator_rh
observacoes


___________________________________________________________________________________________
Dados para criação da turma

1. Identificação da Turma
Código da turma (ex: "9A-2025")
Nome da turma (ex: "9º Ano A")
Ano letivo
Série/ano (ex: "9º Ano", "3º Série do Ensino Médio")
Turno (Matutino, Vespertino, Noturno)

2. Informações Acadêmicas
Curso (se aplicável, ex: "Ensino Fundamental", "Ensino Médio", "Técnico em Informática")
Quantidade máxima de alunos
Lista de alunos matriculados
Lista de professores responsáveis
Sala de aula (número da sala, prédio, bloco)

3. Horários e Disciplinas
Grade horária (dias e horários das aulas)
Disciplinas vinculadas à turma
Professor(a) responsável por cada disciplina

4. Informações Extras
Coordenador responsável
Status da turma (ativa, encerrada, aguardando alunos)
Observações (ex: "Turma voltada para alunos com reforço em Matemática")

Educação Infantil:

Berçário: Faixa etária: 0 a 1 ano
Maternal: Faixa etária: 1 a 2 anos
Maternal II: Faixa etária: 2 a 3 anos
Jardim I: Faixa etária: 3 a 4 anos
Jardim II: Faixa etária: 4 a 5 anos

Para o Ensino Fundamental - Séries Iniciais, que abrange as crianças de 6 a 10 anos, a divisão é feita da seguinte maneira:

1º ano do Ensino Fundamental: Faixa etária: 6 a 7 anos
2º ano do Ensino Fundamental: Faixa etária: 7 a 8 anos
3º ano do Ensino Fundamental: Faixa etária: 8 a 9 anos
4º ano do Ensino Fundamental: Faixa etária: 9 a 10 anos
5º ano do Ensino Fundamental: Faixa etária: 10 a 11 anos

As séries finais do Ensino Fundamental correspondem do 6º ao 9º ano, atendendo crianças e adolescentes de 11 a 14 anos. A divisão das séries finais do Ensino Fundamental é a seguinte:

6º ano do Ensino Fundamental: Faixa etária: 11 a 12 anos
7º ano do Ensino Fundamental: Faixa etária: 12 a 13 anos
8º ano do Ensino Fundamental: Faixa etária: 13 a 14 anos
9º ano do Ensino Fundamental: Faixa etária: 14 a 15 anos

O Ensino Médio no Brasil abrange os três últimos anos da educação básica, geralmente atendendo jovens de 15 a 17 anos. A divisão é a seguinte:

1º ano do Ensino Médio: Faixa etária: 15 a 16 anos
2º ano do Ensino Médio: Faixa etária: 16 a 17 anos
3º ano do Ensino Médio: Faixa etária: 17 a 18 anos
___________________________________________________________________________________________
Dados para criação do professor

1. Informações Pessoais
Nome completo
Data de nascimento
CPF (ou outro documento de identificação)
RG
Endereço (Rua, Número, Bairro, Cidade, Estado, CEP)
Celular
E-mail
Foto

2. Informações Profissionais
Matrícula (ID do professor)
Formação Acadêmica (graduação, pós-graduação, mestrado, doutorado)
Área de atuação (Matemática, Física, História, etc.)
Disciplinas que leciona
Carga horária semanal
Turno de trabalho (Matutino, Vespertino, Noturno)
Data de admissão
Vínculo empregatício (CLT, temporário, estagiário, voluntário)
Salário (se aplicável)

3. Documentação
Diplomas e Certificados
Registro no Conselho de Classe (Ex: CRM, CREA, OAB, caso necessário)
Currículo
Comprovante de Residência
Carteira de Trabalho (se aplicável)

4. Acesso ao Sistema (se a escola tiver um sistema digital)
Login
Senha
Permissões no sistema

___________________________________________________________________________________________
Formulário de Matrícula
1. Dados do Aluno
📌 Informações pessoais do aluno

Nome completo: [____________________]
Data de nascimento: [📅 Seletor de data]
Sexo: ( ) Masculino ( ) Feminino ( ) Outro
CPF: [____________________] (opcional para menores de idade)
RG: [____________________] (opcional)
Certidão de nascimento: [📎 Upload do arquivo]
Endereço: [Rua, Número, Bairro, Cidade, Estado, CEP]
Telefone: [📞 Número do aluno, se aplicável]
E-mail: [📧] (se aplicável)

2. Dados do Responsável
📌 Caso o aluno seja menor de idade

Nome do responsável: [____________________]
Parentesco: ( ) Pai ( ) Mãe ( ) Outro: [________]
CPF do responsável: [____________________]
Telefone do responsável: [📞]
E-mail do responsável: [📧]
Endereço do responsável (se diferente do aluno): [____________________]

3. Informações da Matrícula
📌 Dados acadêmicos do aluno

Ano letivo: [📅 Seletor de ano]
Série/Ano: [📂 Seletor de série] (Ex: 1º Ano, 6º Ano, 3ª Série do Ensino Médio)
Turma: [📂 Seletor de turma]
Turno: ( ) Matutino ( ) Vespertino ( ) Noturno
Modalidade: ( ) Presencial ( ) EAD ( ) Híbrido
Situação do aluno: ( ) Novo aluno ( ) Transferido ( ) Rematrícula

4. Informações Extras
📌 Dados complementares

Necessidades Especiais: ( ) Sim ( ) Não — Se sim, quais? [____________________]
Alergias ou condições médicas: [____________________]
Transporte escolar: ( ) Sim ( ) Não
Observações adicionais: [📝 Caixa de texto]

5. Informações Financeiras (se aplicável)
📌 Caso a escola seja particular

Mensalidade: [💰 Valor]
Forma de pagamento: ( ) Cartão ( ) Boleto ( ) Transferência
Bolsista: ( ) Sim ( ) Não — Se sim, percentual de desconto: [____%]

6. Envio de Documentos
📌 Uploads necessários

[📎] Cópia da Certidão de Nascimento ou RG
[📎] Comprovante de residência
[📎] Histórico escolar (se for transferência)
[📎] Foto 3x4

7. Confirmação
📌 Última etapa antes do envio
☑ Declaro que as informações fornecidas são verdadeiras e estou ciente das regras da escola.

🖊 Assinatura do responsável: [____________________]

📅 Data: [📅 Seletor de data]

🔘 [Enviar Matrícula] (Botão de envio do formulário)


DECLARAÇÃO DE BOLSISTA
Nome da Escola
CNPJ: XX.XXX.XXX/XXXX-XX
Endereço: [Rua, Número, Bairro, Cidade, Estado, CEP]
Telefone: (XX) XXXX-XXXX | E-mail: contato@escola.com

DECLARAÇÃO
Eu, [Nome do(a) Diretor(a) ou Responsável pela Instituição], na qualidade de [Cargo do Declarante] da [Nome da Escola], localizada no endereço acima citado, declaro para os devidos fins que o(a) aluno(a) [Nome do Aluno], portador(a) do CPF [Número do CPF do Aluno (se aplicável)], regularmente matriculado(a) na série [Série/Ano Escolar], turma [Nome da Turma], no turno [Matutino/Vespertino/Noturno], é beneficiário(a) de bolsa de estudos concedida por esta instituição.

A referida bolsa corresponde a [Percentual]% do valor total da mensalidade, sendo concedida devido [Motivo da Bolsa – Ex: mérito acadêmico, situação socioeconômica, convênio, etc.].

Esta declaração é emitida a pedido do(a) interessado(a) para os devidos fins.

Cidade, [Data Completa]

________________________________________
[Nome do Diretor(a) ou Responsável]
Cargo: [Diretor(a)/Coordenador(a)/Outro]
Nome da Escola


DECLARAÇÃO DE MATRÍCULA
Nome da Escola
CNPJ: XX.XXX.XXX/XXXX-XX
Endereço: [Rua, Número, Bairro, Cidade, Estado, CEP]
Telefone: (XX) XXXX-XXXX | E-mail: contato@escola.com

DECLARAÇÃO
A [Nome da Escola], instituição de ensino regularmente estabelecida no endereço acima, DECLARA, para os devidos fins, que o(a) aluno(a) [Nome Completo do Aluno], nascido(a) em [Data de Nascimento], portador(a) do CPF [Número do CPF] e RG [Número do RG], encontra-se REGULARMENTE MATRICULADO(A) nesta instituição no Ano Letivo de [Ano].

O(a) aluno(a) está cursando [Série/Ano Escolar], na turma [Nome da Turma], no turno [Matutino/Vespertino/Noturno].

Esta declaração é emitida a pedido do(a) interessado(a) para os fins que se fizerem necessários.

Cidade, [Data Completa]

________________________________________
[Nome do Diretor(a) ou Responsável]
Cargo: [Diretor(a)/Coordenador(a)/Outro]
Nome da Escola


DECLARAÇÃO DE VÍNCULO EMPREGATÍCIO Professor
Nome da Escola
CNPJ: XX.XXX.XXX/XXXX-XX
Endereço: [Rua, Número, Bairro, Cidade, Estado, CEP]
Telefone: (XX) XXXX-XXXX | E-mail: contato@escola.com

DECLARAÇÃO
A [Nome da Escola], instituição de ensino regularmente estabelecida no endereço acima, DECLARA, para os devidos fins, que o(a) Sr(a). [Nome Completo do Professor], portador(a) do CPF [Número do CPF] e RG [Número do RG], está vinculado(a) como professor(a) desta instituição, exercendo a função de [Cargo/Função, ex: Professor de Matemática].

O referido profissional iniciou suas atividades nesta instituição em [Data de Admissão], atuando no [Ensino Fundamental/Ensino Médio/Cursos Técnicos], ministrando as disciplinas de [Disciplinas Lecionadas], com carga horária semanal de [Número de Horas] horas.

Esta declaração é emitida a pedido do(a) interessado(a) para os fins que se fizerem necessários.

Cidade, [Data Completa]

________________________________________
[Nome do Diretor(a) ou Responsável]
Cargo: [Diretor(a)/Coordenador(a)/Outro]
Nome da Escola


DECLARAÇÃO DE VÍNCULO EMPREGATÍCIO funcionario
Nome da Escola
CNPJ: XX.XXX.XXX/XXXX-XX
Endereço: [Rua, Número, Bairro, Cidade, Estado, CEP]
Telefone: (XX) XXXX-XXXX | E-mail: contato@escola.com

DECLARAÇÃO
A [Nome da Escola], instituição de ensino regularmente estabelecida no endereço acima, DECLARA, para os devidos fins, que o(a) Sr(a). [Nome Completo do Funcionário], portador(a) do CPF [Número do CPF] e RG [Número do RG], é funcionário(a) desta instituição, exercendo a função de [Cargo/Função] desde [Data de Admissão].

O(a) referido(a) funcionário(a) exerce suas atividades no setor de [Nome do Setor], com [número de horas semanais] de carga horária semanal, no turno [Matutino/Vespertino/Noturno], sendo responsável pelas funções de [Principais Responsabilidades].

Esta declaração é emitida a pedido do(a) interessado(a) para os fins que se fizerem necessários.

Cidade, [Data Completa]

________________________________________
[Nome do Diretor(a) ou Responsável]
Cargo: [Diretor(a)/Coordenador(a)/Outro]
Nome da Escola



Dados para criação do funcionário

1. Informações Pessoais
Nome completo
Data de nascimento
CPF
RG
Endereço (Rua, Número, Bairro, Cidade, Estado, CEP)
Telefone
E-mail
Foto
2. Informações Profissionais
Matrícula (ID do funcionário)
Cargo/Função (ex: Secretário, Coordenador, Auxiliar de Serviços Gerais, TI, etc.)
Setor (Administração, Manutenção, Secretaria, Biblioteca)
Data de admissão
Vínculo empregatício (CLT, temporário, estagiário, voluntário)
Salário (se aplicável)
Carga horária semanal
Turno de trabalho (Matutino, Vespertino, Noturno)
Supervisor ou gestor responsável
3. Documentação
Carteira de Trabalho (se aplicável)
Diplomas e Certificados (se necessário para o cargo)
Currículo
Comprovante de Residência
4. Acesso ao Sistema (se houver um sistema interno)
Login
Senha
Permissões no sistema

OUTROS

1. Equipe Administrativa
Diretor(a) – Responsável geral pela gestão da escola.
Vice-diretor(a) – Auxilia na administração e substitui o diretor quando necessário.
Coordenador(a) Pedagógico(a) – Supervisiona o ensino e apoia os professores.
Secretário(a) Escolar – Cuida da documentação dos alunos e da burocracia.
Inspetor(a) Escolar – Garante a disciplina dos alunos nos intervalos e corredores.
2. Corpo Docente
Professor(a) – Ensina as disciplinas regulares.
Professor(a) de Educação Especial – Dá suporte a alunos com necessidades especiais.
Monitor(a) / Auxiliar de Classe – Auxilia os professores em atividades específicas.
3. Apoio Operacional
Porteiro(a) – Controla a entrada e saída de alunos e visitantes.
Zelador(a) / Auxiliar de Limpeza – Mantém a escola limpa e organizada.
Merendeiro(a) – Prepara e serve a alimentação dos alunos.
Auxiliar de Manutenção – Faz reparos na estrutura da escola.
4. Tecnologia e Comunicação
Técnico de TI – Dá suporte técnico para computadores e internet.
Designer Gráfico / Marketing – Cuida da identidade visual e redes sociais da escola.
5. Serviços Extras
Psicólogo(a) Escolar – Ajuda no desenvolvimento emocional dos alunos.
Assistente Social – Atua em questões socioeconômicas dos estudantes.
Fonoaudiólogo(a) – Ajuda alunos com dificuldades na fala e audição.


// Exibe os dados validados
    var_dump($validated);
    die(); // Isso vai interromper a execução para você ver os resulta


Solução para o xampp
https://www.youtube.com/watch?v=DJRAqfGHgps


