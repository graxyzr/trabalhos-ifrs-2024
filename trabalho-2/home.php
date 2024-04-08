<?php
// Inicia a sessão PHP para acessar variáveis de sessão
session_start();

// Verifica se a variável de sessão 'email' não está definida
if(!isset($_SESSION['email'])) {
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
</head>
<body>
    <h2>Bem-vindo(a), <?php echo $_SESSION['name']; ?></h2>
    <a href="logout.php">Logout</a>
</body>
</html>