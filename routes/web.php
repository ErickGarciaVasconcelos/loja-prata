<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuoteController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

// Página inicial
Route::get('/', function () {
    // Buscamos apenas 6 produtos para a vitrine ser limpa
    $produtos = Product::take(6)->get(); 
    
    // CORREÇÃO AQUI: Como seu arquivo está em resources/views/paginas/welcome.blade.php
    // precisamos chamar como 'paginas.welcome'
    return view('paginas.welcome', compact('produtos'));
});

// Dashboard do Breeze (Protegido com No-Cache)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Perfil do usuário
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Sistema de orçamento
Route::prefix('orcamento')->group(function () {
    Route::get('/', [QuoteController::class, 'index'])->name('orcamento.index');
    Route::post('/adicionar', [QuoteController::class, 'add'])->name('orcamento.add');
    Route::post('/remover/{index}', [QuoteController::class, 'remove'])->name('orcamento.remove');
    Route::get('/enviar-whatsapp', [QuoteController::class, 'whatsapp'])->name('orcamento.whatsapp');
});

// --- ÁREA ADMINISTRATIVA PROTEGIDA ---
Route::prefix('painel-controle')->middleware(['auth'])->group(function () {
    
    // Rotas de produtos
    Route::get('/produtos', [ProductController::class, 'index'])->name('produtos.index');
    Route::get('/produtos/novo', [ProductController::class, 'create'])->name('produtos.create');
    Route::post('/produtos', [ProductController::class, 'store'])->name('produtos.store');
    Route::get('/produtos/{id}/editar', [ProductController::class, 'edit'])->name('produtos.edit');
    Route::put('/produtos/{id}', [ProductController::class, 'update'])->name('produtos.update');
    Route::delete('/produtos/{id}', [ProductController::class, 'destroy'])->name('produtos.destroy');

});

// Páginas institucionais
Route::get('/como-funciona', function () {
    return view('paginas.como-funciona');
})->name('paginas.como-funciona');

Route::get('/cuidados-com-a-prata', function () {
    return view('paginas.cuidados');
})->name('paginas.cuidados');

Route::get('/politicas-de-troca', function () {
    return view('paginas.trocas');
})->name('paginas.trocas');

// Rota para o catálogo completo
Route::get('/colecao', [ProductController::class, 'catalogo'])->name('produtos.catalogo');

// Rotas de autenticação do Breeze
require __DIR__.'/auth.php';