<?php
session_start();

require_once 'vendor/autoload.php';

$filialDAO = new \app\model\filiais\FilialDAO();
$itemCardapioDAO = new \app\model\itens_cardapio\ItemCardapioDAO();

// Filial
if (isset($_GET['id']) and $_GET['id'] != "") {
    foreach ($filialDAO->filtrarFilial($_GET['id']) as $key => $filial) {
        echo $twig->render("gerenciamento/filiais/update.php", ['filial' => $filial]);
    }
}
if (isset($_GET['id_delete']) and $_GET['id_delete'] != "") {
    header("location: app/controller/filiais/delete.php?id_delete={$_GET['id_delete']}&nomeFilial={$_GET['nomeFilial']}");
}

// Categoria
if (isset($_GET['id_delete_categoria']) and $_GET['id_delete_categoria'] != "") {
    header("location: app/controller/categorias/delete.php?id_delete_categoria={$_GET['id_delete_categoria']}");
}

// Item Cardápio
if (isset($_GET['id_update_itemcardapio']) and $_GET['id_update_itemcardapio'] != "") {
    foreach ($itemCardapioDAO->filtrarItemCardapio($_GET['id_update_itemcardapio']) as $key => $itemCardapio) {
        echo $twig->render("gerenciamento/cardapio/itens/update.php", ['itemCardapio' => $itemCardapio, 'categoriaDAO' => $categoriaDAO]);
    }
}
if (isset($_GET['id_delete_itemcardapio']) and $_GET['id_delete_itemcardapio'] != "") {
    header("location: app/controller/itens_cardapio/delete.php?id_delete_itemcardapio={$_GET['id_delete_itemcardapio']}");
}

if ($_GET) {
    $url = explode('/', $_GET['url']);

    $urlDinamico = "";

    for ($i = 0; $i < count($url); $i++) {
        $urlDinamico = implode('/', $url);
    }

    if (file_exists("/app/view/{$urlDinamico}.php")) {
        $search = 'gerenciamento';

        if (preg_match("/{$search}/i", $urlDinamico)) {
            if (!isset($_SESSION['logado'])) {
                header('location: gerenciamento/login.php');
            } else {
                header("location: {$urlDinamico}.php");
            }
        } else {
            header("location: {$urlDinamico}.php");
        }
    } else {
    }
} else {
    header('location: app/view/home.php');
}