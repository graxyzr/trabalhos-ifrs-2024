<?php
// Inclui o arquivo de conexão com o banco de dados
require_once 'db_connection.php';

// Obtém os dados do formulário de registro
$name = $_POST['name']; // Obtém o nome do usuário
$email = $_POST['email']; // Obtém o email do usuário
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash da senha fornecida pelo usuário

// Prepara uma instrução SQL para inserir um novo usuário no banco de dados
$stmt = $conn->prepare("INSERT INTO users (nome, email, senha) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $password); // Vincula os parâmetros ao placeholder na instrução preparada

// Executa a instrução preparada para inserir o novo usuário no banco de dados
if($stmt->execute()) {
    // Se a inserção for bem-sucedida, define variáveis de sessão para o usuário recém-registrado
    $_SESSION['email'] = $email; // Define a variável de sessão 'email'
    $_SESSION['name'] = $name; // Define a variável de sessão 'name' com o nome do usuário
    // Redireciona o usuário para a página inicial (home.php)
    header("Location: home.php");
    // Encerra o script para evitar que o restante do código seja executado
    exit();
} else {
    // Se houver um erro ao registrar o usuário, exibe uma mensagem de erro
    echo "Erro ao registrar usuário";
}
?>