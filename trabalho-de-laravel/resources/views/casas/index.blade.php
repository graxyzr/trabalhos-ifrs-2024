<!-- resources/views/casas/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Casas</h1>

    <a href="{{ route('casas.create') }}" class="btn btn-primary">Adicionar Nova Casa</a>
    <a href="{{ route('casas.maisCara') }}" class="btn btn-primary">Casa Mais Cara</a>

    <form action="{{ route('casas.buscar') }}" method="POST">
        @csrf
        @method('POST')
        <input type="text" name="query" placeholder="Buscar por endereço ou imobiliária" value="{{ request('query') }}">
        <button type="submit">Buscar</button>
    </form>



    <a href="{{ route('casas.filtro', ['tipo' => 0]) }}" class="btn btn-warning">Casas para Aluguel</a>
    <a href="{{ route('casas.filtro', ['tipo' => 1]) }}" class="btn btn-warning">Casas para Venda</a>

    <a href="{{ route('casas.ordenar', ['campo' => 'preco']) }}" class="btn btn-secondary">Ordenar por Preço</a>
    <a href="{{ route('casas.ordenar', ['campo' => 'endereco']) }}" class="btn btn-secondary">Ordenar por Endereço</a>

    <table class="table">
        <thead>
            <tr>
                <th>Nome da Imobiliária</th>
                <th>Endereço</th>
                <th>Preço</th>
                <th>Venda ou Aluguel</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($casas as $casa)
                <tr>
                    <td>{{ $casa->nome_imobiliaria }}</td>
                    <td>{{ $casa->endereco }}</td>
                    <td>R$ {{ number_format($casa->preco, 2, ',', '.') }}</td>
                    <td>{{ $casa->venda_ou_aluguel == 0 ? 'Aluguel' : 'Venda' }}</td>
                    <td>
                        <a href="{{ route('casas.show', $casa->id) }}" class="btn btn-info">Mostrar</a>
                        <a href="{{ route('casas.edit', $casa->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('casas.destroy', $casa->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Deletar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Nenhuma casa encontrada.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection