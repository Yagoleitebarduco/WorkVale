<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('freelancers', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_admin')->default(false);

            // Informações Pessoais
            $table->string('complete_name');
            $table->integer('cpf')->unique();
            $table->date('birth_date');

            // Contato
            $table->string('email')->unique();
            $table->integer('phone_number')->unique();

            // Localização
            $table->string('city');
            $table->string('district');

            // Perfil Profissional
            $table->string('profression_title')->nullable();
            $table->string('skills')->nullable(); // Foreign key para uma tabela de habilidades, se necessário
            $table->string('portfolio_link')->nullable();
            $table->text('bio')->nullable();

            // Segurança
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
