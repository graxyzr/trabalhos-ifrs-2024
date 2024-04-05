<?php
// Exibe uma mensagem
echo "Remover";

// Obtém o ID do filme a ser removido do formulário POST
$id_remove = $_POST['id'];

// Conexão com o Banco de Dados
$conexao =  mysqli_connect("127.0.0.1","root","","crud_filmes");

// Monta a query SQL para deletar o filme com o ID fornecido
$query = "DELETE FROM filmes WHERE id = ".$id_remove;

// Exibe a query para fins de depuração
echo "$query";

// Executa a query SQL para deletar o filme
$resultado = mysqli_query($conexao,$query);
?>

<a href="index.php">Retorne por aqui</a>