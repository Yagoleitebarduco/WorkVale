<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skills = [
            // Desenvolvimento Web
            ['skill' => 'Full Stack Development', 'category' => 'Desenvolvimento Web'],
            ['skill' => 'Front-End Development', 'category' => 'Desenvolvimento Web'],
            ['skill' => 'Back-End Development', 'category' => 'Desenvolvimento Web'],
            ['skill' => 'Mobile App Development', 'category' => 'Desenvolvimento Web'],
            ['skill' => 'API Development & Integration', 'category' => 'Desenvolvimento Web'],
            ['skill' => 'CMS Development (WordPress)', 'category' => 'Desenvolvimento Web'],
            ['skill' => 'Ecommerce Website Development', 'category' => 'Desenvolvimento Web'],
            ['skill' => 'Scripting & Automation', 'category' => 'Desenvolvimento Web'],
            ['skill' => 'Manual Testing', 'category' => 'Desenvolvimento Web'],
            ['skill' => 'Firmware Development', 'category' => 'Desenvolvimento Web'],

            // Dados e Inteligência Artificial
            ['skill' => 'AI Integration', 'category' => 'Dados & IA'],
            ['skill' => 'AI Chatbot Development', 'category' => 'Dados & IA'],
            ['skill' => 'AI Video Generation & Editing', 'category' => 'Dados & IA'],
            ['skill' => 'AI Image Generation & Editing', 'category' => 'Dados & IA'],
            ['skill' => 'AI Data Annotation & Labeling', 'category' => 'Dados & IA'],
            ['skill' => 'Machine Learning', 'category' => 'Dados & IA'],
            ['skill' => 'Deep Learning', 'category' => 'Dados & IA'],
            ['skill' => 'Generative AI Modeling', 'category' => 'Dados & IA'],
            ['skill' => 'Prompt Engineering', 'category' => 'Dados & IA'],
            ['skill' => 'Data Analytics', 'category' => 'Dados & IA'],
            ['skill' => 'Data Visualization', 'category' => 'Dados & IA'],
            ['skill' => 'Data Engineering', 'category' => 'Dados & IA'],
            ['skill' => 'Knowledge Representation', 'category' => 'Dados & IA'],

            // Design e Criativo
            ['skill' => 'Graphic Design', 'category' => 'Design & Criativo'],
            ['skill' => 'UI/UX Design', 'category' => 'Design & Criativo'],
            ['skill' => 'Logo Design', 'category' => 'Design & Criativo'],
            ['skill' => 'Brand Identity Design', 'category' => 'Design & Criativo'],
            ['skill' => 'Video Editing', 'category' => 'Design & Criativo'],
            ['skill' => 'Video Production', 'category' => 'Design & Criativo'],
            ['skill' => '3D Animation', 'category' => 'Design & Criativo'],
            ['skill' => 'Illustration', 'category' => 'Design & Criativo'],
            ['skill' => 'Image Editing', 'category' => 'Design & Criativo'],
            ['skill' => 'Presentation Design', 'category' => 'Design & Criativo'],
            ['skill' => 'Product & Industrial Design', 'category' => 'Design & Criativo'],

            // Marketing e Vendas
            ['skill' => 'Social Media Marketing', 'category' => 'Marketing & Vendas'],
            ['skill' => 'Social Media Strategy', 'category' => 'Marketing & Vendas'],
            ['skill' => 'SEO (Search Engine Optimization)', 'category' => 'Marketing & Vendas'],
            ['skill' => 'Email Marketing', 'category' => 'Marketing & Vendas'],
            ['skill' => 'Marketing Strategy', 'category' => 'Marketing & Vendas'],
            ['skill' => 'Marketing Automation', 'category' => 'Marketing & Vendas'],
            ['skill' => 'Lead Generation', 'category' => 'Marketing & Vendas'],
            ['skill' => 'Sales & Business Development', 'category' => 'Marketing & Vendas'],
            ['skill' => 'Campaign Management', 'category' => 'Marketing & Vendas'],
            ['skill' => 'Display Advertising', 'category' => 'Marketing & Vendas'],
            ['skill' => 'Brand Strategy', 'category' => 'Marketing & Vendas'],
            ['skill' => 'Copywriting & Content Creation', 'category' => 'Marketing & Vendas'],

            // Administração e Suporte
            ['skill' => 'General Virtual Assistance', 'category' => 'Administração & Suporte'],
            ['skill' => 'Executive Virtual Assistance', 'category' => 'Administração & Suporte'],
            ['skill' => 'Data Entry', 'category' => 'Administração & Suporte'],
            ['skill' => 'Digital Project Management', 'category' => 'Administração & Suporte'],
            ['skill' => 'Ecommerce Management', 'category' => 'Administração & Suporte'],
            ['skill' => 'Market Research', 'category' => 'Administração & Suporte'],
            ['skill' => 'General Research Services', 'category' => 'Administração & Suporte'],
            ['skill' => 'Medical Virtual Assistance', 'category' => 'Administração & Suporte'],
            ['skill' => 'Supply Chain & Logistics Management', 'category' => 'Administração & Suporte'],
            ['skill' => 'Manual Transcription', 'category' => 'Administração & Suporte'],
        ];

        foreach ($skills as $skill) {
            DB::table('skills')->insert([
                'skill' => $skill['skill'],
                'category' => $skill['category'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
