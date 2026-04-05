<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * 1. PAINEL DE CONTROLE - LISTAGEM (GERENCIAR JOIAS)
     * Localização real: resources/views/admin/produtos/index.blade.php
     */
    public function index()
    {
        // Pega todos os produtos para o administrador ver no painel
        $produtos = Product::with('images')->paginate(15);
        
        // CORREÇÃO: Agora aponta para a pasta ADMIN
        return view('admin.produtos.index', compact('produtos'));
    }

    /**
     * 2. VITRINE DA HOME (SITE PÚBLICO)
     * Localização real: resources/views/paginas/welcome.blade.php
     */
    public function vitrine()
{
    // Pega todos os produtos para a página de vitrine
    $produtos = Product::with('images')->where('is_active', true)->get();
    
    // Agora aponta para o seu arquivo que já tem o grid de joias
    return view('paginas.welcome', compact('produtos')); 
}

    /**
     * 3. CATÁLOGO COMPLETO (SITE PÚBLICO)
     * Localização real: resources/views/produtos/catalogo.blade.php
     */
    public function catalogo()
    {
        $produtos = Product::with('images')->where('is_active', true)->paginate(12);
        
        return view('produtos.catalogo', compact('produtos'));
    }

    /**
     * 4. FORMULÁRIO DE CADASTRO (PAINEL)
     */
    public function create()
    {
        return view('admin.produtos.create');
    }

    /**
     * 5. SALVAR NOVO PRODUTO (POST)
     */
    public function store(Request $request)
    {
        $request->validate([
            'sku' => 'required|unique:products',
            'name' => 'required',
            'price' => 'required|numeric',
        ]);

        $produto = Product::create([
            'sku' => $request->sku,
            'name' => $request->name,
            'plating_details' => $request->plating_details,
            'price' => $request->price,
            'is_active' => true,
        ]);

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('produtos', 'public');
            ProductImage::create([
                'product_id' => $produto->id,
                'image_path' => $path,
                'is_main' => true
            ]);
        }

        return redirect()->route('produtos.index')->with('sucesso', 'Joia cadastrada com sucesso!');
    }

    /**
     * 6. FORMULÁRIO DE EDIÇÃO (PAINEL)
     */
    public function edit($id)
    {
        $produto = Product::with('images')->findOrFail($id);
        return view('admin.produtos.edit', compact('produto'));
    }

    /**
     * 7. ATUALIZAR (PUT/PATCH)
     */
    public function update(Request $request, $id)
    {
        $produto = Product::findOrFail($id);
        
        $produto->update([
            'sku' => $request->sku,
            'name' => $request->name,
            'plating_details' => $request->plating_details,
            'price' => $request->price,
        ]);

        if ($request->hasFile('foto')) {
            // Limpa as imagens antigas para economizar espaço na Railway
            foreach ($produto->images as $oldImage) {
                Storage::disk('public')->delete($oldImage->image_path);
                $oldImage->delete();
            }

            $path = $request->file('foto')->store('produtos', 'public');
            $produto->images()->create([
                'image_path' => $path,
                'is_main' => true
            ]);
        }

        return redirect()->route('produtos.index')->with('sucesso', 'Joia atualizada com sucesso!');
    }

    /**
     * 8. EXCLUIR (DELETE)
     */
    public function destroy($id)
    {
        $produto = Product::findOrFail($id);

        foreach ($produto->images as $image) {
            Storage::disk('public')->delete($image->image_path);
        }

        $produto->delete();

        return redirect()->route('produtos.index')->with('sucesso', 'Produto removido!');
    }
}