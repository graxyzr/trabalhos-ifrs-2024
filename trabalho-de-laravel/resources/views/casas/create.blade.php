<!-- resources/views/casas/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Adicionar Nova Casa</h1>

    <form action="{{ route('casas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nome_imobiliaria">Nome da Imobiliária</label>
            <input type="text" class="form-control" id="nome_imobiliaria" name="nome_imobiliaria" required>
        </div>
        <div class="form-group">
            <label for="endereco">Endereço</label>
            <input type="text" class="form-control" id="endereco" name="endereco" required>
        </div>
        <div class="form-group">
            <label for="preco">Preço</label>
            <input type="number" step="0.01" class="form-control" id="preco" name="preco" required>
        </div>
        <div class="form-group">
            <label for="venda_ou_aluguel">Venda ou Aluguel</label>
            <select class="form-control" id="venda_ou_aluguel" name="venda_ou_aluguel" required>
                <option value="0">Aluguel</option>
                <option value="1">Venda</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
@endsection