<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ActivityArea;

class AreasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $activityAreas = [
            [
                'name' => 'Desenvolvimento Web',
                'category_id' => 3,
            ],
            [
                'name' => 'Marketing Digital',
                'category_id' => 3,
            ],
            [
                'name' => 'Design UX/UI',
                'category_id' => 3,
            ],
        ];

        foreach ($activityAreas as $activityArea) {
            ActivityArea::create($activityArea);
        }
    }
}