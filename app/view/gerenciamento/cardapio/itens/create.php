<?php

require_once 'vendor/autoload.php';

$categoriaDAO = new \app\model\categorias\CategoriaDAO();
$condicional = "create";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'app/view/gerenciamento/structure/head.php' ?>

    <title>Cadastro - Gerenciamento</title>
</head>

<body>
    <section class="container" style="height: 100vh">
        <h1 class="p-5 d-flex justify-content-center">
            Cadastro de Item
        </h1>
        <a href="/bruxasburger/gerenciamento/cardapio/itens" class="btn btn-light mb-3">Voltar</a>
        <?php include 'app/view/gerenciamento/cardapio/itens/structure/form.php' ?>
    </section>
</body>

</html>