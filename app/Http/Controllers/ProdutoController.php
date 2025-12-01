<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdutoController extends Controller
{
    public function index(Request $request)
    {
        // Gerenciar cookie da última categoria acessada
        $ultimaCategoria = $request->cookie('ultima_categoria');
        
        $produtos = Produto::with('categoria')->get();
        $categorias = Categoria::all();
        
        return view('produtos.index', compact('produtos', 'categorias', 'ultimaCategoria'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('produtos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric|min:0',
            'estoque' => 'required|integer|min:0',
            'categoria_id' => 'required|exists:categorias,id',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        // Upload de imagem
        if ($request->hasFile('imagem')) {
            $imagePath = $request->file('imagem')->store('produtos', 'public');
            $data['imagem'] = $imagePath;
        }

        Produto::create($data);

        // Salvar cookie da última categoria
        $response = redirect()->route('produtos.index')
            ->with('success', 'Produto criado com sucesso!');
        
        return $response->cookie('ultima_categoria', $request->categoria_id, 60 * 24 * 30); // 30 dias
    }

    public function edit(Produto $produto)
    {
        $categorias = Categoria::all();
        return view('produtos.edit', compact('produto', 'categorias'));
    }

    public function update(Request $request, Produto $produto)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric|min:0',
            'estoque' => 'required|integer|min:0',
            'categoria_id' => 'required|exists:categorias,id',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        // Upload de nova imagem
        if ($request->hasFile('imagem')) {
            // Deletar imagem antiga
            if ($produto->imagem) {
                Storage::disk('public')->delete($produto->imagem);
            }
            $imagePath = $request->file('imagem')->store('produtos', 'public');
            $data['imagem'] = $imagePath;
        }

        $produto->update($data);

        return redirect()->route('produtos.index')
            ->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy(Produto $produto)
    {
        // Deletar imagem
        if ($produto->imagem) {
            Storage::disk('public')->delete($produto->imagem);
        }

        $produto->delete();

        return redirect()->route('produtos.index')
            ->with('success', 'Produto excluído com sucesso!');
    }
}
