<?php
require_once __DIR__ . "../../../../vendor/autoload.php";

$categoria = new \app\model\categorias\Categoria($_POST['nome'], $_POST['icone']);

$categoriaDAO = new \app\model\categorias\CategoriaDAO();
$categoriaDAO->createCategoria($categoria);

header("location: ../../../gerenciamento/cardapio/categorias/home");