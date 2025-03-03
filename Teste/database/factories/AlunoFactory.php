<?php

namespace Database\Factories;

use App\Models\Aluno;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlunoFactory extends Factory
{
    protected $model = Aluno::class;

    /**
     * Defina o estado padrão da fábrica.
     *
     * @return array
     */
    public function definition()
    {
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

'foto_responsavel' => $this->faker->imageUrl(),
'parentesco' => $this->faker->randomElement(['mãe', 'pai', 'avô', 'avó', 'tio', 'tia']),
'nome_completo_responsavel' => $this->faker->name(),
'data_de_nascimento_responsavel' => $this->faker->date(),
'idade_responsavel' => $this->faker->numberBetween(30, 60),
'sexo_responsavel' => $this->faker->randomElement(['masculino', 'feminino']),
'cpf_responsavel' => $this->faker->regexify('[0-9]{3}\.[0-9]{3}\.[0-9]{3}-[0-9]{2}'),
'rg_responsavel' => $this->faker->regexify('[0-9]{2}\.[0-9]{3}\.[0-9]{3}-[0-9]{1}'),
'naturalidade_responsavel' => $this->faker->city(),
'nacionalidade_responsavel' => $this->faker->country(),
'celular_responsavel' => $this->faker->regexify('\([1-9]{2}\) [2-9][0-9]{3}-[0-9]{4}'),
'cep_responsavel' => $this->faker->postcode(),
'rua_responsavel' => $this->faker->streetName(),
'numero_responsavel' => $this->faker->numberBetween(1, 100),
'bairro_responsavel' => $this->faker->word(),
'cidade_responsavel' => $this->faker->city(),
'estado_responsavel' => $this->faker->state(),

'ano_letivo' => $this->faker->year(),
'turno' => $this->faker->randomElement(['matutino', 'vespertino', 'noturno']),
'status_da_matricula' => $this->faker->randomElement(['ativo', 'inativo', 'transferido']),
'data_de_ingresso' => $this->faker->date(),

        ];
    }
}