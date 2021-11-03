<?php

use app\model\Conexao;

require_once __DIR__ . "../../../../vendor/autoload.php";

$sql = "SELECT * FROM cardapio_item INNER JOIN cardapio_categoria ON cardapio_item.categoria_id = cardapio_categoria.id WHERE cardapio_categoria.nome LIKE '%{$_POST['select_categoria']}%'";
$stmt = Conexao::getInstance()->prepare($sql);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $key => $item) {
        echo "
        <div class=\"card mb-3\" style=\"position: inherit\">
            <div class=\" row g-0\">
                <div class=\"col-md-4\">
                    <img src=\"https://acarnequeomundoprefere.com.br/uploads/media/image/frimesa-receita-hamburguer-suino_smlr.jpg\"
                        class=\"img-fluid rounded-start\" alt=\"...\">
                </div>
                <div class=\"col-md-8\">
                    <div class=\"card-header\">
                        Hambúrguer
                    </div>
                    <div class=\"card-body\">
                        <h5 class=\"card-title\">{$item['nome']}</h5>
                        <p class=\"card-text\">{$item['descricao']}.</p>
                    </div>
                </div>
            </div>
        </div>";
    }
} else {
    echo "{$_POST['select_categoria']}";
}