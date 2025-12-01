@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h3>Novo Produto</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('produtos.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nome</label>
                        <input type="text" name="nome" class="form-control" value="{{ old('nome') }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descrição</label>
                        <textarea name="descricao" class="form-control" rows="3">{{ old('descricao') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Preço</label>
                        <input type="number" name="preco" class="form-control" step="0.01" value="{{ old('preco') }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Estoque</label>
                        <input type="number" name="estoque" class="form-control" value="{{ old('estoque', 0) }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Categoria</label>
                        <select name="categoria_id" class="form-control" required>
                            <option value="">Selecione...</option>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                                    {{ $categoria->nome }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Imagem (PNG ou JPG)</label>
                        <input type="file" name="imagem" class="form-control" accept=".png,.jpg,.jpeg">
                        <small class="text-muted">Formatos aceitos: PNG, JPG. Tamanho máximo: 2MB</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="{{ route('produtos.index') }}" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection