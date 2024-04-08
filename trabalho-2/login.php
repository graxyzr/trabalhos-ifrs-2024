<?php
// Inclui o arquivo de conexão com o banco de dados
require_once 'db_connection.php';

// Obtém o email e a senha enviados através do formulário de login
$email = $_POST['email'];
$password = $_POST['password'];

// Prepara uma instrução SQL para selecionar o usuário com o email fornecido
$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s", $email); // Vincula o parâmetro ao placeholder na instrução preparada
$stmt->execute(); // Executa a instrução preparada
$result = $stmt->get_result(); // Obtém o resultado da execução da consulta
$user = $result->fetch_assoc(); // Obtém os dados do usuário como uma matriz associativa

// Verifica se um usuário foi encontrado com o email fornecido e se a senha corresponde
if($user && password_verify($password, $user['senha'])) {
    // Se o usuário foi encontrado e a senha corresponde, define variáveis de sessão para o usuário
    $_SESSION['email'] = $user['email']; // Define a variável de sessão 'email'
    $_SESSION['name'] = $user['nome']; // Define a variável de sessão 'name' com o nome do usuário
    // Redireciona o usuário para a página inicial (home.php)
    header("Location: home.php");
    // Encerra o script para evitar que o restante do código seja executado
    exit();
} else {
    // Se o usuário não foi encontrado ou a senha não corresponde, exibe uma mensagem de erro
    echo "Email ou senha inválidos";
}
?>