<?php
session_start();
require_once "dados.php";

if (isset($_SESSION['livros_adicionados'])) {
    $livros = array_merge($livros, $_SESSION['livros_adicionados']);
}

$livros_cabecalho = $livros;
$categoria_filtrada = "";

if (isset($_GET['categoria'])) {
    $categoria_filtrada = $_GET['categoria'];
}

if ($categoria_filtrada !== "") {
    $livros_filtrados = [];

    foreach ($livros as $livro) {
        if ($livro['categoria'] === $categoria_filtrada) {
            $livros_filtrados[] = $livro;
        }
    }

    $livros = $livros_filtrados;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Filtrar Livros</title>
</head>
<body style="text-align: center;">

<?php include_once "cabecalho.php"; ?>

<h1 style="text-align: center; margin-top: 100px;">LIVROS</h1>

<?php if ($categoria_filtrada !== ""): ?>
    <h2>Categoria: <?= htmlspecialchars($categoria_filtrada) ?></h2>
<?php endif; ?>

<div class="container">
    <div class="row">
        <?php if (count($livros) > 0): ?>
            <?php include "funcoes.php"; ?>
        <?php else: ?>
            <p>Nenhum livro encontrado.</p>
        <?php endif; ?>
    </div>
</div>

<?php include_once "rodape.php"; ?>

</body>
</html>
