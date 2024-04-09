<?php
// Inicia a sessão PHP para acessar variáveis de sessão
session_start();

// Verifica se a variável de sessão 'email' está definida (usuário está logado)
if (isset($_SESSION['email'])) {
    // Se o usuário estiver logado, redireciona para a página inicial (home.php)
    header("Location: home.php");
    // Encerra o script para evitar que o restante do código seja executado
    exit();
}

// Verifica se o formulário de login foi submetido
if (isset($_POST['login'])) {
    // Se o formulário de login foi submetido, inclui o arquivo de login.php para processamento
    require_once 'login.php';
}

// Verifica se o formulário de registro foi submetido
if (isset($_POST['register'])) {
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
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            margin-bottom: 50px;
            text-align: center;
        }

        .form-box {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            display: inline-block;
        }

        h2 {
            margin-top: 0;
            text-align: center;
        }

        input[type="email"],
        input[type="password"],
        input[type="text"],
        button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <div class="form-container">
        <h2>Login</h2>
        <div class="form-box">
            <form action="index.php" method="post">
                <input type="email" name="email" placeholder="Email" required><br><br>
                <input type="password" name="password" placeholder="Senha" required><br><br>
                <button type="submit" name="login">Login</button>
            </form>
        </div>
    </div>

    <div class="form-container">
        <h2>Cadastro</h2>
        <div class="form-box">
            <form action="index.php" method="post">
                <input type="text" name="name" placeholder="Nome" required><br><br>
                <input type="email" name="email" placeholder="Email" required><br><br>
                <input type="password" name="password" placeholder="Senha" required><br><br>
                <button type="submit" name="register">Registrar</button>
            </form>
        </div>
    </div>

</body>

</html>