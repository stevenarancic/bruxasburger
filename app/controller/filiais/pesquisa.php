<?php

use app\model\Conexao;

require_once __DIR__ . "../../../../vendor/autoload.php";

$sql = "SELECT * FROM filial WHERE cidade LIKE '%" . $_POST['cidade'] . "%'";
$stmt = Conexao::getInstance()->prepare($sql);
$stmt->execute();

$imagemFilialDAO = new \app\model\filiais\ImagemFilialDAO();

if ($stmt->rowCount() > 0) {
    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $key => $item) {
        echo "
        <div class=\"card border-light mb-3 shadow-lg\" style=\"position: inherit\">
            <div class=\"row g-0\">
                <div class=\"col-md-4\" style=\"display: grid; place-items:center;\">"
        ;

        foreach ($imagemFilialDAO->filtrarPorFilial($item['id']) as $key => $itemImagem) {
            if ($key == 0) {
                echo "
                <img src=\"assets/img/filiais/{$item['cidade']}/{$itemImagem['nome']}\" class=\"img-fluid rounded\" data-bs-toggle=\"modal\" data-bs-target=\"#exampleModal{$item['id']}\"  style=\"height: 10.7rem; width: 100%; object-fit: cover\">";
            }
        }

        echo "
        <!-- Modal -->
        <div class=\"modal fade\" id=\"exampleModal{$item['id']}\" tabindex=\"-1\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">
            <div class=\"modal-dialog modal-dialog-scrollable modal-dialog-centered\">
                <div class=\"modal-content\">
                    <div class=\"modal-body\">";
        foreach ($imagemFilialDAO->filtrarPorFilial($item['id']) as $key => $itemImagem) {
            echo "<img src=\"assets/img/filiais/{$item['cidade']}/{$itemImagem['nome']}\"
                        class=\"img-fluid rounded mb-3\" alt=\"Imagem indisponível :(\" style=\"height: 100%; width: 100%; object-fit: cover\">";
        }
        echo "</div>
                    <div class=\"modal-footer\">
                        <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Fechar</button>
                    </div>
                </div>
            </div>
        </div>";

        echo "</div>
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