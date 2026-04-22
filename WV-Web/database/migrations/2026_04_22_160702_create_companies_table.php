<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('fantasy_name');
            $table->string('cnpj')->unique();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('industry')->nullable();
            $table->text('description')->nullable();
            $table->string('city')->nullable();
            $table->text('address')->nullable();
            $table->enum('status', ['pending', 'active', 'suspended'])->default('pending');
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('companies'); }
};