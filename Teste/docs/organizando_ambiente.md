- [VOLTAR](documentatian.md)
# ORGANIZANDO O AMBIENTE PARA A CRIAÇÃO.
1.1 Na unidade C: crie uma pasta para armazenar o seu sistema. Ex: projeto_escolar_teste. vá em:

```sh
C/xmpp/htdocs/crie a pasta.
```
1.2 No Vscode vá em:
```sh
File Open folder. Abra a unidade C/xmpp/htdocs.	E selecione a pasta que foi criada, no caso: projeto_escolar_teste.
```


1.3 Criar o Projeto Laravel, abra o terminal indo em .../Terminal/New Terminal ou  Ctrl+Shift+'. Rodar no terminal: Obs: (reforco) é no meu caso, o nome do projeto.
```sh
composer create-project laravel/laravel reforco "11.*"
```
1.4 Copie a basta docs do seu ultimo projeto criado, e cole dentro desta pasta que cotém o novo projeto para que sirva de guia.


1.5 Abra o projeto criado, vá em:
```sh
File/Open Folder.../ escolha a pasta e abra.
```
Obs: (reforco é no meu caso, o nome da pasta do projeto).

1.6 Vendo se instalou tudo certinho. Rodar no terminal:
```sh
php artisan serve
```
Obs: (Tem que abrir na internet, a página do Laravel com endereço: http://127.0.0.1:8000/).

1.7 Abra o XAMPP, e inicie o Apache e com um tempo depois o MySQL..

1.8 No Vscode, abra o arquivo .env e configure a conexão com o banco, NÃO se esqueça de salva:
```sh
DB_CONNECTION=mysql 		  /ATENÇÃO: olhe se aqui o tipo de banco de dados em relação ao nome
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=projeto_escolar_teste /ATENÇÃO: mude este nome para o nome do Banco de Dados que você irar criar, tire os (#) são cometarios
DB_USERNAME=root
DB_PASSWORD=.
```

1.9 Planejar o banco de dados, Abra o XAMPP e click na parte do MySQL em:
```sh
Admin e crie o banco de dados no phpMyAdmin.
```
 
2.0 No phpMyAdmin vá em:
```sh
Novo.
Digite o nome do BD.
click em Criar.
```
- [VOLTAR](documentatian.md)