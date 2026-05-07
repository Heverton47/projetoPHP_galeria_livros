<?php
session_start();

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit;
}

$erro = "";
$usuario_correto = "admin";
$senha_correta = password_hash("123456", PASSWORD_DEFAULT);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? "";
    $senha = $_POST['senha'] ?? "";

    if ($usuario === $usuario_correto && password_verify($senha, $senha_correta)) {
        $_SESSION['usuario'] = $usuario;
        header("Location: protegido.php");
        exit;
    } else {
        $erro = "Usuário ou senha inválidos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
</head>
<body style="text-align: center;">

<?php require_once "dados.php"; ?>
<?php include_once "cabecalho.php"; ?>

<div class="container" style="margin-top: 120px; max-width: 500px;">
    <h1>Login</h1>

    <?php if ($erro !== ""): ?>
        <p class="text-danger"><?= htmlspecialchars($erro) ?></p>
    <?php endif; ?>

    <form method="post" action="login.php">
        <div class="mb-3">
            <label for="usuario" class="form-label">Usuário</label>
            <input type="text" name="usuario" id="usuario" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" name="senha" id="senha" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary btn-lg">Entrar</button>
    </form>
</div>

<?php include_once "rodape.php"; ?>

</body>
</html>
