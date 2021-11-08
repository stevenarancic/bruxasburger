<?php
require_once __DIR__ . "../../../../vendor/autoload.php";

$filial = new \app\model\filiais\Filial($_POST['telefone'], $_POST['uf'], $_POST['cidade'], $_POST['bairro'], $_POST['rua'], $_POST['numero']);
$filialDAO = new \app\model\filiais\FilialDAO();

//$files = array_filter($_FILES['upload']['name']); //something like that to be used before processing files.

// Count # of uploaded files in array
$total = count($_FILES['upload']['name']);

// Loop through each file
for ($i = 0; $i < $total; $i++) {

    //Get the temp file path
    $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

    //Make sure we have a file path
    if ($tmpFilePath != "") {
        //Setup our new file path
        $newFilePath = "../../../assets/img/filiais/" . $_FILES['upload']['name'][$i];

        //Upload the file into the temp dir
        if (move_uploaded_file($tmpFilePath, $newFilePath)) {

            //Handle other code here

        }
    }
}

die();

$filialDAO->createFilial($filial);

header("location: ../../../gerenciamento/filiais/home");