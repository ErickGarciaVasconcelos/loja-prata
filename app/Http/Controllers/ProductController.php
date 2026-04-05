<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * 1. VITRINE DA HOME
     * Localização real: resources/views/paginas/welcome.blade.php
     */
    public function index()
    {
        $produtos = Product::with('images')->take(6)->get(); 
        
        // AJUSTE: Adicionado 'paginas.' antes do nome da view
        return view('paginas.welcome', compact('produtos'));
    }

    /**
     * 2. CATÁLOGO COMPLETO
     * Localização real: resources/views/produtos/catalogo.blade.php
     */
    public function catalogo()
    {
        $produtos = Product::with('images')->paginate(12);
        
        // AJUSTE: Confirmado o caminho 'produtos.catalogo'
        return view('produtos.catalogo', compact('produtos'));
    }

    /**
     * 3. FORMULÁRIO DE CADASTRO
     * Localização real: resources/views/admin/produtos/create.blade.php
     */
    public function create()
    {
        return view('admin.produtos.create');
    }

    /**
     * 4. SALVAR NOVO PRODUTO
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
     * 5. FORMULÁRIO DE EDIÇÃO
     * Localização real: resources/views/admin/produtos/edit.blade.php
     */
    public function edit($id)
    {
        $produto = Product::with('images')->findOrFail($id);
        
        // AJUSTE: Ajustado para a sua pasta admin\produtos
        return view('admin.produtos.edit', compact('produto'));
    }

    /**
     * 6. ATUALIZAR (Update)
     */
    public function update(Request $request, $id)
    {
        $produto = Product::findOrFail($id);
        $produto->update($request->all());

        if ($request->hasFile('foto')) {
            foreach ($produto->images as $oldImage) {
                Storage::disk('public')->delete($oldImage->image_path);
                $oldImage->delete();
            }
            $path = $request->file('foto')->store('produtos', 'public');
            $produto->images()->create(['image_path' => $path, 'is_main' => true]);
        }

        return redirect()->route('produtos.index')->with('sucesso', 'Joia atualizada!');
    }

    /**
     * 7. EXCLUIR
     */
    public function destroy($id)
    {
        $produto = Product::findOrFail($id);
        foreach ($produto->images as $image) {
            Storage::disk('public')->delete($image->image_path);
        }
        $produto->delete();

        return redirect()->route('produtos.index')->with('sucesso', 'Removido!');
    }
}