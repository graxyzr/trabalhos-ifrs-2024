<?php

session_start();    // Iniciando uma sessão existente

if (!isset($_SESSION['tasks'])) {    // Verifica se a variável de sessão 'tasks' não está definida. Se não estiver definida, inicializa-a como um array vazio
    $_SESSION['tasks'] = array();
}

if (isset($_GET['task_name'])) {    // Verifica se foi enviado um parâmetro chamado 'task_name' via método GET. Se existir, adiciona o valor desse parâmetro ao final do array 'tasks' na sessão e então remove o parâmetro 'task_name' do array $_GET
    array_push($_SESSION['tasks'], $_GET['task_name']);
    unset($_GET['task_name']);
}

if (isset($_GET['clear'])) {    // Verifica se foi enviado um parâmetro chamado 'clear' via método GET. Se existir, remove completamente a variável 'tasks' da sessão
    unset($_SESSION['tasks']);
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <title>Gerenciador de Tarefas</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Gerenciador de Tarefas</h1>
        </div>
        <div class="form">
            <form action="" method="get">
                <label for="task_name">Tarefa:</label>
                <input type="text" name="task_name" placeholder="Nome da Tarefa">
                <button type="submit">Cadastrar</button>
            </form>
        </div>
        <div class="separator">
        </div>
        <div class="list-tasks">
            <?php
                if (isset($_SESSION['tasks'])) {    // Verifica se a variável de sessão 'tasks' está definida
                    echo "<ul>";    // Se estiver definida, começa a impressão de uma lista não ordenada HTML

                    foreach($_SESSION['tasks'] as $key => $task) {    // Itera sobre cada elemento da array 'tasks'
                        echo "<li>$task</li>";    // Imprime um item de lista HTML para cada tarefa
                    }

                    echo "</ul>";    // Finaliza a lista não ordenada HTML
                }
            ?>

            <form action="" method="get">
                <input type="hidden" name="clear" value="clear">
                <button type="submit" class="btn-clear">Limpar Tarefas</button>
            </form>
            <ul>
                <li>Tarefa 1</li>
                <li>Tarefa 2</li>
                <li>Tarefa 3</li>
            </ul>
        </div>
        <div class="footer">
            <p>Desenvolvido por @graxyzr</p>
        </div>
    </div>
</body>
</html>
