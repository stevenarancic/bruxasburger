<?php
session_start();

require_once '../../../../../vendor/autoload.php';

$condicional = "update";

$itemCardapioDAO = new \app\model\itens_cardapio\ItemCardapioDAO();
$categoriaDAO = new \app\model\categorias\CategoriaDAO();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once '../../structure/head.php' ?>

    <title>Editar - Gerenciamento</title>
</head>

<body>
    <section class="container" style="height: 100vh">
        <h1 class="p-5 d-flex justify-content-center">
            Editar Item
        </h1>
        <a href="home.php" class="btn btn-light mb-3">Voltar</a>
        <?php
        foreach ($itemCardapioDAO->filtrarItemCardapio($_GET['id_update_itemcardapio']) as $key => $itemCardapio) {
            include 'structure/form.php';
        }
        ?>
    </section>
</body>

</html>