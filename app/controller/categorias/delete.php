<?php
require_once __DIR__ . "../../../../vendor/autoload.php";

$categoriaDAO = new \app\model\categorias\CategoriaDAO();
$categoriaDAO->deleteCategoria($id);

header('location: /bruxasburger/gerenciamento/cardapio/categorias/');