- [VOLTAR](documentatian.md)
# Alterações no Banco de Dados.
## Adicionando campo em uma tabela.
No Laravel, você pode adicionar um novo campo a uma tabela existente usando migrações. Aqui está o passo a passo:

- 1.0 Criar uma nova migração
* Rodar no Terminal:
```sh
php artisan make:migration add_endereco_to_clientes_table --table=clientes
```
Detalhes: add_endereco_to_clientes_table --table=clientes = adicione o campo endereco a tabela clientes -- tabela=clientes.

- 1.1 Editar a migração:
- Abra a migration criada e edite.
```sh
public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->string('telefone')  // Tipo do campo (string, integer, boolean, etc.)
              ->nullable()         // Permite valores nulos (opcional)
              ->after('email');    // Posiciona o campo após a coluna "email" (opcional)
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('telefone'); // Remove o campo se fizer rollback
    });
}
```
- 1.2 Executar a Migração
* Rodar no Terminal:
```sh
php artisan migrate
```
- 2.0 Atualizar o Model (Opcional)

Se o campo for ser usado em massa (ex: User::create()), adicione-o ao $fillable no Model:
```sh
// app/Models/User.php
protected $fillable = [
    'name', 'email', 'telefone' // Adicione o novo campo aqui
];
```
 - 3.0 Rollback (Se Necessário)

 Se precisar desfazer:
```sh
php artisan migrate:rollback --step=1
```

### Tipos de Campos Comuns
- string('nome') → Para textos curtos (VARCHAR)

- text('descricao') → Para textos longos (TEXT)

- integer('idade') → Números inteiros

- boolean('ativo') → Verdadeiro/Falso (salvo como 0 ou 1)

- date('nascimento') → Data (YYYY-MM-DD)

- decimal('preco', 8, 2) → Números decimais (8 dígitos no total, 2 após a vírgula)

## Remover um Campo de uma Tabela.

Para apagar um campo de uma tabela existente no Laravel, você deve seguir estes passos:

- 1.0 Criar uma Migração de Remoção
* Rodar no Terminal:
```sh
php artisan make:migration remove_telefone_from_users_table --table=users
```
Detalhes: remove_telefone_from_users_table --table=users = remova o campo telefone da tabela users -- tabela=users.

- 1.1 Editar a migração:
- Abra a migration criada e edite.
```sh
public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('telefone');
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->string('telefone')->nullable();
    });
}
```
- 1.2 Executar a Migração
* Rodar no Terminal:
```sh
php artisan migrate
```
- 1.3 Detalhes Importantes

Para múltiplos campos:
* Rodar no Terminal:
```sh
$table->dropColumn(['telefone', 'endereco', 'outro_campo']);
```
- 2.0 Atualize o Model

Remova o campo do array $fillable ou $casts se existir:
* Rodar no Terminal:
```sh
// app/Models/User.php
protected $fillable = [
    'name', 'email' // Remova o campo 'telefone'
];
```
Lembre-se que após remover o campo do banco, você deve também:

- Atualizar todas as referências no código

- Atualizar validações em Form Requests

- Atualizar views que usavam o campo

- Atualizar testes unitários




















- [VOLTAR](documentatian.md)