<?php
require_once __DIR__ . "../../../../vendor/autoload.php";

$itemCardapioDAO = new \app\model\itens_cardapio\ItemCardapioDAO();

if ($_POST['imagem'] == "" and $_FILES['imagem_item_cardapio']['name'] != "") {
    $itemCardapio = new \app\model\itens_cardapio\ItemCardapio($_POST['nome'], $_POST['descricao'], $_POST['select_categoria'], $_FILES['imagem_item_cardapio']['name']);
    $itemCardapio->setId($_POST['id']);
    $itemCardapioDAO->updateImagemItemCardapio($_FILES['imagem_item_cardapio']['name']);
    $itemCardapioDAO->updateItemCardapio($itemCardapio);
} else if ($_POST['imagem'] != "" and $_FILES['imagem_item_cardapio']['name'] == "") {
    $itemCardapio = new \app\model\itens_cardapio\ItemCardapio($_POST['nome'], $_POST['descricao'], $_POST['select_categoria'], $_POST['imagem']);
    $itemCardapio->setId($_POST['id']);
    $itemCardapioDAO->updateItemCardapio($itemCardapio);
} else if ($_POST['imagem'] != "" and $_FILES['imagem_item_cardapio']['name'] != "") {
    $itemCardapio = new \app\model\itens_cardapio\ItemCardapio($_POST['nome'], $_POST['descricao'], $_POST['select_categoria'], $_FILES['imagem_item_cardapio']['name']);
    $itemCardapio->setId($_POST['id']);
    $itemCardapioDAO->updateImagemItemCardapio($_FILES['imagem_item_cardapio']['name']);
    $itemCardapioDAO->updateItemCardapio($itemCardapio);
}

header("location: ../../../gerenciamento/cardapio/itens/home");