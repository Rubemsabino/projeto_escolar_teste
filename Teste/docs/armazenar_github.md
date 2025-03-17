- [VOLTAR](documentatian.md)
# ARMAZENAR O PROJETO LARAVEL NO GITHUB
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

# AUTEREI ALGUMA COISA NO PROJETO, IREI SUBIR
Rodar no terminal: 

```sh
git pull origin main

git add .
git commit -m "Alter aqui"
git push origin main
```


Explicação:
git pull origin main → Puxa as últimas mudanças do repositório remoto.
git add . → Adiciona todas as mudanças ao commit.
git commit -m "Descrição das alterações" → Cria um commit com a mensagem especificada.
git push origin main → Envia as mudanças para o GitHub.
- [VOLTAR](documentatian.md)