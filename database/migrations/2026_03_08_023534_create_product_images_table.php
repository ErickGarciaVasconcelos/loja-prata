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
    Schema::create('product_images', function (Blueprint $table) {
        $table->id();
        
        // Conecta a imagem ao produto. O 'onDelete cascade' garante que se você excluir o produto, as fotos dele também somem do banco.
        $table->foreignId('product_id')->constrained()->onDelete('cascade'); 
        
        $table->string('image_path'); // O caminho onde a foto vai ficar salva no servidor
        
        $table->boolean('is_main')->default(false); // Define se esta será a foto principal (a de capa que aparece na vitrine)
        
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_images');
    }
};
