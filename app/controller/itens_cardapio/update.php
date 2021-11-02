<?php
require_once __DIR__ . "../../../../vendor/autoload.php";

$itemCardapio = new \app\model\itens_cardapio\ItemCardapio($_POST['nome'], $_POST['descricao']);
$itemCardapio->setId($_POST['id']);

$itemCardapioDAO = new \app\model\itens_cardapio\ItemCardapioDAO();
$itemCardapioDAO->updateItemCardapio($itemCardapio);

header("location: ../../../gerenciamento/cardapio/itens/home");