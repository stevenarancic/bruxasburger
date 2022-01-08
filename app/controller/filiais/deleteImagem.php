<?php

require_once __DIR__ . "../../../../vendor/autoload.php";

$imagemFilialDAO = new \app\model\filiais\ImagemFilialDAO();

//deletar o arquivo da imagem pegando o nome fazendo um select pelo id dela
foreach ($imagemFilialDAO->filtrarImagemPorId($_GET['id_imagem']) as $key => $item) {
    $dir = "../../../assets/img/filiais/{$_GET['filial']}/{$item['nome']}";
    echo $dir;
    if (unlink($dir)) {
        echo "O arquivo {$item['nome']} foi apagado!";
    } else {
        echo 'A imagem não pode ser apagada!';
    }
}

$imagemFilialDAO->deleteImagemFilial($_GET['id_imagem']);

header("location: ../../../gerenciamento/filiais/home.php");