<?php
session_start();

require_once __DIR__ . '/vendor/autoload.php';

$filialDAO = new \app\model\filiais\FilialDAO();
$categoriaDAO = new \app\model\categorias\CategoriaDAO();
$itemCardapioDAO = new \app\model\itens_cardapio\ItemCardapioDAO();

$loader = new Twig\Loader\FilesystemLoader(__DIR__ . '/app/view');
$twig = new Twig\Environment($loader, [
    'cache' => __DIR__ . '/app/view/cache',
    'cache' => false,
]);

// Filial
if (isset($_GET['id']) and $_GET['id'] != "") {
    foreach ($filialDAO->filtrarFilial($_GET['id']) as $key => $filial) {
        echo $twig->render("gerenciamento/filiais/update.html", ['filial' => $filial]);
    }
}
if (isset($_GET['id_delete']) and $_GET['id_delete'] != "") {
    header("location: app/controller/filiais/delete.php?id_delete={$_GET['id_delete']}");
}

// Categoria
if (isset($_GET['id_delete_categoria']) and $_GET['id_delete_categoria'] != "") {
    header("location: app/controller/categorias/delete.php?id_delete_categoria={$_GET['id_delete_categoria']}");
}

// Item Cardápio
if (isset($_GET['id_update_itemcardapio']) and $_GET['id_update_itemcardapio'] != "") {
    foreach ($itemCardapioDAO->filtrarItemCardapio($_GET['id_update_itemcardapio']) as $key => $itemCardapio) {
        echo $twig->render("gerenciamento/cardapio/itens/update.html", ['itemCardapio' => $itemCardapio]);
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

    if (file_exists(__DIR__ . "/app/view/{$urlDinamico}.html")) {
        $search = 'gerenciamento';

        if (preg_match("/{$search}/i", $urlDinamico)) {
            if (!isset($_SESSION['logado'])) {
                echo $twig->render("gerenciamento/login.html");
            } else {
                echo $twig->render("{$urlDinamico}.html", ['filialDAO' => $filialDAO, 'categoriaDAO' => $categoriaDAO, 'itemCardapioDAO' => $itemCardapioDAO]);
            }
        } else {
            echo $twig->render("{$urlDinamico}.html", ['filialDAO' => $filialDAO, 'categoriaDAO' => $categoriaDAO, 'itemCardapioDAO' => $itemCardapioDAO]);
        }
    } else {
        echo $twig->render('404.html');
    }
} else {
    echo $twig->render('home.html');
}