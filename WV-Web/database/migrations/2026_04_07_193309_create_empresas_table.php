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
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            
            // Dados do Negócio
            $table->string('razao_social', 255);
            $table->string('nome_fantasia', 255)->nullable();
            $table->string('cnpj_cpf', 18)->unique(); // Formato: 00.000.000/0001-00 ou 000.000.000-00
            $table->string('area_atuacao', 100);
            
            // Contato Responsável
            $table->string('nome_responsavel', 255);
            $table->string('email_corporativo', 255)->unique();
            $table->string('telefone_contato', 20); // Formato: (11) 99999-9999
            
            // Localização
            $table->string('cidade_sede', 255);
            $table->string('cep', 10)->nullable();
            $table->string('logradouro', 255)->nullable();
            $table->string('numero', 20)->nullable();
            $table->string('complemento', 100)->nullable();
            $table->string('bairro', 100)->nullable();
            $table->string('estado', 2)->nullable(); // UF
            $table->text('endereco_completo')->nullable();
            
            // Sobre a Empresa
            $table->text('pequena_descricao')->nullable();
            
            // Segurança
            $table->string('senha'); // Será criptografada automaticamente
            $table->rememberToken();
            
            // Status e Timestamps
            $table->boolean('ativo')->default(true);
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
            
            // Índices para performance
            $table->index('cnpj_cpf');
            $table->index('email_corporativo');
            $table->index('area_atuacao');
            $table->index('cidade_sede');
            $table->index('ativo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresas');
    }
};