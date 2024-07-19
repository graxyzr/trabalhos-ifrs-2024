<!-- app/Views/remedios/index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmácia</title>
    <link rel="stylesheet" href="<?= base_url("css/styles.css") ?>">
</head>
<body>
    <div class="container">
        <img src="<?= base_url("images/logo.png") ?>" alt="Logo"><br>

        <!-- Link para adicionar novo remédio -->
        <a href="<?= base_url(
            "remedios/create"
        ) ?>" class="btn btn-primary mb-3">Adicionar Novo Remédio</a><br>

        <!-- Formulário de pesquisa por nome -->
        <form action="<?= base_url(
            "remedios/search"
        ) ?>" method="post" class="form-inline">
            <label for="nome">Pesquisar por Nome:</label>
            <input type="text" id="nome" name="nome" required>
            <button type="submit" class="btn">Buscar</button>
        </form>

        <!-- Link para encontrar o remédio mais caro -->
        <br><a href="<?= base_url(
            "remedios/most_expensive"
        ) ?>" class="btn">Encontrar Remédio Mais Caro</a>

        <!-- Link para encontrar o remédio com maior quantidade -->
        <a href="<?= base_url(
            "remedios/most_quantity"
        ) ?>" class="btn">Encontrar Remédio com Maior Quantidade</a>

        <!-- Lista de remédios -->
        <?php if (!empty($remedios)): ?>
            <?php foreach ($remedios as $remedio): ?>
                <div class="remedio-item">
                    <strong><?= $remedio["nome"] ?></strong> - 
                    Laboratório: <?= $remedio["laboratorio"] ?> |
                    Preço: R$ <?= number_format(
                        $remedio["preco"],
                        2,
                        ",",
                        "."
                    ) ?> |
                    Quantidade: <?= $remedio["quantidade"] ?> |
                    <div class="remedio-actions">
                        <a href="<?= site_url(
                            "remedios/edit/" . $remedio["id"]
                        ) ?>" class="btn">Editar</a>
                        <form action="<?= site_url(
                            "remedios/delete/" . $remedio["id"]
                        ) ?>" method="post" onsubmit="return confirm('Tem certeza que deseja excluir este remédio?');" style="display: inline;">
                            <button type="submit" class="btn">Excluir</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Nenhum remédio encontrado.</p>
        <?php endif; ?>
    </div>
</body>
</html>