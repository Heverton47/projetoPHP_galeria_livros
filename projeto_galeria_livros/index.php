<?php
session_start();
require_once "dados.php";

if (isset($_SESSION['livros_adicionados'])) {
    $livros = array_merge($livros, $_SESSION['livros_adicionados']);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Galeria de Livros</title>
</head>
<body style="text-align: center;">

<?php include_once "cabecalho.php"; ?>

<h1 style="text-align: center; margin-top: 100px;">LIVROS</h1>

<div class="container">
    <div class="row">

        <?php 
            require_once "funcoes.php";
            mostrarLivros($livros);
         ?>

    </div>
</div>

<?php include_once "rodape.php"; ?>

</body>
</html>
