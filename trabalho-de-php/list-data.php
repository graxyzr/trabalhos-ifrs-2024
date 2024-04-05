<?php
// Exibe uma mensagem
echo "Banco de Dados";

// Conexão com o Banco de Dados
$conexao = mysqli_connect("127.0.0.1", "root", "", "crud_filmes");

// Atualiza os dados do filme se o formulário de atualização foi submetido
if (!empty($_POST['id_for_updating'])){
    // Obtém os dados do formulário POST
    $nome_edit = $_POST['nome_edit'];
    $desenvolvedora_edit = $_POST['desenvolvedora_edit'];
    $genero_edit = $_POST['genero_edit'];
    $id_for_updating = $_POST['id_for_updating']; 

    // Query para atualizar os dados do filme no banco de dados
    $query = "UPDATE filmes SET titulo='$nome_edit', diretor='$desenvolvedora_edit', genero='$genero_edit' WHERE id=$id_for_updating";
    
    // Executa a query de atualização
    mysqli_query($conexao, $query);
}

// Remove um filme se o formulário de remoção foi submetido
if (!empty($_POST["id_for_removing"])){
    // Obtém o ID do filme a ser removido
    $removingRow = $_POST["id_for_removing"];
    
    // Query para remover o filme do banco de dados
    $query_for_removing = "DELETE FROM filmes WHERE id=$removingRow";
    
    // Executa a query de remoção
    mysqli_query($conexao, $query_for_removing);
}

// Seleciona todos os filmes do Banco de Dados
$query = "SELECT id, titulo, diretor, genero, imagem FROM filmes";
$resultado = mysqli_query($conexao, $query);
?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Título</th>
            <th scope="col">Diretor</th>
            <th scope="col">Gênero</th>
            <th scope="col">Imagem</th>
            <th scope="col">Ação</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Loop para exibir os filmes
        while($linha = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            echo "<tr>";
            echo "<td>".$linha['id']."</td>";
            echo "<td>".$linha['titulo']."</td>";
            echo "<td>".$linha['diretor']."</td>";
            echo "<td>".$linha['genero']."</td>";
            echo "<td><img src='./uploads/".$linha['imagem']."' width='100' height='100'></td>";
            echo "<td>";

            // Formulário (Remover)
            echo "<form action='list-data.php' method='post'>";
            echo "<input type='hidden' name='id_for_removing' value='".$linha['id']."'>";
            echo "<button type='submit' name='submit'>Delete</button>";
            echo "</form>";

            // Formulário (Editar)
            echo "<form action='edit-form.php' method='post'>";
            echo "<input type='hidden' name='id_for_editing' value='".$linha['id']."'>";
            echo "<button type='submit' name='submit'>Editar</button>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

<a href="index.php">Retornar</a>