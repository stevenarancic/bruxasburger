<?php
require_once __DIR__ . '/vendor/autoload.php';

$loader = new Twig\Loader\FilesystemLoader(__DIR__ . '/app/view');
$twig = new Twig\Environment($loader, [
    'cache' => __DIR__ . '/app/view/cache',
    'cache' => false,
]);

if ($_GET) {
    $url = explode('/', $_GET['url']);

    if (file_exists("app/view/{$url[0]}.twig")) {
        echo $twig->render($url[0] . '.twig');
    } else {
        echo "AAAAAAAAAAAAA";
    }

} else {
    echo $twig->render('home.twig');
}