<?php
session_start();

$condicional = "update";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once '../structure/head.php'?>

    <title>Editar - Gerenciamento</title>
</head>

<body>
    <section class="container" style="height: 100vh">
        <h1 class="p-5 d-flex justify-content-center">
            Editar filial
        </h1>
        <a href="home" class="btn btn-light mb-3">Voltar</a>

        <?php require_once 'structure/form.php'?>
    </section>
</body>

</html>