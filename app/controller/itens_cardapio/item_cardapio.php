<div class="card shadow ms-3 me-3 mb-4 mt-4">
    <img src="assets/img/cardapio_itens/<?= $item['imagem'] ?>" class="card-img-top" alt="..."
        style="height: auto; object-fit: cover;">
    <div class="card-body">
        <h5 class="card-title"><?= $item['item_nome'] ?></h5>
        <h6 class="card-subtitle mb-2 text-muted">
            <?= $item['nome'] ?> &#<?= $item['icone'] ?>;
        </h6>
        <p class="card-text">
            <?= $item['descricao'] ?>
        </p>
    </div>
</div>