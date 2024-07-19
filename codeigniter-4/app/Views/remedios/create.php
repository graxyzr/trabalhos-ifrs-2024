<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Novo Remédio</title>
    <link rel="stylesheet" href="<?= base_url("css/bootstrap.min.css") ?>">
    <link rel="stylesheet" href="<?= base_url("css/styles.css") ?>">
</head>
<body>
    <div class="container">
        <h2 class="mt-4 mb-4">Adicionar Novo Remédio</h2>
        <form action="<?= site_url(
            "remedios/store"
        ) ?>" method="post" class="mb-4">
            <div class="form-group">
                <strong><label for="nome">Nome</label></strong>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div><br>
            <div class="form-group">
                <strong><label for="laboratorio">Laboratório</label></strong>
                <input type="text" class="form-control" id="laboratorio" name="laboratorio" required>
            </div><br>
            <div class="form-group">
                <strong><label for="preco">Preço</label></strong>
                <input type="text" class="form-control" id="preco" name="preco" required>
            </div><br>
            <div class="form-group">
                <strong><label for="quantidade">Quantidade</label></strong>
                <input type="number" class="form-control" id="quantidade" name="quantidade" required>
            </div><br>
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="<?= site_url(
                "remedios"
            ) ?>" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>