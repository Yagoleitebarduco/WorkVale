<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            // São Paulo
            ['city' => 'Registro', 'uf' => 'SP'],
            ['city' => 'Pariquera-Açu', 'uf' => 'SP'],
            ['city' => 'Jacupiranga', 'uf' => 'SP'],
            ['city' => 'Cajati', 'uf' => 'SP'],
            ['city' => 'Cananéia', 'uf' => 'SP'],
            ['city' => 'Iguape', 'uf' => 'SP'],
            ['city' => 'Ilha Comprida', 'uf' => 'SP'],
            ['city' => 'Juquiá', 'uf' => 'SP'],
            ['city' => 'Miracatu', 'uf' => 'SP'],
            ['city' => 'Pedro de Toledo', 'uf' => 'SP'],
            ['city' => 'Sete Barras', 'uf' => 'SP'],
            ['city' => 'Eldorado', 'uf' => 'SP'],
            ['city' => 'Barra do Turvo', 'uf' => 'SP'],

            // Paraná
            ['city' => 'Adrianópolis', 'uf' => 'PR'],
            ['city' => 'Bocaiúva do Sul', 'uf' => 'PR'],
            ['city' => 'Cerro Azul', 'uf' => 'PR'],
            ['city' => 'Doutor Ulysses', 'uf' => 'PR'],
            ['city' => 'Tunas do Paraná', 'uf' => 'PR'],
        ];

        foreach ($cities as $city) {
            DB::table('cities')->insert([
                'city' => $city['city'],
                'uf' => $city['uf'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
