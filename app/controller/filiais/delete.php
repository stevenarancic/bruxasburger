<?php
require_once __DIR__ . "../../../../vendor/autoload.php";

$filialDAO = new \app\model\filiais\FilialDAO();
$filialDAO->deleteFilial($_GET['id_delete']);

header("location: ../../../gerenciamento/filiais/home");