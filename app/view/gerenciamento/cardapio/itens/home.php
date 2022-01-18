<?php

require_once 'vendor/autoload.php';

$itemCardapioDAO = new \app\model\itens_cardapio\ItemCardapioDAO();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'app/view/gerenciamento/structure/head.php' ?>

    <title>Itens - Gerenciamento</title>
</head>

<body>
    <section class="container" style="height: 100vh">
        <h1 class="p-5 d-flex justify-content-center">
            Itens do cardápio
        </h1>
        <a href="/bruxasburger/gerenciamento/cardapio" class="btn btn-light">Voltar</a>

        <a href="/bruxasburger/gerenciamento/cardapio/itens/create" class="btn btn-success w-100 mb-3 mt-3">Cadastrar
            Item</a>

        <?php foreach ($itemCardapioDAO->readItemCardapio() as $key => $itemCardapio) { ?>
        <div class="card mb-3" style="position: inherit">
            <div class=" row g-0">
                <div class="col-md-4">
                    <img src="/bruxasburger/assets/img/cardapio_itens/<?= $itemCardapio['imagem'] ?>"
                        class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-header bg-danger text-white" style="font-weight: bold;">
                        <?= $itemCardapio['nome'] ?> &#<?= $itemCardapio['icone'] ?>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">
                            <?= $itemCardapio['item_nome'] ?>
                        </h4>
                        <p class="card-text">
                            <?= $itemCardapio['descricao'] ?>
                        </p>
                        <a href="/bruxasburger/gerenciamento/cardapio/itens/update/<?= $itemCardapio['item_id'] ?>"
                            class="btn btn-light">Editar</a>
                        <a href="/bruxasburger/controller/itens_cardapio/delete/<?= $itemCardapio['item_id'] ?>"
                            class="btn btn-danger">Apagar</a>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </section>
</body>

</html>