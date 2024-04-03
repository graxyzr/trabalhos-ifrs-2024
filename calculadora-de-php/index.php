<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora Simples</title>
</head>

<body>
    <h1>Calculadora Simples</h1>
    <br>
    <form action="result.php" method="POST">
        <label for="operation">Escolha sua operação:</label>
        <select name="operation">
            <option value="sum">Soma</option>
            <option value="subtraction">Subtração</option>
            <option value="multiplication">Multiplicação</option>
            <option value="division">Divisão</option>
        </select>
        <br><br><br>
        <input type="number" name="number1" placeholder="Informe o 1º Número:">
        <br><br>
        <input type="number" name="number2" placeholder="Informe o 2º Número:">
        <br><br>
        <button type="submit" name="calcular">Calcular</button>
    </form>
</body>

</html>