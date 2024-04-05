<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Envio de Dados</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            color: #333;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Formulário de Envio de Dados</h1>

    <?php
    // Verifica se o ID do filme foi enviado via POST
    if(isset($_POST['id_for_editing'])) {
        // Obtém o ID do filme
        $id_do_filme = $_POST['id_for_editing'];
        // Conexão com o banco de dados
        $conexao = mysqli_connect("127.0.0.1", "root", "", "crud_filmes");
        // Query para selecionar os dados do filme com base no ID
        $query = "SELECT titulo, diretor, genero, imagem FROM filmes WHERE id=$id_do_filme";
        // Executa a query
        $resultado = mysqli_query($conexao, $query);
        // Verifica se há resultados
        if ($resultado && mysqli_num_rows($resultado) > 0) {
            // Obtém a linha de resultado como um array associativo
            $linha = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
        } else {
            echo "Filme não encontrado.";
        }
    } else {
        echo "ID do filme não especificado.";
    }
    ?>

    <form action="edit-data.php" method="post" enctype="multipart/form-data">
        <!-- Campo oculto para enviar o ID do filme a ser editado -->
        <input type="hidden" name="id_atualizacao" value="<?php echo $id_do_filme; ?>">
        <label>Nome:</label>
        <!-- Exibe o título do filme no campo de entrada de texto, se estiver disponível, e torna o campo obrigatório -->
        <input type="text" name="titulo_edit" value="<?php if(isset($linha)) echo $linha['titulo']; ?>" required><br>
        <label>Diretor:</label>
        <!-- Exibe o diretor do filme no campo de entrada de texto, se estiver disponível, e torna o campo obrigatório -->
        <input type="text" name="diretor_edit" value="<?php if(isset($linha)) echo $linha['diretor']; ?>" required><br>
        <label>Gênero:</label>
        <!-- Exibe o gênero do filme no campo de entrada de texto, se estiver disponível, e torna o campo obrigatório -->
        <input type="text" name="genero_edit" value="<?php if(isset($linha)) echo $linha['genero']; ?>" required><br>
        <label>Imagem:</label>
        <input type="file" name="imagem_edit"><br>
        <button type="submit" name="submit" class="btn btn-primary">Enviar</button> <!-- Adicionando classe Bootstrap -->
    </form>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
