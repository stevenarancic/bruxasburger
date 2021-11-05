<?php

require_once __DIR__ . "../../../../vendor/autoload.php";

use app\model\Conexao;

$itemCardapioDAO = new \app\model\itens_cardapio\ItemCardapioDAO();

$sql = "SELECT imagem FROM cardapio_item WHERE id = {$_GET['id_delete_itemcardapio']}";

$stmt = Conexao::getInstance()->prepare($sql);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    foreach ($stmt->fetchAll(\PDO::FETCH_ASSOC) as $key => $item) {
        unlink("../../../assets/img/cardapio_itens/{$item['imagem']}");
    }
} else {
    return "Item não encontrado :(";
}

$itemCardapioDAO->deleteItemCardapio($_GET['id_delete_itemcardapio']);

header("location: ../../../gerenciamento/cardapio/itens/home");