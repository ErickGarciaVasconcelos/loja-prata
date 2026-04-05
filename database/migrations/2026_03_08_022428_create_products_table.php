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
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('sku')->unique(); // O Código da peça (ex: ANEL-PR-001) - essencial para saber o que o cliente quer
        $table->string('name'); // Nome da joia
        $table->text('description')->nullable(); // Espaço para detalhes técnicos e cuidados com a prata
        $table->string('plating_details')->nullable(); // Especificações, como "50 milésimos de prata"
        
        $table->decimal('price', 10, 2)->nullable(); // Configuramos como opcional (nullable). Pode ficar vazio agora, mas a estrutura já existe para o futuro.
        
        $table->boolean('is_active')->default(true); // Permite ocultar uma peça do site quando não houver stock, sem ter de a apagar
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
