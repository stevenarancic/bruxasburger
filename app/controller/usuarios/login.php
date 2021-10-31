<?php

use app\model\Conexao;

echo "{$_POST['login']} senha {$_POST['senha']}";

$sql = "SELECT * FROM usuario WHERE login = :login AND senha = :senha";

$stmt = Conexao::getInstance()->prepare($sql);

$stmt->bindValue(':login', );
$stmt->bindValue(':senha');

$stmt->execute();