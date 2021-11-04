<?php

require_once __DIR__ . "../../../../vendor/autoload.php";

$itemCardapioDAO = new \app\model\itens_cardapio\ItemCardapioDAO();

// Cadastro de imagem
$itemCardapioDAO->createImagemItemCardapio($_FILES['imagem_item_cardapio']['name'], $_FILES['imagem_item_cardapio']['tmp_name']);

// Criação do objeto
$itemCardapio = new \app\model\itens_cardapio\ItemCardapio($_POST['nome'], $_POST['descricao'], $_POST['select_categoria'], $_FILES['imagem_item_cardapio']['name']);

// Cadastro do item em sí
$itemCardapioDAO->createItemCardapio($itemCardapio);

header("location: ../../../gerenciamento/cardapio/itens/home");