<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Programação',
                'type_category' => 'skill',
            ],
            [
                'name' => 'Design',
                'type_category' => 'skill',
            ],
            [
                'name' => 'Marketing',
                'type_category' => 'activity_area',
            ],
            [
                'name' => 'Tecnologia',
                'type_category' => 'activity_area',
            ],
            [
                'name' => 'UX/UI',
                'type_category' => 'skill',
            ],
        ]);
    }
}
