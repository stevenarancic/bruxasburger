<?php
session_start();

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