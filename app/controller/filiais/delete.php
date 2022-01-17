<?php
require_once __DIR__ . "../../../../vendor/autoload.php";

$filialDAO = new \app\model\filiais\FilialDAO();
$imagemFilialDAO = new \app\model\filiais\ImagemFilialDAO();

// Deletar as imagens do banco de dados.
$imagemFilialDAO->deleteImagensFilial($id);
$filialDAO->deleteFilial($id);

// Deletar as imagens da pasta de imagens do FTP e deletar a pasta em sí.
$dir = __DIR__ . "../../../../assets/img/filiais/{$nomeFilial}";
if (file_exists($dir)) {
    $di = new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS);
    $ri = new RecursiveIteratorIterator($di, RecursiveIteratorIterator::CHILD_FIRST);

    foreach ($ri as $file) {
        $file->isDir() ? rmdir($file) : unlink($file);
    }
    rmdir($dir);
}

header('location: /bruxasburger/gerenciamento/filiais');