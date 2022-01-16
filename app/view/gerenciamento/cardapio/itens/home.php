<?php

require_once 'vendor/autoload.php';

$itemCardapioDAO = new \app\model\itens_cardapio\ItemCardapioDAO();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once '../../structure/head.php' ?>

    <title>Itens - Gerenciamento</title>
</head>

<body>
    <section class="container" style="height: 100vh">
        <h1 class="p-5 d-flex justify-content-center">
            Itens do cardápio
        </h1>
        <a href="../home.php" class="btn btn-light">Voltar</a>

        <a href="create.php" class="btn btn-success w-100 mb-3 mt-3">Cadastrar Item</a>

        <?php foreach ($itemCardapioDAO->readItemCardapio() as $key => $itemCardapio) { ?>
        <div class="card mb-3" style="position: inherit">
            <div class=" row g-0">
                <div class="col-md-4">
                    <img src="../../../../../assets/img/cardapio_itens/<?= $itemCardapio['imagem'] ?>"
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
                        <a href="update.php?id_update_itemcardapio=<?= $itemCardapio['item_id'] ?>"
                            class="btn btn-light">Editar</a>

                        <a href="../../../../controller/itens_cardapio/delete.php?id_delete_itemcardapio=<?= $itemCardapio['item_id'] ?>"
                            class="btn btn-danger">Apagar</a>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </section>
</body>

</html>