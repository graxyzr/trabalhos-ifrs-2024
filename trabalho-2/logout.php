<?php
// Inicia a sessão PHP para acessar variáveis de sessão
session_start();

// Remove todas as variáveis de sessão
session_unset();

// Destrói a sessão, removendo todos os dados de sessão do servidor
session_destroy();

// Redireciona o usuário de volta para a página de login (index.php)
header("Location: index.php");

// Encerra o script para evitar que o restante do código seja executado após o redirecionamento
exit();
?>