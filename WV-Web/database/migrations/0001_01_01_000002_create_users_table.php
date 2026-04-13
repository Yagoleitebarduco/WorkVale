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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_admin')->default(false);
            $table->boolean('is_freelancer')->default(true);
            
            // Dados Pessoais ou de Empressas
            $table->string('profile_picture')->nullable();
            $table->string('social_reason')->nullable(); // Para empresas
            $table->string('name');
            $table->integer('cnpj_cpf')->unique();
            $table->date('birth_date');

            // Contato
            $table->string('email')->unique();
            $table->integer('phone_number')->unique();

            // Localização
            $table->foreignId('city_id')->constrained()->onDelete('cascade');
            $table->string('address');

            // Perfil Profissional
            $table->string('professional_title');
            // Pesar em forma de criar
            // $table->foreign('skils_id')->constrained('skils')->onDelete('cascade');
            $table->string('portfolio_link')->nullable();
            $table->text('bio')->nullable();

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
