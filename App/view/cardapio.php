<?php
session_start();

require_once '../../vendor/autoload.php';

$categoriaDAO = new \app\model\categorias\CategoriaDAO();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'structure/head.php'?>

    <title>
        Cardápio - Bruxas Burger
    </title>
</head>

<body>
    <?php require_once 'structure/header.php'?>

    <section class="container col-sm-12 col-md-5 col-lg-5">
        <h1 class="mt-4">Cardápio</h1>

        <div class="w-100 d-flex align-items-center mb-3">
            <input type="text" class="form-control" id="search_cardapio" placeholder="Pesquise por algum item">
            <select class="form-select ms-3" id="search_cardapio_categoria" onchange="jsfunction(this)"
                name="select_categoria">
                <option value="" selected>
                    Escolha uma categoria
                </option>
                <?php foreach ($categoriaDAO->readCategoria() as $key => $categoria) {?>
                <option value="<?=$categoria['nome']?>">
                    <?=$categoria['nome']?>&#<?=$categoria['icone']?>
                </option>
                <?php }?>
            </select>
        </div>

        <div id="output_cardapio"></div>
    </section>

    <?php require_once 'structure/footer.php'?>

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Scripts -->
    <script src="../../assets/js/scripts.js"></script>

    <!-- Pesquisa cardápio -->
    <script type="text/javascript">
    $(document).ready(function() {
        $("#search_cardapio").keypress(function() {
            $.ajax({
                type: 'POST',
                url: '../controller/itens_cardapio/pesquisa.php',
                data: {
                    item_cardapio: $("#search_cardapio").val(),
                },
                success: function(data) {
                    $("#output_cardapio").html(data);
                }
            });
        });
    });
    document.addEventListener("DOMContentLoaded", function() {
        $.ajax({
            type: 'POST',
            url: '../controller/itens_cardapio/pesquisa.php',
            data: {
                item_cardapio: $("#search_cardapio").val(),
            },
            success: function(data) {
                $("#output_cardapio").html(data);
            }
        });
    });
    </script>

    <!-- Pesquisa cardápio por categoria -->
    <script type="text/javascript">
    function jsfunction(sel) {
        texto = sel.options[sel.selectedIndex].value;
        $.ajax({
            type: 'POST',
            url: '../controller/itens_cardapio/pesquisa_por_categoria.php',
            data: {
                select_categoria: texto,
            },
            success: function(data) {
                $("#output_cardapio").html(data);
            }
        });
    }
    </script>
</body>

</html>