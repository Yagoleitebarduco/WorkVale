<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Company;
use App\Models\ActivityArea;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $city = City::where('city', 'Registro')->first();

        $activityArea = ActivityArea::first();

        $companies = [

            [
                'company_name' => 'Tech Solutions',
                'description' => 'Empresa focada em sistemas web.',
                'cpf_cnpj' => '12345678000101',
                'representative_name' => 'João Pedro',
                'email' => 'contato@techsolutions.com',
                'phone_number' => '13988888881',
                'address' => 'Rua Tecnologia',
                'neighborhood' => 'Centro',
                'number' => '100',
                'cep' => '11900010',
                'assessment' => 'Empresa inovadora.',
            ],

            [
                'company_name' => 'Design Pro',
                'description' => 'Agência de design e branding.',
                'cpf_cnpj' => '12345678000102',
                'representative_name' => 'Ana Clara',
                'email' => 'contato@designpro.com',
                'phone_number' => '13988888882',
                'address' => 'Rua Design',
                'neighborhood' => 'Vila Nova',
                'number' => '220',
                'cep' => '11900011',
                'assessment' => 'Especialistas em UX/UI.',
            ],

            [
                'company_name' => 'Marketing Max',
                'description' => 'Empresa especializada em marketing digital.',
                'cpf_cnpj' => '12345678000103',
                'representative_name' => 'Lucas Lima',
                'email' => 'contato@marketingmax.com',
                'phone_number' => '13988888883',
                'address' => 'Rua Marketing',
                'neighborhood' => 'Centro',
                'number' => '310',
                'cep' => '11900012',
                'assessment' => 'Foco em crescimento digital.',
            ],

        ];

        foreach ($companies as $company) {

            Company::updateOrCreate(
                [
                    'email' => $company['email'],
                ],
                [
                    ...$company,

                    'activityArea_id' => $activityArea->id,

                    'city_id' => $city->id,

                    'is_admin' => false,

                    'password' => Hash::make('12345678'),

                    'email_verified_at' => now(),
                ]
            );
        }
    }
}
