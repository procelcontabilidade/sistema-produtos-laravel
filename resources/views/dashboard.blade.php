@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <h1>Dashboard</h1>
        <p class="lead">Bem-vindo ao Sistema de Gerenciamento de Produtos</p>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-6">
        <div class="card text-white bg-primary mb-3">
            <div class="card-body">
                <h5 class="card-title">Categorias</h5>
                <p class="card-text">Gerencie as categorias dos seus produtos</p>
                <a href="{{ route('categorias.index') }}" class="btn btn-light">Acessar</a>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card text-white bg-success mb-3">
            <div class="card-body">
                <h5 class="card-title">Produtos</h5>
                <p class="card-text">Gerencie o catálogo de produtos</p>
                <a href="{{ route('produtos.index') }}" class="btn btn-light">Acessar</a>
            </div>
        </div>
    </div>
</div>

@if(request()->cookie('ultima_categoria'))
<div class="alert alert-info mt-4">
    <strong>Info:</strong> Última categoria acessada: ID {{ request()->cookie('ultima_categoria') }}
</div>
@endif
@endsection