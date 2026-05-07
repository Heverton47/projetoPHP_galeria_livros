<?php
session_start();
require_once "dados.php";

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

$mensagem = "";

if (!isset($_SESSION['livros_adicionados'])) {
    $_SESSION['livros_adicionados'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'] ?? "";
    $categoria = $_POST['categoria'] ?? "";
    $imagem = $_POST['imagem'] ?? "";
    $descricao = $_POST['descricao'] ?? "";

    if ($titulo !== "" && $categoria !== "" && $imagem !== "" && $descricao !== "") {
        $novo_livro = [
            "id" => count($livros) + count($_SESSION['livros_adicionados']) + 1,
            "titulo" => $titulo,
            "categoria" => $categoria,
            "imagem" => $imagem,
            "descricao" => $descricao
        ];

        $_SESSION['livros_adicionados'][] = $novo_livro;
        $mensagem = "Livro cadastrado com sucesso.";
    } else {
        $mensagem = "Preencha todos os campos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Área Protegida</title>
</head>
<body style="text-align: center;">

<?php include_once "cabecalho.php"; ?>

<div class="container" style="margin-top: 120px; max-width: 700px;">
    <h1>Cadastrar Livro</h1>

    <?php if ($mensagem !== ""): ?>
        <p><?= htmlspecialchars($mensagem) ?></p>
    <?php endif; ?>

    <form method="post" action="protegido.php">
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" id="titulo" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="categoria" class="form-label">Categoria</label>
            <input type="text" name="categoria" id="categoria" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="imagem" class="form-label">Imagem</label>
            <input type="text" name="imagem" id="imagem" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary btn-lg">Cadastrar</button>
        <a href="index.php" class="btn btn-secondary btn-lg">Ver livros</a>
    </form>
</div>

<?php include_once "rodape.php"; ?>

</body>
</html>
