<?php
require_once __DIR__ . '/vendor/autoload.php';

$loader = new Twig\Loader\FilesystemLoader(__DIR__ . '/app/view');
$twig = new Twig\Environment($loader, [
    'cache' => __DIR__ . '/app/view/cache',
    'cache' => false,
]);

if ($_GET) {
    $url = explode('/', $_GET['url']);

    $urlDinamico = "";

    for ($i = 0; $i < count($url); $i++) {
        $urlDinamico = implode('/', $url);
    }

    if (file_exists(__DIR__ . "/app/view/{$urlDinamico}.html")) {
        echo $twig->render("{$urlDinamico}.html");
    } else {
        echo $twig->render('404.html');
    }
} else {
    echo $twig->render('home.html');
}