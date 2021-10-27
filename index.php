<?php
require_once __DIR__ . '/vendor/autoload.php';

$pagina = 'home';
if (isset($_GET['pagina'])) {
    $pagina = $_GET['pagina'];
}

$loader = new Twig\Loader\FilesystemLoader(__DIR__ . '/app/view');
$twig = new Twig\Environment($loader, [
    'cache' => __DIR__ . '/app/view/cache',
    'cache' => false,
]);
$twig->addGlobal('pagina_atual', $pagina);

switch ($pagina) {
    case 'home':
        echo $twig->render('home.twig');
        break;
    default:
        header('HTTP/1.0 404 Not Found');
        echo $twig->render('404.twig');
        break;
}