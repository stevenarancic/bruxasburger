<?php
require_once __DIR__ . "../../../../vendor/autoload.php";

$categoriaDAO = new \app\model\categorias\CategoriaDAO();
$categoriaDAO->deleteCategoria($_GET['id_delete_categoria']);

header("location: ../../../gerenciamento/cardapio/categorias/home");