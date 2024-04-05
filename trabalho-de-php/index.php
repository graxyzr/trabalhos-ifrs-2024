<!DOCTYPE html>
<html>
<head>
    <title>CRUD de Filmes</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding: 20px;
        }
        h1 {
            margin-bottom: 20px;
        }
        form {
            margin-bottom: 20px;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>CRUD de Filmes</h1>

        <h2>Inserir Filme</h2>
        <form action="enter-data.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="action" value="inserir">
            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" class="form-control" id="titulo" name="titulo">
            </div>
            <div class="form-group">
                <label for="diretor">Diretor:</label>
                <input type="text" class="form-control" id="diretor" name="diretor">
            </div>
            <div class="form-group">
                <label for="genero">Gênero:</label>
                <input type="text" class="form-control" id="genero" name="genero">
            </div>
            <div class="form-group">
                <label for="imagem">Imagem:</label>
                <input type="file" class="form-control-file" id="imagem" name="imagem">
            </div>
            <button type="submit" class="btn btn-primary">Inserir</button>
        </form>

        <br><br><br><br>

        <h2>Listar Filmes</h2>
        <a href="list-data.php" class="btn btn-primary">Listar Filmes</a>

        <br><br><br><br>

        <h2>Pesquisar Filme</h2>
        <form method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="pesquisar">
            </div>
            <button type="submit" class="btn btn-primary">Pesquisar</button>
        </form>
        
        <?php
        // Configurações do Banco de Dados
        $servidor = "localhost";
        $usuario = "root";
        $senha = "";
        $dbname = "crud_filmes";

        // Conexão com o Banco de Dados
        $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

        // Verifica se o formulário de pesquisa foi submetido
        if(isset($_POST['pesquisar'])) {
            $pesquisar = $_POST['pesquisar'];
        
            // Prepara a consulta SQL para buscar filmes pelo título
            $stmt = mysqli_prepare($conn, "SELECT * FROM filmes WHERE titulo LIKE ? LIMIT 5");

            // Vincula o parâmetro de pesquisa à instrução SQL preparada
            mysqli_stmt_bind_param($stmt, "s", $param_pesquisar);
            
            // Define o parâmetro de pesquisa
            $param_pesquisar = "%$pesquisar%";
            
            // Executa a consulta SQL
            mysqli_stmt_execute($stmt);
            
            // Obtém o resultado da consulta
            $resultado_filmes = mysqli_stmt_get_result($stmt);
            
            // Loop para exibir os resultados da pesquisa
            while($row = mysqli_fetch_array($resultado_filmes)){
                echo "Título: ".$row['titulo']."<br>";
                echo "Diretor: ".$row['diretor']."<br>";
                echo "Gênero: ".$row['genero']."<br>";

                echo "<br>";
            }
        }
        ?>
    </div>
</body>
</html>
