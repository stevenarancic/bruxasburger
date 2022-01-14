<?php
session_start();

require_once '../../../../../vendor/autoload.php';

$condicional = "update";

$itemCardapioDAO = new \app\model\itens_cardapio\ItemCardapioDAO();
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
        foreach ($itemCardapioDAO->filtrarItemCardapio($_GET['id']) as $key => $value) {
            include 'structure/form.php';
        }
        ?>
    </section>
</body>

</html>