<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Nome correto do seu Model
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * 1. VITRINE DA HOME (welcome)
     * Mostra apenas as 6 primeiras joias
     */
    public function index()
    {
        $produtos = Product::with('images')->take(6)->get(); 
        
        // CORREÇÃO: O nome no compact deve ser EXATAMENTE igual à variável $produtos
        return view('welcome', compact('produtos'));
    }

    /**
     * 2. CATÁLOGO COMPLETO
     * Mostra todas as joias com paginação
     */
    public function catalogo()
    {
        $produtos = Product::with('images')->paginate(12);
        
        return view('produtos.catalogo', compact('produtos'));
    }

    /**
     * 3. FORMULÁRIO DE CADASTRO (Painel)
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
        // Validação criteriosa para evitar erros de banco
        $request->validate([
            'sku' => 'required|unique:products',
            'name' => 'required',
            'price' => 'required|numeric',
            'foto' => 'image|mimes:jpeg,png,jpg|max:2048'
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
     */
    public function edit($id)
    {
        $produto = Product::with('images')->findOrFail($id);
        return view('admin.produtos.edit', compact('produto'));
    }

    /**
     * 6. SALVAR ALTERAÇÕES (Update)
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
            // Remove fotos antigas para não lotar o servidor da Railway
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
     * 7. EXCLUIR PRODUTO
     */
    public function destroy($id)
    {
        $produto = Product::findOrFail($id);

        foreach ($produto->images as $image) {
            Storage::disk('public')->delete($image->image_path);
        }

        $produto->delete();

        return redirect()->route('produtos.index')->with('sucesso', 'Produto removido com sucesso!');
    }
}