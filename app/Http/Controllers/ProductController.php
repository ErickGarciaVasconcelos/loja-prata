<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // 1. LISTA DE PRODUTOS (O que faltava para abrir o painel)
    public function index()
{
    // Limita a busca a 6 produtos para a vitrine
    $produtos = Product::take(6)->get(); 
    
    return view('welcome', compact('product'));
}

// Adicione esta nova função para o catálogo completo
    public function catalogo()
    {
        // O "paginate(12)" diz ao Laravel para mostrar 12 joias por página
        // e criar os botões de "Página 1, 2, 3..." automaticamente!
        $produtos = \App\Models\Product::paginate(12);
        
        return view('produtos.catalogo', compact('produtos'));
    }

    // 2. FORMULÁRIO DE CADASTRO
    public function create()
    {
        return view('admin.produtos.create');
    }

    // 3. SALVAR NOVO PRODUTO
    public function store(Request $request)
    {
        $produto = Product::create([
            'sku' => $request->sku,
            'name' => $request->name,
            'plating_details' => $request->plating_details,
            'price' => $request->price ?? 0,
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

    // 4. FORMULÁRIO DE EDIÇÃO
    public function edit($id)
    {
        $produto = Product::with('images')->findOrFail($id);
        return view('admin.produtos.edit', compact('produto'));
    }

    // 5. SALVAR ALTERAÇÕES
    public function update(Request $request, $id)
    {
        $produto = Product::findOrFail($id);
        
        $produto->update([
            'sku' => $request->sku,
            'name' => $request->name,
            'plating_details' => $request->plating_details,
            'price' => $request->price ?? 0,
        ]);

        if ($request->hasFile('foto')) {
            // Remove as fotos antigas do servidor
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

    // 6. EXCLUIR PRODUTO (O que também faltava)
    public function destroy($id)
    {
        $produto = Product::findOrFail($id);

        // Remove os arquivos físicos da pasta storage
        foreach ($produto->images as $image) {
            Storage::disk('public')->delete($image->image_path);
        }

        // Remove o registro do banco
        $produto->delete();

        return redirect()->route('produtos.index')->with('sucesso', 'Produto removido com sucesso!');
    }
}