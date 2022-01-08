<?php

use app\model\Conexao;

require_once __DIR__ . "../../../../vendor/autoload.php";

$filial = new \app\model\filiais\Filial($_POST['telefone'], $_POST['uf'], $_POST['cidade'], $_POST['bairro'], $_POST['rua'], $_POST['numero']);
$filialDAO = new \app\model\filiais\FilialDAO();

$filialDAO->createFilial($filial);
setcookie('ultimoIdFilial', Conexao::getInstance()->lastInsertId(), time() + (86400 * 30), "/"); // 86400 = 1 dia. Cookie que dura 1 mês.
$ultimoID = Conexao::getInstance()->lastInsertId();

$total = count($_FILES['upload']['name']);

if (!file_exists("../../../assets/img/filiais/{$_POST['cidade']}")) {
    mkdir("../../../assets/img/filiais/{$_POST['cidade']}", 0777, true);
}

for ($i = 0; $i < $total; $i++) {
    $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

    if ($tmpFilePath != "") {
        $newFilePath = "../../../assets/img/filiais/{$_POST['cidade']}/" . $_FILES['upload']['name'][$i];

        move_uploaded_file($tmpFilePath, $newFilePath);
    }

    $imagemFilial = new \app\model\filiais\ImagemFilial($ultimoID, $_FILES['upload']['name'][$i]);

    $imagemFilialDAO = new \app\model\filiais\ImagemFilialDAO();
    $imagemFilialDAO->createImagemFilial($imagemFilial);
}

header('location: ../../view/gerenciamento/filiais/home.php');