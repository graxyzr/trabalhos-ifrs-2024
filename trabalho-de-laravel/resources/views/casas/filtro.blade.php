<!-- resources/views/casas/filtro.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Casas para {{ $tipoTexto }}</h1> <!-- Corrigido para $tipoTexto -->

    @if ($casas->isEmpty())
        <p>Nenhuma casa encontrada para o tipo selecionado.</p>
    @else
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
                @foreach ($casas as $casa)
                    <tr>
                        <td>{{ $casa->nome_imobiliaria }}</td>
                        <td>{{ $casa->endereco }}</td>
                        <td>R$ {{ number_format($casa->preco, 2, ',', '.') }}</td>
                        <td>{{ $casa->venda_ou_aluguel == 0 ? 'Aluguel' : 'Venda' }}</td>
                        <td>
                            <a href="{{ route('casas.show', $casa->id) }}" class="btn btn-primary">Ver</a>
                            <a href="{{ route('casas.edit', $casa->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('casas.destroy', $casa->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection