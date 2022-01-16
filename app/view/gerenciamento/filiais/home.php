<?php

require_once 'vendor/autoload.php';

$filialDAO = new \app\model\filiais\FilialDAO();
$imagemFilialDAO = new \app\model\filiais\ImagemFilialDAO();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'app/view/structure/head.php' ?>

    <title>Filiais - Gerenciamento</title>
</head>

<body>
    <section class="container" style="height: 100vh">
        <h1 class="p-5 d-flex justify-content-center">
            Gerenciamento de Filiais
        </h1>
        <a href="../index.php" class="btn btn-light">Voltar</a>
        <a href="create.php" class="btn btn-success w-100 mb-3">Cadastrar filial</a>

        <?php foreach ($filialDAO->readFilial() as $key => $filial) { ?>
        <div class="card border-light mb-3 shadow-lg">
            <div class="row g-0">
                <div class="col-md-4">
                    <?php
                        foreach ($imagemFilialDAO->filtrarPorFilial($filial['id']) as $key => $itemImagem) {
                            if ($key == 0) { ?>
                    <img src="../../../../assets/img/filiais/<?= $filial['cidade'] ?>/<?= $itemImagem['nome'] ?>"
                        class="img-fluid rounded" style="height: 12rem; width: 100%; object-fit: cover" alt=""
                        data-bs-toggle="modal" data-bs-target="#exampleModal<?= $filial['id'] ?>">
                    <?php
                            }
                        } ?>

                    <div class="modal fade" id="exampleModal<?= $filial['id'] ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <?php foreach ($imagemFilialDAO->filtrarPorFilial($filial['id']) as $key => $itemImagem) { ?>
                                    <img src="../../../../assets/img/filiais/<?= $filial['cidade'] ?>/<?= $itemImagem['nome'] ?>"
                                        class="img-fluid rounded" alt="Imagem indisponível :("
                                        style="height: 100%; width: 100%; object-fit: cover">
                                    <a href="../../../controller/filiais/deleteImagem.php?id_imagem=<?= $itemImagem['id'] ?>&filial=<?= $filial['cidade'] ?>"
                                        class="mt-2 btn btn-danger mb-3"><i class="bi bi-trash"></i> Apagar</a>
                                    <?php } ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Bruxas Burger <?= $filial['cidade'] ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted">
                            <?= $filial['rua'] ?> - <?= $filial['numero'] ?>, <?= $filial['bairro'] ?>
                        </h6>
                        <p class="card-text"><?= $filial['telefone'] ?></p>
                        <a href="update.php?id=<?= $filial['id'] ?>" class="btn btn-light">Editar</a>
                        <a href="../../../controller/filiais/delete.php?id_delete=<?= $filial['id'] ?>&nomeFilial=<?= $filial['cidade'] ?>"
                            class="btn btn-danger">Apagar</a>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </section>
</body>

</html>