<?php
session_start();

$condicional = "create";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once '../../structure/head.php'?>

    <title>Cadastro - Gerenciamento</title>
</head>

<body>
    <section class="container" style="height: 100vh">
        <h1 class="p-5 d-flex justify-content-center">
            Cadastro de Item
        </h1>
        <a href="home" class="btn btn-light mb-3">Voltar</a>
        <?php include 'structure/form.php'?>
    </section>
</body>

</html>