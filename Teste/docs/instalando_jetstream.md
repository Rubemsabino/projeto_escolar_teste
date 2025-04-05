- [VOLTAR](documentatian.md)
# Laravel Jetstream (Mais completo)
Se precisar de funcionalidades mais avançadas, como autenticação de duas etapas (2FA), gerenciamento de sessão e API com tokens, use o Jetstream.

### Criando a parte de login por completo.

1.1 Instalação:
* Rodar no Terminal:
```sh
composer require laravel/jetstream
```
1.2 Instalação:
* Rodar no Terminal:
```sh
php artisan jetstream:install livewire
```
1.3 Irar pedir para executar as migratio:
```sh
 New database migrations were added. Would you like to re-run your migrations? (yes/no) [você dogita (no)]
```
1.4 Abra o PowerShell como Administrador:
Clique com o botão direito no ícone do PowerShell e selecione "Executar como administrador".

2.Definir a política de execução: Execute o seguinte comando para definir a política de execução como RemoteSigned para o escopo de CurrentUser (apenas para o seu usuário): Obs, dentro do PowerShell.
```sh
Set-ExecutionPolicy RemoteSigned -Scope CurrentUser
```
Obs: Irar pedir para executar as migratio: New database migrations were added. Would you like to re-run your migrations? (yes/no) [você dogita (no)]

3.Confirmar a alteração: Quando solicitado, digite (Y) ou com (A) para confirmar.

4.Verifique se a política foi alterada: Após executar o comando, execute novamente: Obs, dentro do PowerShell.
```sh
Get-ExecutionPolicy -List
```
4.1 Agora, para o escopo CurrentUser, a saída esperada será algo como:
```sh
Scope ExecutionPolicy
        ----- ---------------
MachinePolicy       Undefined
   UserPolicy       Undefined
      Process       Undefined
  CurrentUser    RemoteSigned <------------
 LocalMachine       Undefined
```
5.Feche o PowerShell e abra o terminal novamente no VSCode ou no PowerShell

6.Veja se você está no diretório certo e execute o comando npm install novamente: Agora, vá até o seu terminal (dentro do terminal integrado do VSCode) e execute novamente:
```sh
npm install
```


7.No vscode execute:
```sh
npm run dev
```
8.Abra outro terminal e Rode as migration:
```sh
php artisan migrate
```

Oferece suporte para Livewire ou Inertia.js.

Inclui recursos como verificação de email, exclusão de conta e gerenciamento de perfil.

9.Agora Rode no Terminal, terá que aparecer a tela para registrar o usuário: 
```sh
php artisan serve
```

- [VOLTAR](documentatian.md)