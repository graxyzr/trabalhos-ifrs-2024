<!-- resources/views/welcome.blade.php -->

<!DOCTYPE html>
<html>

<head>
    <title>Bem-vindo ao Sistema de Imóveis</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }

        header {
            background: #343a40;
            color: #ffffff;
            padding: 20px 0;
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: 2em;
        }

        .btn {
            display: inline-block;
            font-size: 16px;
            color: #ffffff;
            background-color: #007bff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            margin: 10px 0;
        }

        .btn-primary {
            background-color: #007bff;
        }

        .btn-info {
            background-color: #17a2b8;
        }

        .btn-warning {
            background-color: #ffc107;
        }

        .btn-secondary {
            background-color: #6c757d;
        }
    </style>
</head>

<body>
    <header>
        <div class="container">
            <h1>Bem-vindo ao Sistema de Imóveis</h1>
        </div>
    </header>

    <div class="container">
        <p><a href="{{ route('casas.index') }}" class="btn btn-primary">Ver Casas</a></p>
        <p><a href="{{ route('casas.mais-cara') }}" class="btn btn-info">Casa Mais Cara</a></p>
        <p><a href="{{ route('casas.filtro', ['tipo' => 'aluguel']) }}" class="btn btn-primary">Casas para Aluguel</a></p>
        <p><a href="{{ route('casas.filtro', ['tipo' => 'venda']) }}" class="btn btn-warning">Casas para Venda</a></p>
        <p><a href="{{ route('casas.ordenar', ['campo' => 'preco']) }}" class="btn btn-secondary">Ordenar por Preço</a></p>
        <p><a href="{{ route('casas.ordenar', ['campo' => 'endereco']) }}" class="btn btn-secondary">Ordenar por Endereço</a></p>
    </div>
</body>

</html>