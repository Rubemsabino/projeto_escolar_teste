- [VOLTAR](documentatian.md)

# Trabalhando a models criada.

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


- [VOLTAR](documentatian.md)