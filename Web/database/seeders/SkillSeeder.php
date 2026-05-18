<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Busca categoria do tipo skill
        $category = Category::where(
            'type_category',
            'skill'
        )->first();

        $skills = [

            // Programação
            'PHP',
            'Laravel',
            'JavaScript',
            'TypeScript',
            'Vue.js',
            'React',
            'Node.js',
            'MySQL',
            'PostgreSQL',
            'API REST',

            // Design
            'Figma',
            'Photoshop',
            'Illustrator',
            'UI Design',
            'UX Design',

            // Marketing
            'SEO',
            'Google Ads',
            'Facebook Ads',
            'Copywriting',
            'Social Media',

            // Infraestrutura
            'Docker',
            'Linux',
            'Git',
            'GitHub',
            'AWS',
        ];

        foreach ($skills as $skill) {

            Skill::updateOrCreate(
                [
                    'skill' => $skill,
                ],
                [
                    'skill' => $skill,
                    'category_id' => $category->id,
                ]
            );
        }
    }
}
