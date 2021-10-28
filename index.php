<?php
require_once __DIR__ . '/vendor/autoload.php';

$filialDAO = new \app\model\filiais\FilialDAO();

$loader = new Twig\Loader\FilesystemLoader(__DIR__ . '/app/view');
$twig = new Twig\Environment($loader, [
    'cache' => __DIR__ . '/app/view/cache',
    'cache' => false,
]);

if (isset($_GET['id']) and $_GET['id'] != "") {
    foreach ($filialDAO->filtrarFilial($_GET['id']) as $key => $filial) {
        echo $twig->render("gerenciamento/filiais/update.html", ['filial' => $filial]);
    }
}

if (isset($_GET['id_delete']) and $_GET['id_delete'] != "") {
    header("location: app/controller/filiais/delete.php?id_delete={$_GET['id_delete']}");
}

if ($_GET) {
    $url = explode('/', $_GET['url']);

    $urlDinamico = "";

    for ($i = 0; $i < count($url); $i++) {
        $urlDinamico = implode('/', $url);
    }

    if (file_exists(__DIR__ . "/app/view/{$urlDinamico}.html")) {
        echo $twig->render("{$urlDinamico}.html", ['filialDAO' => $filialDAO]);
    } else {
        echo $twig->render('404.html');
    }
} else {
    echo $twig->render('home.html');
}