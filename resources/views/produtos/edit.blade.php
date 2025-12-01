@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h3>Editar Produto</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('produtos.update', $produto) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Nome</label>
                        <input type="text" name="nome" class="form-control" value="{{ old('nome', $produto->nome) }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descrição</label>
                        <textarea name="descricao" class="form-control" rows="3">{{ old('descricao', $produto->descricao) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Preço</label>
                        <input type="number" name="preco" class="form-control" step="0.01" value="{{ old('preco', $produto->preco) }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Estoque</label>
                        <input type="number" name="estoque" class="form-control" value="{{ old('estoque', $produto->estoque) }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Categoria</label>
                        <select name="categoria_id" class="form-control" required>
                            <option value="">Selecione...</option>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}" {{ old('categoria_id', $produto->categoria_id) == $categoria->id ? 'selected' : '' }}>
                                    {{ $categoria->nome }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        @if($produto->imagem)
                            <div class="mb-2">
                                <label class="form-label">Imagem Atual:</label><br>
                                <img src="{{ asset('storage/' . $produto->imagem) }}" alt="{{ $produto->nome }}" style="max-width: 200px;">
                            </div>
                        @endif
                        <label class="form-label">Nova Imagem (PNG ou JPG)</label>
                        <input type="file" name="imagem" class="form-control" accept=".png,.jpg,.jpeg">
                        <small class="text-muted">Deixe em branco para manter a imagem atual</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                    <a href="{{ route('produtos.index') }}" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection