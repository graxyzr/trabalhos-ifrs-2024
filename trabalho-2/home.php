<?php
// Inicia a sessão PHP para acessar variáveis de sessão
session_start();

// Verifica se a variável de sessão 'email' não está definida
if (!isset($_SESSION['email'])) {
    // Se a variável de sessão 'email' não estiver definida, redireciona para a página de login (index.php)
    header("Location: index.php");
    // Encerra o script para evitar que o restante do código seja executado
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .content {
            text-align: center;
            padding: 20px;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        a {
            display: block;
            margin-top: 20px;
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="content">
        <h2>Bem-vindo(a), <?php echo $_SESSION['name']; ?></h2>
        <a href="logout.php">Logout</a>
    </div>
</body>

</html>