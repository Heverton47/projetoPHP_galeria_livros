<?php
session_start();
require_once "dados.php";

if (isset($_SESSION['livros_adicionados'])) {
    $livros = array_merge($livros, $_SESSION['livros_adicionados']);
}

$livro_encontrado = null;

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    foreach ($livros as $livro) {
        if ($livro['id'] == $_GET['id']) {
            $livro_encontrado = $livro;
            break;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Detalhes do Livro</title>
</head>
<body style="text-align: center;">

<?php include_once "cabecalho.php"; ?>

<div class="container" style="margin-top: 120px;">
    <?php if ($livro_encontrado): ?>
        <img src="<?= htmlspecialchars($livro_encontrado['imagem']) ?>" style="height:400px; object-fit:cover;">
        <h1><?= htmlspecialchars($livro_encontrado['titulo']) ?></h1>
        <h3><?= htmlspecialchars($livro_encontrado['categoria']) ?></h3>
        <p><?= htmlspecialchars($livro_encontrado['descricao']) ?></p>
    <?php else: ?>
        <h1>Livro não encontrado</h1>
    <?php endif; ?>

    <a href="index.php" class="btn btn-primary btn-lg mb-4">Voltar</a>
</div>

<?php include_once "rodape.php"; ?>

</body>
</html>
