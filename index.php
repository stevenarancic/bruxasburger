<?php
session_start();

require_once __DIR__ . '/vendor/autoload.php';

$filialDAO = new \app\model\filiais\FilialDAO();
$categoriaDAO = new \app\model\categorias\CategoriaDAO();
$itemCardapioDAO = new \app\model\itens_cardapio\ItemCardapioDAO();
$imagemFilialDAO = new \app\model\filiais\ImagemFilialDAO();

$loader = new Twig\Loader\FilesystemLoader(__DIR__ . '/app/view');
$twig = new Twig\Environment($loader, [
    'cache' => __DIR__ . '/app/view/cache',
    'cache' => false,
]);

if (isset($_GET['pesquisaEnviada'])) {
    echo " <script src=\"node_modules/sweetalert2/dist/sweetalert2.all.js\"></script>
    <script>
            Swal.fire({
                title: title,
                text: text,
                icon: 'warning',
                showConfirmButton: true,
                confirmButtonText: 'Sim',
                confirmButtonColor: '#78c696',
                showDenyButton: true,
                denyButtonText: 'Não',
            }).then((result) => {
                if (result.isConfirmed) {
                } else if (result.isDenied) {}
            })
    </script>
   ";
}

// Filial
if (isset($_GET['id']) and $_GET['id'] != "") {
    foreach ($filialDAO->filtrarFilial($_GET['id']) as $key => $filial) {
        echo $twig->render("gerenciamento/filiais/update.html", ['filial' => $filial]);
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
        echo $twig->render("gerenciamento/cardapio/itens/update.html", ['itemCardapio' => $itemCardapio, 'categoriaDAO' => $categoriaDAO]);
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
                echo $twig->render("{$urlDinamico}.html", ['filialDAO' => $filialDAO, 'categoriaDAO' => $categoriaDAO, 'itemCardapioDAO' => $itemCardapioDAO, 'imagemFilialDAO' => $imagemFilialDAO]);
            }
        } else {
            echo $twig->render("{$urlDinamico}.html", ['filialDAO' => $filialDAO, 'categoriaDAO' => $categoriaDAO, 'itemCardapioDAO' => $itemCardapioDAO, 'imagemFilialDAO' => $imagemFilialDAO]);
        }
    } else {
        echo $twig->render('404.html');
    }
} else {
    echo $twig->render('home.html', ['filialDAO' => $filialDAO, 'categoriaDAO' => $categoriaDAO, 'itemCardapioDAO' => $itemCardapioDAO, 'imagemFilialDAO' => $imagemFilialDAO]);
}