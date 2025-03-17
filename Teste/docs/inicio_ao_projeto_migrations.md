- [VOLTAR](documentatian.md)
# DANDO INICIO AO PROJETO OU SEJA, DEPOIS DAS CONFIGURAÇÕES ANTERIORES...

Obs: Se for criar alguma migration que irar ter relacionamento com outra tabela, está outra terá que já existir.

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
- [VOLTAR](documentatian.md)