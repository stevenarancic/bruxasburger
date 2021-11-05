<?php

require_once __DIR__ . "../../../../vendor/autoload.php";

use app\model\Conexao;

$itemCardapioDAO = new \app\model\itens_cardapio\ItemCardapioDAO();

$itemCardapioDAO->deleteImagemItemCardapio($_GET['id_delete_itemcardapio']);
$itemCardapioDAO->deleteItemCardapio($_GET['id_delete_itemcardapio']);

header("location: ../../../gerenciamento/cardapio/itens/home");