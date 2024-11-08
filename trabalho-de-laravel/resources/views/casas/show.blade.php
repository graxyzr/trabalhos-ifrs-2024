{{-- resources/views/casas/show.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $casa->nome_imobiliaria }}</h1>
    <p>Endereço: {{ $casa->endereco }}</p>
    <p>Preço: R$ {{ number_format($casa->preco, 2, ',', '.') }}</p>
    <p>Tipo: {{ $casa->venda_ou_aluguel == 1 ? 'Venda' : 'Aluguel' }}</p>

    <a href="{{ route('casas.index') }}" class="btn btn-primary">Voltar</a>
</div>
@endsection