<?php

use app\model\Conexao;

require_once __DIR__ . "../../../../vendor/autoload.php";

$sql = "SELECT * FROM filial WHERE cidade LIKE '%" . $_POST['cidade'] . "%'";
$stmt = Conexao::getInstance()->prepare($sql);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $key => $item) {
        echo "
        <div class=\"card border-light mb-3 shadow-lg\" style=\"position: inherit\">
            <div class=\"row g-0\">
                <div class=\"col-md-4\" style=\"display: grid; place-items:center;\">
                    <img src=\"https://img.freepik.com/vetores-gratis/imagens-animadas-abstratas-neon-lines_23-2148344065.jpg?size=626&ext=jpg\"
                        class=\"img-fluid rounded\" alt=\"Imagem indisponível :(\">
                </div>
                <div class=\"col-md-8\">
                    <div class=\"card-body\">
                        <h5 class=\"card-title\">Bruxas Burger {$item['cidade']}</h5>
                        <h6 class=\"card-subtitle mb-2 text-muted\">
                            {$item['rua']} - {$item['numero']}, {$item['bairro']}
                        </h6>
                        <p class=\"card-text\">{$item['telefone']}</p>
                        <a href=\"https://api.whatsapp.com/send?phone={$item['telefone']}\" class=\"btn btn-success w-100\" style=\"position: inherit\">
                            <i class=\"bi bi-whatsapp\"></i> Chamar no Whatsapp
                        </a>
                    </div>
                </div>
            </div>
        </div>";
    }
} else {
    echo "Nada encontrado :(";
}