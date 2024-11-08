<!-- resources/views/casas/mais-cara.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Casa Mais Cara</h1>

    @if ($casa)
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $casa->nome_imobiliaria }}</h5>
            <p class="card-text">Endereço: {{ $casa->endereco }}</p>
            <p class="card-text">Preço: R$ {{ number_format($casa->preco, 2, ',', '.') }}</p>
            <p class="card-text">Venda ou Aluguel: {{ $casa->venda_ou_aluguel == 0 ? 'Aluguel' : 'Venda' }}</p>
        </div>
    </div>
    @else
    <p>Nenhuma casa encontrada.</p>
    @endif
</div>
@endsection