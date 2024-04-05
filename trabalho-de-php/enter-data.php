<?php
// Obtém os dados do formulário POST
$titulo = $_POST['titulo'];
$diretor = $_POST['diretor'];
$genero = $_POST['genero'];

// Conexão com o Banco de Dados
$conexao = mysqli_connect("127.0.0.1", "root", "", "crud_filmes");

// Diretório de destino para o upload de imagens
$targetDir = "uploads/";

// Verifica se um arquivo de imagem foi enviado
if (!empty($_FILES["imagem"]["name"])) {
    // Obtém o nome do arquivo enviado no campo de upload de imagem do formulário
    $nomeArquivo = basename($_FILES["imagem"]["name"]);
    // Cria um novo nome para o arquivo de imagem anexando a data e hora atual ao nome original do arquivo
    $nomeArquivoModificado = date("YmdHis") . $nomeArquivo;
    // Define o caminho completo para o arquivo modificado no diretório de destino para upload
    $caminhoArquivoAlvo = $targetDir . $nomeArquivoModificado; 
    // Obtém a extensão do arquivo a partir do caminho completo do arquivo especificado
    $tipoArquivo = pathinfo($caminhoArquivoAlvo, PATHINFO_EXTENSION); 

    // Tipos de arquivo permitidos
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif'); 
    // Verifica se o tipo de arquivo é permitido
    if (in_array($tipoArquivo, $allowTypes)) { 
        // Move o arquivo para o diretório de destino
        if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $caminhoArquivoAlvo)) { 
            // Insere os dados do filme no Banco de Dados
            $query = "INSERT INTO filmes (titulo, diretor, genero, imagem) VALUES ('$titulo', '$diretor', '$genero', '$nomeArquivoModificado')";
            $insert = mysqli_query($conexao, $query); 
            // Verifica se a inserção foi bem-sucedida
            if ($insert) { 
                $statusMsg = "O título e o arquivo ".$nomeArquivo. " foram inseridos com sucesso!<br>"; 
            } else { 
                $statusMsg = "Erro ao realizar o upload do arquivo"; 
            }  
        } else { 
            $statusMsg = "Erro ao realizar o upload do arquivo"; 
        } 
    } else { 
        $statusMsg = 'Formato inválido.'; 
    } 
} else { 
    $statusMsg = 'Por favor, selecione um arquivo para fazer upload.'; 
} 

// Exibe a mensagem de status
echo $statusMsg;

// Exibe mensagem sobre a armazenamento de dados no banco de dados
echo "Dados sendo armazenados no banco de dados<br>";

// Verifica se houve inserção bem-sucedida no banco de dados
if (isset($insert) && $insert) {
    echo "<br>Registro armazenado com sucesso!<br>";
} else {
    echo "<br>Erro. Algo aconteceu. O Banco de Dados está ativo?";
}
?>

<a href="index.php">Retornar</a>