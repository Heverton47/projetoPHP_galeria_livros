<?php include_once "dados.php"; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Galeria de Livros</title>
</head>
<body>

<h1>GALERIA DE LIVROS</h1>

<div class="container"></div>
<div class="row">

<?php foreach($livros as $livro):?>
<div class="col-12 col-md-4 mb-4">
<div class="card h-100">

    <div class="card-body">
    <img src="<?= $livro['imagem'] ?>" style="height:200px; object-fit:cover;">
    <h3> <?= $livro['titulo'] ?> </h3>
    <h3> <?= $livro['categoria'] ?> </h3>
    
    <a href="detalhes.php?id=<?= $livro['id'] ?>" class="btn btn-primary"> Ver mais </a>
    </div>

</div>
</div>
<?php endforeach; ?>

</div>
</div>

</body>
</html>