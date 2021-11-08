<?php

use app\model\Conexao;

require_once __DIR__ . "../../../../vendor/autoload.php";

$filial = new \app\model\filiais\Filial($_POST['telefone'], $_POST['uf'], $_POST['cidade'], $_POST['bairro'], $_POST['rua'], $_POST['numero']);
$filialDAO = new \app\model\filiais\FilialDAO();

$filialDAO->createFilial($filial);
setcookie('ultimoIdFilial', Conexao::getInstance()->lastInsertId(), time() + (86400 * 30), "/"); // 86400 = 1 dia. Cookie que dura 1 mês.

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

    if ($_POST['id'] == "") {
        $imagemFilial = new \app\model\filiais\ImagemFilial($_COOKIE['ultimoIdFilial'], $_FILES['upload']['name']);
    } else {
        $imagemFilial = new \app\model\filiais\ImagemFilial($_POST['id'], $_FILES['upload']['name']);
    }

    $imagemFilialDAO = new \app\model\filiais\ImagemFilialDAO();
    $imagemFilialDAO->createImagemFilial($imagemFilial);
}

// Cadastrar cada imagem do loop na tabela imagem_filial e colocar o id da filial na FK
// if ($_POST['id'] != "") {
//   faz o create vazio pra pegar o último id e salvar em uma variavel, para colocar o id na FK
//   setcookie('ultimoIdFilial', Conexao::getInstance()->lastInsertId(), time() + (86400 * 30), "/"); // 86400 = 1 dia. Cookie que dura 1 mês.
//   deletar o registro vazio criado na tabela.
// }

header("location: ../../../gerenciamento/filiais/home");