<?php

require_once __DIR__ . "../../../../vendor/autoload.php";

use app\model\Conexao;

$itemCardapioDAO = new \app\model\itens_cardapio\ItemCardapioDAO();

$itemCardapioDAO->deleteImagemItemCardapio($id);
$itemCardapioDAO->deleteItemCardapio($id);

header('location: /bruxasburger/gerenciamento/cardapio/itens');