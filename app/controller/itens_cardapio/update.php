<?php
require_once __DIR__ . "../../../../vendor/autoload.php";

$itemCardapioDAO = new \app\model\itens_cardapio\ItemCardapioDAO();

$imagemBanco = $_POST['imagem'];
$imagemUpload = $_FILES['imagem_item_cardapio']['name'];

if ($imagemUpload == "") {
    $itemCardapio = new \app\model\itens_cardapio\ItemCardapio($_POST['nome'], $_POST['descricao'], $_POST['select_categoria'], $imagemBanco);
    $itemCardapio->setId($_POST['id']);
    $itemCardapioDAO->updateItemCardapio($itemCardapio);
}

if ($imagemUpload != "") {
    $itemCardapio = new \app\model\itens_cardapio\ItemCardapio($_POST['nome'], $_POST['descricao'], $_POST['select_categoria'], $imagemUpload);
    $itemCardapio->setId($_POST['id']);
    $itemCardapioDAO->updateImagemItemCardapio($imagemUpload);
    $itemCardapioDAO->updateItemCardapio($itemCardapio);
}

header("location: ../../../gerenciamento/cardapio/itens/home");