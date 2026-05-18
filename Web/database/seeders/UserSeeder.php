<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $city = City::where('city', 'Registro')->first();

        $users = [

            [
                'complete_name' => 'Yago Leite',
                'cpf' => '12345678901',
                'email' => 'yago@workvale.com',
                'phone_number' => '13999999991',
                'birth_date' => '2000-05-10',
                'address' => 'Rua Projetada A',
                'neighborhood' => 'Centro',
                'number' => '120',
                'cep' => '11900000',
                'professional_title' => 'Desenvolvedor Full Stack',
                'portifolio_link' => 'https://portfolio-yago.com',
                'bio' => 'Especialista em Laravel, Vue.js e APIs REST.',
            ],

            [
                'complete_name' => 'Maria Silva',
                'cpf' => '12345678902',
                'email' => 'maria@workvale.com',
                'phone_number' => '13999999992',
                'birth_date' => '1998-08-20',
                'address' => 'Rua B',
                'neighborhood' => 'Vila Nova',
                'number' => '45',
                'cep' => '11900001',
                'professional_title' => 'UX/UI Designer',
                'portifolio_link' => 'https://maria-design.com',
                'bio' => 'Designer focada em experiência do usuário.',
            ],

            [
                'complete_name' => 'Carlos Souza',
                'cpf' => '12345678903',
                'email' => 'carlos@workvale.com',
                'phone_number' => '13999999993',
                'birth_date' => '1995-03-15',
                'address' => 'Rua C',
                'neighborhood' => 'Centro',
                'number' => '80',
                'cep' => '11900002',
                'professional_title' => 'Front-end Developer',
                'portifolio_link' => 'https://carlos-dev.com',
                'bio' => 'Especialista em React e TypeScript.',
            ],

        ];

        foreach ($users as $user) {

            User::updateOrCreate(
                [
                    'email' => $user['email'],
                ],
                [
                    ...$user,

                    'city_id' => $city->id,

                    'profile_picture' => null,

                    'is_admin' => false,

                    'password' => Hash::make('12345678'),

                    'email_verified_at' => now(),
                ]
            );
        }
    }
}