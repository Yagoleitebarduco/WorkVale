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
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies')->onDelete('restrict')->onUpdate('cascade');
            $table->string('name_work');
            $table->text('description_work');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('duration');
            $table->string('type_work');
            $table->decimal('payment', 10, 2);
            $table->integer('status')->default(1);
            // 1 = Ativas, 2 = Em Andamento, 3 = Concluidos, 4 = Em Atraso
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('works');
    }
};
