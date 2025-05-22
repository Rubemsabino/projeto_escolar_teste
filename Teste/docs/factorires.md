- [VOLTAR](documentatian.md)

# Trabalhando a factories criada.
Abra: database/factories/ e a factories que você criou.

4.1 Pegue os campos da migrations, abra o gpt e peça para criar com base nestes scripts, um arquivo factories.

4.2 Abrindo a factories criada, logo abaixo no nomespace importe a: use App\Models\Professor;

4.3 Atualize a factories, logo abaixo da { da: class CoordenadoraFactory extends Factory, importe o:  protected $model = 4.4 Professor::class;

4.4 Atualize a factories com o que gpt criou, ficando assim como o exemplo:
```sh
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
```
- [VOLTAR](documentatian.md)