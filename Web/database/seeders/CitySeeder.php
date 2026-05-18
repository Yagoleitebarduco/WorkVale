<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            ['city' => 'Apiaí', 'uf' => 'SP'],
            ['city' => 'Barra do Chapéu', 'uf' => 'SP'],
            ['city' => 'Barra do Turvo', 'uf' => 'SP'],
            ['city' => 'Cajati', 'uf' => 'SP'],
            ['city' => 'Cananéia', 'uf' => 'SP'],
            ['city' => 'Eldorado', 'uf' => 'SP'],
            ['city' => 'Iguape', 'uf' => 'SP'],
            ['city' => 'Ilha Comprida', 'uf' => 'SP'],
            ['city' => 'Iporanga', 'uf' => 'SP'],
            ['city' => 'Itaóca', 'uf' => 'SP'],
            ['city' => 'Itapirapuã Paulista', 'uf' => 'SP'],
            ['city' => 'Itariri', 'uf' => 'SP'],
            ['city' => 'Jacupiranga', 'uf' => 'SP'],
            ['city' => 'Juquiá', 'uf' => 'SP'],
            ['city' => 'Juquitiba', 'uf' => 'SP'],
            ['city' => 'Miracatu', 'uf' => 'SP'],
            ['city' => 'Pariquera-Açu', 'uf' => 'SP'],
            ['city' => 'Pedro de Toledo', 'uf' => 'SP'],
            ['city' => 'Registro', 'uf' => 'SP'],
            ['city' => 'Ribeira', 'uf' => 'SP'],
            ['city' => 'São Lourenço da Serra', 'uf' => 'SP'],
            ['city' => 'Sete Barras', 'uf' => 'SP'],
            ['city' => 'Tapiraí', 'uf' => 'SP'],
        ];

        foreach ($cities as $city) {
            City::updateOrCreate(
                [
                    'city' => $city['city'],
                    'uf' => $city['uf']
                ],
                $city
            );
        }
    }
}