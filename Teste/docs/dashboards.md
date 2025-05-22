- [VOLTAR](documentatian.md)
# CRIAÇÃO DE DASHBOARDS DIFERENTES PARA CADA USUÁRIO.

## 1. Criar o Controlador de Dashboard.
* Primeiro, você precisa de um controlador para gerenciar as diferentes views de dashboard. Vamos criar o controlador DashboardController para lidar com isso.

### 1.1 Criar o Controlador.
* Use o comando artisan para criar o controlador:
* Rodar no Terminal:
```sh
php artisan make:controller DashboardController
```

## 2. Definir a Lógica no Controlador.
* Agora, vamos definir os métodos dentro desse controlador para redirecionar para diferentes dashboards de acordo com o role do usuário. Vamos usar o role para verificar qual view o usuário deve ver.

### 2.1 Atualizar o DashboardController.php.
* Dentro do controlador DashboardController, adicione a lógica de redirecionamento para os diferentes dashboards baseados nos roles:
```sh
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');  // Garantir que o usuário esteja autenticado
    }

    public function index()
    {
        // Pega o usuário autenticado
        $user = Auth::user();

        // Lógica para redirecionar conforme o papel (role)
        if ($user->role == 'admin') {
            return view('dashboard.admin'); // Redireciona para o dashboard do admin
        } elseif ($user->role == 'editor') {
            return view('dashboard.editor'); // Redireciona para o dashboard do editor
        } else {
            return view('dashboard.user'); // Redireciona para o dashboard do usuário comum
        }
    }
}

```




### 1.1 Adminstrador master.
### 1.2 Aluno.
### 1.3 Resosáveis.
### 1.4 Professores.
### 1.5 Cordenadores master.

- [VOLTAR](documentatian.md)