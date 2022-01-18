<?php

require_once __DIR__ . "../../../../vendor/autoload.php";

$itemCardapioDAO = new \app\model\itens_cardapio\ItemCardapioDAO();

// criando a pasta onde as pastas das imagens das filiais serão criadas.
if (!file_exists(__DIR__ . "../../../../assets/img/filiais/")) {
    mkdir(__DIR__ . "../../../../assets/img/filiais/", 0777, true);
}

// Cadastro de imagem
if ($itemCardapioDAO->createImagemItemCardapio($_FILES['imagem_item_cardapio']['name'], $_FILES['imagem_item_cardapio']['tmp_name'])) {
    echo 'true';
} else {
    echo 'false';
}

// Criação do objeto
$itemCardapio = new \app\model\itens_cardapio\ItemCardapio($_POST['nome'], $_POST['descricao'], $_POST['select_categoria'], $_FILES['imagem_item_cardapio']['name']);

// Cadastro do item em sí
// $itemCardapioDAO->createItemCardapio($itemCardapio);

// header('location: /bruxasburger/gerenciamento/cardapio/itens');