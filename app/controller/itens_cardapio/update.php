<?php
require_once __DIR__ . "../../../../vendor/autoload.php";

$itemCardapioDAO = new \app\model\itens_cardapio\ItemCardapioDAO();

$itemCardapio = new \app\model\itens_cardapio\ItemCardapio($_POST['nome'], $_POST['descricao'], $_POST['select_categoria'], $_FILES['imagem_item_cardapio']['name']);
$itemCardapio->setId($_POST['id']);

$nomeImagem = $_FILES['imagem_item_cardapio']['name'];

$itemCardapioDAO->updateImagemItemCardapio($nomeImagem);

$itemCardapioDAO->updateItemCardapio($itemCardapio);

header("location: ../../../gerenciamento/cardapio/itens/home");