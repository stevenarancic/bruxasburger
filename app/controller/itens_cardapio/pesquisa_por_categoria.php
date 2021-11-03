<?php

use app\model\Conexao;

require_once __DIR__ . "../../../../vendor/autoload.php";

$sql = "SELECT *, item.nome as item_nome FROM cardapio_item as item INNER JOIN cardapio_categoria as categoria ON item.categoria_id = categoria.id WHERE categoria.nome LIKE '%{$_POST['select_categoria']}%'";
$stmt = Conexao::getInstance()->prepare($sql);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $key => $item) {
        include "item_cardapio.php";
    }
} else {
    echo "Nada encontrado :(";
}