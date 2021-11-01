<?php
require_once __DIR__ . "../../../../vendor/autoload.php";

$itemCardapioDAO = new \app\model\itens_cardapio\ItemCardapioDAO();
$itemCardapioDAO->deleteItemCardapio($_GET['id_delete_itemcardapio']);

header("location: ../../../gerenciamento/cardapio/itens/home");