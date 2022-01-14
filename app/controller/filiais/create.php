<?php

use app\model\Conexao;

require_once __DIR__ . "../../../../vendor/autoload.php";

// criação do objeto filial
$filial = new \app\model\filiais\Filial($_POST['telefone'], $_POST['uf'], $_POST['cidade'], $_POST['bairro'], $_POST['rua'], $_POST['numero']);
$filialDAO = new \app\model\filiais\FilialDAO();

// cadastro da filial no banco
$filialDAO->createFilial($filial);
setcookie('ultimoIdFilial', Conexao::getInstance()->lastInsertId(), time() + (86400 * 30), "/"); // 86400 = 1 dia. Cookie que dura 1 mês.
$ultimoID = Conexao::getInstance()->lastInsertId();

$total = count($_FILES['upload']['name']);

// criando a pasta onde as pastas das imagens das filiais serão criadas.
if (!file_exists("../../../assets/img/filiais/")) {
    mkdir("../../../assets/img/filiais/", 0777, true);
}

// criando a pasta das imagens da filial cadastrada no momento
if (!file_exists("../../../assets/img/filiais/{$_POST['cidade']}")) {
    mkdir("../../../assets/img/filiais/{$_POST['cidade']}", 0777, true);
}

// loop para pegar todas as imagens enviadas para o cadastro
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