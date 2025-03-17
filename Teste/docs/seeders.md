- [VOLTAR](documentatian.md)
# Trabalhando a seeders criada.  (se necessário).
	
5.1 No arquivo seeder criado, importar a model em questão Ex: Use App\Models\Aluno;
Abra: database/seeder/ e a seeder que você crio

5.2 No método rum fazer assim mudando nome Aluno para outro em questão Ex: Aluno::factory(100)->create();

5.3 No arquivo DatabaseSeeder.php, faça uma definição no método rum, fazer assim mudando nome Aluno para outro em questão Ex: $this->call(AlunoSeeder::class);

Terminal:
	php artisan db:seed (popular todas as tabelas do banco)

	php artisan db:seed --class=ProfessorSeeder (popular só a tabela de ProfessoresSeeder no caso)
	php artisan db:seed --class=AlunoSeeder
_____________
- [VOLTAR](documentatian.md)