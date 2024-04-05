<?php
// Obtém os dados do formulário POST
$titulo = $_POST["titulo_edit"];
$diretor = $_POST["diretor_edit"];
$genero = $_POST["genero_edit"];
$id_atualizacao = $_POST["id_atualizacao"];
$diretorio = "uploads/";

// Verifica se o formulário foi submetido
if(isset($_POST["submit"])) { 

    // Conexão com o Banco de Dados
    $conexao = mysqli_connect("127.0.0.1","root","","crud_filmes");

    // Verifica se um arquivo de imagem foi enviado
    if(!empty($_FILES["imagem_edit"]["name"])) { 
        // Obtém o nome do arquivo enviado no campo de upload de imagem do formulário
        $nome_arquivo = basename($_FILES["imagem_edit"]["name"]);
    
        // Modifica o nome do arquivo para incluir a data e hora atual
        $nome_arquivo_modificado = date("YmdHis").$nome_arquivo;
    
        // Define os caminhos do arquivo
        $caminho_arquivo = $diretorio . $nome_arquivo ; 
        // Obtém a extensão do arquivo a partir do caminho do arquivo especificado
        $tipo_arquivo = pathinfo($caminho_arquivo, PATHINFO_EXTENSION);
        // Define o caminho completo para o arquivo modificado no diretório de upload, usando o nome do arquivo modificado
        $caminho_arquivo_alvo = $diretorio.$nome_arquivo_modificado; 

        // Tipos de arquivo permitidos
        $tipos_permitidos = array('jpg','png','jpeg','gif'); 

        // Verifica se o tipo de arquivo enviado é permitido
        if(in_array($tipo_arquivo, $tipos_permitidos)) { 
            // Move o arquivo para o diretório de uploads
            if(move_uploaded_file($_FILES["imagem_edit"]["tmp_name"], $caminho_arquivo_alvo)) { 
                // Atualiza os dados do filme no banco de dados, incluindo o nome do arquivo modificado
                $query = "UPDATE filmes SET titulo='$titulo', diretor='$diretor', genero='$genero', imagem ='$nome_arquivo_modificado' WHERE id=$id_atualizacao";
                $inserir = mysqli_query($conexao,$query); 
                if($inserir) { 
                    $mensagem = "O nome e o arquivo ".$nome_arquivo. " foram atualizados com sucesso!<br>"; 
                } else { 
                    $mensagem = "Erro ao realizar o upload do arquivo"; 
                }  
            } else { 
                $mensagem = "Erro ao realizar o upload do arquivo"; 
            } 
        } else { 
            $mensagem = 'Formato inválido.'; 
        } 
    } else { 
        // Se nenhum arquivo de imagem foi enviado, apenas atualiza os dados do filme no banco de dados
        $query = "UPDATE filmes SET titulo='$titulo', diretor='$diretor', genero='$genero' WHERE id=$id_atualizacao";
        $inserir = mysqli_query($conexao, $query); 
        if($inserir) { 
            $mensagem = "Informações atualizadas com sucesso!"; 
        } else { 
            $mensagem = "Erro ao atualizar as informações"; 
        }  
    }
}

// Exibe a mensagem resultante do processo de atualização
echo $mensagem;
?>

<br><a href="index.php">Retornar</a>