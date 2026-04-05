<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuoteController;
use Illuminate\Support\Facades\Route;

// --- SITE PÚBLICO ---

// Página inicial - Agora chama a função 'vitrine' do Controller
Route::get('/', [ProductController::class, 'vitrine'])->name('home');

// Rota para o catálogo completo
Route::get('/colecao', [ProductController::class, 'catalogo'])->name('produtos.catalogo');

// Páginas institucionais (Caminhos ajustados para a pasta 'paginas')
Route::get('/como-funciona', function () {
    return view('paginas.como-funciona');
})->name('paginas.como-funciona');

Route::get('/cuidados-com-a-prata', function () {
    return view('paginas.cuidados');
})->name('paginas.cuidados');

Route::get('/politicas-de-troca', function () {
    return view('paginas.trocas');
})->name('paginas.trocas');


// --- SISTEMA DE ORÇAMENTO (Carrinho) ---
Route::prefix('orcamento')->group(function () {
    Route::get('/', [QuoteController::class, 'index'])->name('orcamento.index');
    Route::post('/adicionar', [QuoteController::class, 'add'])->name('orcamento.add');
    Route::post('/remover/{index}', [QuoteController::class, 'remove'])->name('orcamento.remove');
    Route::get('/enviar-whatsapp', [QuoteController::class, 'whatsapp'])->name('orcamento.whatsapp');
});


// --- ÁREA ADMINISTRATIVA (Protegida) ---
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Dashboard Geral do Breeze
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Painel de Gestão de Joias
    Route::prefix('painel-controle')->group(function () {
        Route::get('/produtos', [ProductController::class, 'index'])->name('produtos.index');
        Route::get('/produtos/novo', [ProductController::class, 'create'])->name('produtos.create');
        Route::post('/produtos', [ProductController::class, 'store'])->name('produtos.store');
        Route::get('/produtos/{id}/editar', [ProductController::class, 'edit'])->name('produtos.edit');
        Route::put('/produtos/{id}', [ProductController::class, 'update'])->name('produtos.update');
        Route::delete('/produtos/{id}', [ProductController::class, 'destroy'])->name('produtos.destroy');
    });

    // Perfil do usuário
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ROTA TEMPORÁRIA PARA CONSERTAR AS FOTOS
Route::get('/consertar-fotos', function () {
    try {
        // 1. Tenta criar o link simbólico (a ponte)
        \Illuminate\Support\Facades\Artisan::call('storage:link');
        $mensagem = "Tentativa de criar link executada. ";
    } catch (\Exception $e) {
        $mensagem = "Erro ao criar link: " . $e->getMessage();
    }

    $publicStorage = public_path('storage');
    $realStorage = storage_path('app/public');

    return [
        'resultado' => $mensagem,
        'link_na_public_existe' => file_exists($publicStorage) ? 'SIM' : 'NÃO',
        'eh_um_atalho_valido' => is_link($publicStorage) ? 'SIM' : 'NÃO',
        'caminho_da_vitrine' => $publicStorage,
        'caminho_do_cofre' => $realStorage,
        'arquivos_no_cofre' => scandir($realStorage . '/produtos') ?: 'Pasta vazia'
    ];
});

// Autenticação do Breeze
require __DIR__.'/auth.php';