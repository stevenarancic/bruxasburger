<?php
require_once __DIR__ . "../../../../vendor/autoload.php";

$categoria = new \app\model\categorias\Categoria($_POST['nome'], $_POST['icone']);
$categoria->setId($_POST['id']);

$categoriaDAO = new \app\model\categorias\CategoriaDAO();
$categoriaDAO->updateCategoria($categoria);

header('location: /bruxasburger/gerenciamento/cardapio/categorias/');