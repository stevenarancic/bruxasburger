<?php
require_once __DIR__ . "../../../../vendor/autoload.php";

$filial = new \app\model\filiais\Filial($_POST['telefone'], $_POST['uf'], $_POST['cidade'], $_POST['bairro'], $_POST['rua'], $_POST['numero']);
$filialDAO = new \app\model\filiais\FilialDAO();

$filialDAO->createFilial($filial);

header("location: ../../../gerenciamento/filiais/home");