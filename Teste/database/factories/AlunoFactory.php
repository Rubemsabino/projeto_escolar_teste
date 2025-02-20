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
            'nome_completo' => $this->faker->name(),
            'data_de_nascimento' => $this->faker->date(),
            'idade' => $this->faker->numberBetween(18, 60),
            'sexo' => $this->faker->randomElement(['masculino', 'feminino', 'outro']),
            'cpf' => $this->faker->regexify('[0-9]{3}\.[0-9]{3}\.[0-9]{3}-[0-9]{2}'),
            'rg' => $this->faker->regexify('[0-9]{2}\.[0-9]{3}\.[0-9]{3}-[0-9]{1}'),
            'certidao_de_nascimento' => $this->faker->uuid(),
            'celular' => $this->faker->phoneNumber(),
            'cep' => $this->faker->postcode(),
            'endereco_rua' => $this->faker->streetName(),
            'endereco_numero' => $this->faker->numberBetween(1, 100),
            'endereco_bairro' => $this->faker->word(),
            'endereco_cidade' => $this->faker->city(),
            'endereco_estado' => $this->faker->state(),
            'foto_responsavel' => $this->faker->imageUrl(),
            'nome_do_responsavel_principal' => $this->faker->name(),
            'data_de_nascimento_responsavel' => $this->faker->date(),
            'idade_responsavel' => $this->faker->numberBetween(30, 60),
            'sexo_responsavel' => $this->faker->randomElement(['masculino', 'feminino']),
            'cpf_responsavel' => $this->faker->regexify('[0-9]{3}\.[0-9]{3}\.[0-9]{3}-[0-9]{2}'),
            'rg_responsavel' => $this->faker->regexify('[0-9]{2}\.[0-9]{3}\.[0-9]{3}-[0-9]{1}'),
            'celular_responsavel' => $this->faker->phoneNumber(),
            'parentesco' => $this->faker->randomElement(['mãe', 'pai', 'avô', 'avó', 'tio', 'tia']),
            'cep_responsavel' => $this->faker->postcode(),
            'endereco_rua_responsavel' => $this->faker->streetName(),
            'endereco_numero_responsavel' => $this->faker->numberBetween(1, 100),
            'endereco_bairro_responsavel' => $this->faker->word(),
            'endereco_cidade_responsavel' => $this->faker->city(),
            'endereco_estado_responsavel' => $this->faker->state(),
            'ano_letivo' => $this->faker->year(),
            'turno' => $this->faker->randomElement(['matutino', 'vespertino', 'noturno']),
            'status_da_matricula' => $this->faker->randomElement(['ativa', 'inativa', 'trancada']),
            'data_de_ingresso' => $this->faker->date(),
            'hora_de_ingresso' => $this->faker->time(),
            'parte_do_dia' => $this->faker->randomElement(['manhã', 'tarde', 'noite']),
            'necessidades_especiais' => $this->faker->word(),
            'tipo_sanguineo' => $this->faker->randomElement(['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-']),
            'fator_rh' => $this->faker->randomElement(['positivo', 'negativo']),
            'observacoes' => $this->faker->sentence(),
        ];
    }
}
