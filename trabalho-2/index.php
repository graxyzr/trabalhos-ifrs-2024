<?php
// Inicia a sessão PHP para acessar variáveis de sessão
session_start();

// Verifica se a variável de sessão 'email' está definida (usuário está logado)
if(isset($_SESSION['email'])) {
    // Se o usuário estiver logado, redireciona para a página inicial (home.php)
    header("Location: home.php");
    // Encerra o script para evitar que o restante do código seja executado
    exit();
}

// Verifica se o formulário de login foi submetido
if(isset($_POST['login'])) {
    // Se o formulário de login foi submetido, inclui o arquivo de login.php para processamento
    require_once 'login.php';
}

// Verifica se o formulário de registro foi submetido
if(isset($_POST['register'])) {
    // Se o formulário de registro foi submetido, inclui o arquivo de register.php para processamento
    require_once 'register.php';
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Registration</title>
</head>
<body>

    <h2>Login</h2>
    <form action="index.php" method="post">
        <input type="email" name="email" placeholder="Email" required><br><br>
        <input type="password" name="password" placeholder="Senha" required><br><br>
        <button type="submit" name="login">Login</button>
    </form>

    <br><br><br><br><br><br>

    <h2>Cadastro</h2>
    <form action="index.php" method="post">
        <input type="text" name="name" placeholder="Nome" required><br><br>
        <input type="email" name="email" placeholder="Email" required><br><br>
        <input type="password" name="password" placeholder="Senha" required><br><br>
        <button type="submit" name="register">Register</button>
    </form>
</body>
</html>