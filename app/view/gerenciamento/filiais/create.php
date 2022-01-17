<?php

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
            Cadastro de filial
        </h1>
        <a href="/bruxasburger/gerenciamento/filiais" class="btn btn-light mb-3">Voltar</a>

        <?php require_once 'app/view/gerenciamento/filiais/structure/form.php' ?>
    </section>
</body>

</html>