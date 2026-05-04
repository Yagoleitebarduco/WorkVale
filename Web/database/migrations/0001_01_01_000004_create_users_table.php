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

            // Dados Pessoais
            $table->string('profile_picture')->nullable();
            $table->string('complete_name');
            $table->string('cpf')->unique();
            $table->string('email')->unique();
            $table->string('phone_number')->unique();
            $table->date('birth_date');

            // Localização
            $table->string('address');
            $table->string('neighborhood');
            $table->string('number');
            $table->string('cep');
            $table->foreignId('city_id')->constrained()->onDelete('cascade');

            // Perfil Profisional
            $table->string('professional_title');
            $table->string('portifolio_link')->nullable();
            $table->text('bio')->nullable();

            // Segurança
            $table->string('password');

            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_admin')->default(false);
            $table->boolean('is_freelancer')->default(false);

            // Dados da empresa
            $table->string('company_name');
            $table->text('description');
            $table->string('cpf_cnpj')->unique();
            $table->foreignId('areaActivies_id')->constrained('area_activies')->onDelete('cascade');
            $table->string('assessment')->nullable();

            // Dados do representante da empressa
            $table->string('representative_name');
            $table->string('email')->unique();
            $table->string('phone_number')->unique();

            // Localização
            $table->string('address');
            $table->string('neighborhood');
            $table->string('number');
            $table->string('cep');
            $table->foreignId('city_id')->constrained()->onDelete('cascade');

            // Segurança
            $table->string('password');

            $table->timestamp('email_verified_at')->nullable();
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
