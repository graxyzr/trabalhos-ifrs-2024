<!-- app/Views/remedios/edit.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Remédio</title>
    <link rel="stylesheet" href="<?= base_url("css/bootstrap.min.css") ?>">
    <link rel="stylesheet" href="<?= base_url("css/styles.css") ?>">
</head>
<body>
    <div class="container">
        <h2 class="mt-4 mb-4">Editar Remédio</h2>

        <form action="<?= site_url(
            "remedios/update/" . $remedio["id"]
        ) ?>" method="post" class="mb-4">
            <div class="mb-3">
                <strong><label for="nome" class="form-label">Nome</label></strong>
                <input type="text" class="form-control" id="nome" name="nome" value="<?= old(
                    "nome",
                    $remedio["nome"]
                ) ?>">
            </div><br>
            <div class="mb-3">
                <strong><label for="laboratorio" class="form-label">Laboratório</label></strong>
                <input type="text" class="form-control" id="laboratorio" name="laboratorio" value="<?= old(
                    "laboratorio",
                    $remedio["laboratorio"]
                ) ?>">
            </div><br>
            <div class="mb-3">
                <strong><label for="preco" class="form-label">Preço</label></strong>
                <input type="text" class="form-control" id="preco" name="preco" value="<?= old(
                    "preco",
                    $remedio["preco"]
                ) ?>">
            </div><br>
            <div class="mb-3">
                <strong><label for="quantidade" class="form-label">Quantidade</label></strong>
                <input type="text" class="form-control" id="quantidade" name="quantidade" value="<?= old(
                    "quantidade",
                    $remedio["quantidade"]
                ) ?>">
            </div><br>
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            <a href="<?= site_url(
                "remedios"
            ) ?>" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <script src="<?= base_url("js/bootstrap.bundle.min.js") ?>"></script>
</body>
</html>