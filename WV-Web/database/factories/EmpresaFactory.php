<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empresa>
 */
class EmpresaFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tipoDocumento = fake()->randomElement(['cnpj', 'cpf']);
        
        return [
            'razao_social' => fake()->company(),
            'nome_fantasia' => fake()->company(),
            'cnpj_cpf' => $tipoDocumento === 'cnpj' 
                ? fake()->numerify('##.###.###/####-##') 
                : fake()->numerify('###.###.###-##'),
            'area_atuacao' => fake()->randomElement([
                'Tecnologia',
                'Saúde',
                'Educação',
                'Varejo',
                'Serviços',
                'Indústria',
                'Comércio',
                'Consultoria',
            ]),
            'nome_responsavel' => fake()->name(),
            'email_corporativo' => fake()->unique()->companyEmail(),
            'telefone_contato' => fake()->numerify('(##) #####-####'),
            'cidade_sede' => fake()->city(),
            'cep' => fake()->numerify('#####-###'),
            'logradouro' => fake()->streetAddress(),
            'numero' => fake()->buildingNumber(),
            'complemento' => fake()->optional()->secondaryAddress(),
            'bairro' => fake()->word(),
            'estado' => fake()->randomElement(['SP', 'RJ', 'MG', 'RS', 'PR']),
            'endereco_completo' => fake()->address(),
            'pequena_descricao' => fake()->optional()->paragraph(3),
            'senha' => static::$password ??= Hash::make('password'),
            'ativo' => true,
            'email_verified_at' => now(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    /**
     * Indicate that the model is inactive.
     */
    public function inativa(): static
    {
        return $this->state(fn (array $attributes) => [
            'ativo' => false,
        ]);
    }
}