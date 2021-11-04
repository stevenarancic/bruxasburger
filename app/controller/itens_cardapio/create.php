<?php
require_once __DIR__ . "../../../../vendor/autoload.php";

// Cadastro de imagem
$nomeDaImagem = $_FILES['imagem_item_cardapio']['name'];
$caminhoAtualImagem = $_FILES['imagem_item_cardapio']['tmp_name'];
$caminhoSalvamentoImagem = "../../../assets/img/cardapio_itens/{$nomeDaImagem}";

move_uploaded_file($caminhoAtualImagem, $caminhoSalvamentoImagem);

// Criação do objeto
$itemCardapio = new \app\model\itens_cardapio\ItemCardapio($_POST['nome'], $_POST['descricao'], $_POST['select_categoria'], $nomeDaImagem);

// Cadastro do item em sí
$itemCardapioDAO = new \app\model\itens_cardapio\ItemCardapioDAO();
$itemCardapioDAO->createItemCardapio($itemCardapio);

header("location: ../../../gerenciamento/cardapio/itens/home");