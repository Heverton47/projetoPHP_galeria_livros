<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$todos_livros = $livros_cabecalho ?? ($livros ?? []);

if (isset($_SESSION['livros_adicionados'])) {
    $todos_livros = array_merge($todos_livros, $_SESSION['livros_adicionados']);
}

$categorias = [];

foreach ($todos_livros as $livro) {
    if (isset($livro['categoria'])) {
        $categorias[] = $livro['categoria'];
    }
}

$categorias = array_unique($categorias);
sort($categorias);
?>

<header class="bg-dark text-white p-3" style="display:block; position:fixed; width:100%; top:0; left:0; z-index:1000;">
<div style="display:flex; flex-direction: row; align-items:center; justify-content:space-between; gap:20px;">   
    <div>
        <?php if (isset($_SESSION['usuario'])): ?>
            <a href="protegido.php" class="btn btn-primary btn-lg">CADASTRAR</a>
            <a href="login.php?logout=1" class="btn btn-danger btn-lg">LOGOUT</a>
        <?php else: ?>
            <a href="login.php" class="btn btn-primary btn-lg">LOGIN</a>
        <?php endif; ?>
    </div>    

        <h1>   GALERIA DE LIVROS</h1>

    <div>
        <form action="filtrar.php" method="get">
            <label for="filtro">Filtrar por categoria:</label>
            <select name="categoria" id="filtro">
                <option value="">Todas</option>
                <?php foreach ($categorias as $categoria): ?>
                    <option value="<?= htmlspecialchars($categoria) ?>">
                        <?= htmlspecialchars($categoria) ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <button type="submit" class="btn btn-primary btn-lg">Buscar</button>
        </form>
    </div>
</div>    
</header>
