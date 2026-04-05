<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function add(Request $request)
    {
        $produto = [
            'id' => $request->produto_id,
            'nome' => $request->produto_nome,
        ];

        $request->session()->push('orcamento', $produto);

        return redirect()->back()->with('sucesso', $produto['nome'] . ' adicionado ao seu orçamento!');
    }

    public function index(Request $request)
    {
        $orcamento = $request->session()->get('orcamento', []);

        return view('paginas.orcamento', compact('orcamento'));
    }

    public function remove(Request $request, $index)
    {
        $orcamento = $request->session()->get('orcamento', []);

        if (isset($orcamento[$index])) {
            unset($orcamento[$index]);
            $orcamento = array_values($orcamento);
            $request->session()->put('orcamento', $orcamento);
        }

        return redirect()->back()->with('sucesso', 'Item removido do orçamento.');
    }

    public function whatsapp(Request $request)
    {
        $orcamento = $request->session()->get('orcamento', []);

        if (count($orcamento) === 0) {
            return redirect()->back()->with('erro', 'Sua lista está vazia!');
        }

        $texto = "Olá! Gostaria de um orçamento para as seguintes peças de prata:\n\n";

        foreach ($orcamento as $item) {
            $texto .= "• " . $item['nome'] . " (Cód: " . $item['id'] . ")\n";
        }

        $seuNumero = "5511978882363";
        $url = "https://wa.me/" . $seuNumero . "?text=" . urlencode($texto);

        return redirect()->away($url);
    }
}