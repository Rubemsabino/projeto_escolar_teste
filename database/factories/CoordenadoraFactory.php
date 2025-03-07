<?php

namespace Database\Factories;
use App\Models\Coordenadora;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coordenadora>
 */
class CoordenadoraFactory extends Factory
{
    protected $model = Coordenadora::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'foto' => $this->faker->imageUrl(),
            'nome' => $this->faker->name(),
            'data_de_nascimento' => $this->faker->date(),
            'idade' => $this->faker->numberBetween(18, 60),
            'sexo' => $this->faker->randomElement(['masculino', 'feminino', 'outros']),
            'cpf' => $this->faker->regexify('[0-9]{3}\.[0-9]{3}\.[0-9]{3}-[0-9]{2}'),

            'rg' => $this->faker->regexify('[0-9]{2}\.[0-9]{3}\.[0-9]{3}-[0-9]{1}'),
            'naturalidade' => $this->faker->city(),
            'nacionalidade' => $this->faker->country(),
            'celular' => $this->faker->regexify('\([1-9]{2}\) [2-9][0-9]{3}-[0-9]{4}'),

            'cep' => $this->faker->postcode(),
            'rua' => $this->faker->streetName(),
            'numero' => $this->faker->numberBetween(1, 100),
            'bairro' => $this->faker->word(),
            'cidade' => $this->faker->city(),
            'estado' => $this->faker->state(),

            'formacao_graduacao' => $this->faker->randomElement(['Bacharelado', 'Licenciatura', 'Tecnólogo', 'Mestrado', 'Doutorado']),
            'turno_que_trabalha' => $this->faker->randomElement(['Manhã', 'Tarde', 'Noite']),
            'data_de_admissao' => $this->faker->date(),
            'vinculo_empregaticio' => $this->faker->randomElement(['CLT', 'PJ']),
        ];
    }
}