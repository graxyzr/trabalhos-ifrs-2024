<!-- Views/remedios/most_expensive.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remédio Mais Caro</title>
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/styles.css') ?>">
</head>
<body>
    <div class="container">
        <h2 class="mt-4 mb-4">Remédio Mais Caro</h2>

        <?php if (!empty($remedio)): ?>
            <div class="card">
                <div class="card-body">
                    <p class="card-text">Nome: <?= $remedio['nome'] ?></p>
                    <p class="card-text">Laboratório: <?= $remedio['laboratorio'] ?></p>
                    <p class="card-text">Preço: R$ <?= number_format($remedio['preco'], 2, ',', '.') ?></p>
                    <p class="card-text">Quantidade: <?= $remedio['quantidade'] ?></p>
                </div>
            </div>
        <?php else: ?>
            <div class="alert alert-warning mt-4" role="alert">
                Nenhum remédio encontrado.
            </div>
        <?php endif; ?>

        <a href="<?= site_url('remedios') ?>" class="btn btn-primary mt-4">Voltar</a>
    </div>

    <script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>
