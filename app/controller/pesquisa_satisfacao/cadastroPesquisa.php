<?php

use app\model\Conexao;

session_start();
include '../../model/Conexao.php';

$nome = $_POST['nome'];
$email = $_POST['email'];
$descricao = $_POST['descricao'];

$sql = "INSERT INTO pesquisas(nome, email, descricao) VALUES(:nome, :email, :descricao)";

$stmt = Conexao::getInstance()->prepare($sql);

$stmt->bindValue(':nome', $nome);
$stmt->bindValue(':email', $email);
$stmt->bindValue(':descricao', $descricao);

$stmt->execute();

$_SESSION['cadastrado'] = true;
header('location: ../../../home?pesquisaEnviada=sim');