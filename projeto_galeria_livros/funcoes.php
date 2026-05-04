<?php foreach($livros as $livro):?>
<div class="col-12 col-md-4 mb-4">
<div class="card h-100">

    <div class="card-body" style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
    <img src="<?= $livro['imagem'] ?>" style="height:400px; object-fit:cover;">
    <h3> <?= $livro['titulo'] ?> </h3>
    <h3> <?= $livro['categoria'] ?> </h3>
    
    <a href="detalhes.php?id=<?= $livro['id'] ?>" class="btn btn-primary btn-lg"> Ver mais </a>
    </div>

</div>
</div>
<?php endforeach; ?>
