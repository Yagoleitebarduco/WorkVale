<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeed extends Seeder
{
    protected array $cities = [
        'SP' => [
            'Registro',
            'Pariquera-Açu',
            'Jacupiranga',
            'Cajati',
            'Cananéia',
            'Iguape',
            'Ilha Comprida',
            'Juquiá',
            'Miracatu',
            'Pedro de Toledo',
            'Sete Barras',
            'Eldorado',
            'Barra do Turvo'
        ],

        'PR' => [
            'Adrianópolis',
            'Bocaiúva do Sul',
            'Cerro Azul',
            'Doutor Ulysses',
            'Tunas do Paraná'
        ]
    ];

    public function run(): void
    {
        // Opcional: Limpa a tabela antes de inserir
        // Schema::disableForeignKeyConstraints();
        // DB::table('cities')->truncate();
        // Schema::enableForeignKeyConstraints();

        foreach ($this->cities as $state => $cityNames) {
            foreach ($cityNames as $cityName) {
                DB::table('cities')->insert([
                    'name_city' => $cityName,
                    'state' => $state,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        $total = count($this->cities['SP']) + count($this->cities['PR']);
        $this->command->info("✅ $total cidades do Vale do Ribeira foram cadastradas com sucesso!");
    }
}
