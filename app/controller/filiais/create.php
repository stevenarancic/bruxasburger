<?php
require_once __DIR__ . "../../../../vendor/autoload.php";

$filial = new \app\model\filiais\Filial($_POST['telefone'], $_POST['uf'], $_POST['cidade'], $_POST['bairro'], $_POST['rua'], $_POST['numero']);
$filialDAO = new \app\model\filiais\FilialDAO();

//$files = array_filter($_FILES['upload']['name']); //something like that to be used before processing files.

// Count # of uploaded files in array
$total = count($_FILES['upload']['name']);

if (!file_exists("../../../assets/img/filiais/{$_POST['cidade']}")) {
    mkdir("../../../assets/img/filiais/{$_POST['cidade']}", 0777, true);
}

// Loop through each file
for ($i = 0; $i < $total; $i++) {

    //Get the temp file path
    $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

    //Make sure we have a file path
    if ($tmpFilePath != "") {

        //Setup our new file path
        $newFilePath = "../../../assets/img/filiais/{$_POST['cidade']}/" . $_FILES['upload']['name'][$i];

        //Upload the file into the temp dir
        if (move_uploaded_file($tmpFilePath, $newFilePath)) {

            //Handle other code here

        }
    }
}

// Cadastrar cada imagem do loop na tabela imagem_filial e colocar o id da filial na FK
// if ($_POST['id'] != "") {
//   faz o create vazio pra pegar o último id e salvar em uma variavel, para colocar o id na FK
//   setcookie('ultimoIdFilial', Conexao::getInstance()->lastInsertId(), time() + (86400 * 30), "/"); // 86400 = 1 dia. Cookie que dura 1 mês.
//   deletar o registro vazio criado na tabela.
// }

$filialDAO->createFilial($filial);

header("location: ../../../gerenciamento/filiais/home");