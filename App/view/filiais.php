<?php

require_once 'vendor/autoload.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'structure/head.php' ?>

    <title>
        Filiais - Bruxas Burger
    </title>
</head>

<body>
    <?php require_once 'structure/header.php' ?>

    <section class="container col-sm-12 col-md-5 col-lg-5">
        <h1 class="mt-4">Filiais</h1>

        <div class="w-100 d-flex align-items-center mb-3">
            <input type="text" class="form-control" id="search" placeholder="Pesquise sua cidade">
        </div>

        <div id="output"></div>
    </section>

    <?php require_once 'structure/footer.php' ?>

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Scripts -->
    <script src="assets/js/scripts.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        $("#search").keypress(function() {
            $.ajax({
                type: 'POST',
                url: '../controller/filiais/pesquisa.php',
                data: {
                    cidade: $("#search").val(),
                },
                success: function(data) {
                    $("#output").html(data);
                }
            });
        });
    });
    document.addEventListener("DOMContentLoaded", function() {
        $.ajax({
            type: 'POST',
            url: '../controller/filiais/pesquisa.php',
            data: {
                cidade: $("#search").val(),
            },
            success: function(data) {
                $("#output").html(data);
            }
        });
    });
    </script>
</body>

</html>