<?php
require_once '../../../vendor/autoload.php';

use app\model\Conexao;

$sql = "SELECT * FROM usuario WHERE login = :login AND senha = :senha";

$stmt = Conexao::getInstance()->prepare($sql);

$stmt->bindValue(':login', $_POST['login']);
$stmt->bindValue(':senha', $_POST['senha']);

$stmt->execute();

if ($stmt->rowCount() > 0) {
    header("location: ../../../gerenciamento/home");
} else {
    echo "Login incorreto!";
}