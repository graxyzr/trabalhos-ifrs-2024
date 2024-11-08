<!-- resources/views/casas/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Casa</h1>

    <form action="{{ route('casas.update', $casa->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nome_imobiliaria">Nome da Imobiliária</label>
            <input type="text" class="form-control" id="nome_imobiliaria" name="nome_imobiliaria" value="{{ $casa->nome_imobiliaria }}" required>
        </div>
        <div class="form-group">
            <label for="endereco">Endereço</label>
            <input type="text" class="form-control" id="endereco" name="endereco" value="{{ $casa->endereco }}" required>
        </div>
        <div class="form-group">
            <label for="preco">Preço</label>
            <input type="number" step="0.01" class="form-control" id="preco" name="preco" value="{{ $casa->preco }}" required>
        </div>
        <div class="form-group">
            <label for="venda_ou_aluguel">Venda ou Aluguel</label>
            <select class="form-control" id="venda_ou_aluguel" name="venda_ou_aluguel" required>
                <option value="0" {{ $casa->venda_ou_aluguel == 0 ? 'selected' : '' }}>Aluguel</option>
                <option value="1" {{ $casa->venda_ou_aluguel == 1 ? 'selected' : '' }}>Venda</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>
@endsection