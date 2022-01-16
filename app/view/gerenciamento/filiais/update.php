<?php
session_start();

require_once 'vendor/autoload.php';

$condicional = "update";

$filialDAO = new \app\model\filiais\FilialDAO();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'app/view/gerenciamento/structure/head.php' ?>

    <title>Editar - Gerenciamento</title>
</head>

<body>
    <section class="container" style="height: 100vh">
        <h1 class="p-5 d-flex justify-content-center">
            Editar filial
        </h1>
        <a href="home" class="btn btn-light mb-3">Voltar</a>

        <?php
        foreach ($filialDAO->filtrarFilial($_GET['id']) as $key => $filial) {
            require_once 'app/view/gerenciamento/structure/form.php';
        } ?>
    </section>
</body>

</html>