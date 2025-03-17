- [VOLTAR](documentatian.md)
# Laravel Jetstream (Mais completo)
Se precisar de funcionalidades mais avançadas, como autenticação de duas etapas (2FA), gerenciamento de sessão e API com tokens, use o Jetstream.

Instalação:
* Rodar no Terminal:
```sh
composer require laravel/jetstream
php artisan jetstream:install livewire
npm install && npm run dev
php artisan migrate
```
Oferece suporte para Livewire ou Inertia.js.

Inclui recursos como verificação de email, exclusão de conta e gerenciamento de perfil.

# Controle de Acesso (Roles e Permissões)
Como você está usando um relacionamento muitos-para-muitos entre usuários e papéis, recomendo o pacote spatie/laravel-permission.

Instalação:
* Rodar no Terminal:
```sh
composer require spatie/laravel-permission
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
php artisan migrate
```
No Modelo User:
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
}
Atribuir um Papel:
$user->assignRole('admin');

Verificar Permissão:
if ($user->hasRole('admin')) {
    // é um administrador
}

Próximos Passos

Personalizar Views: Com Blade, edite os arquivos em resources/views.

Middleware de Autorização: Use ->middleware('role:admin') nas rotas.

Policies: Para regras de autorização personalizadas.




- [VOLTAR](documentatian.md)