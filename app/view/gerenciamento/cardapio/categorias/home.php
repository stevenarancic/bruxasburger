<?php
session_start();

require_once '../../../../../vendor/autoload.php';

$categoriaDAO = new \app\model\categorias\CategoriaDAO();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once '../../structure/head.php'?>

    <title>Categorias - Gerenciamento</title>
</head>

<body>
    <section class="container" style="height: 100vh">
        <h1 class="p-5 d-flex justify-content-center">
            Gerenciamento de Categorias
        </h1>
        <div class="d-flex justify-content-between">
            <a href="../home.php" class="btn btn-light">
                Voltar
            </a>
            <div class="d-flex flex-row">
                <div id="div_create_categoria">
                    <form action="../../../../controller/categorias/create.php" method="post" class="d-flex flex-row">
                        Nome:
                        <input type="text" name="nome" class="form-control ms-2 me-2" style="width: 200px;">
                        Icone:
                        <input type="text" name="icone" class="form-control ms-2" style="width: 200px;">
                        <button class="btn btn-success ms-3 me-3">
                            <i class="bi bi-check-lg"></i>
                        </button>
                    </form>
                </div>
                <button class="btn btn-primary" onclick="hideShowCategoria()">
                    <i class="bi bi-plus-lg"></i>
                </button>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach ($categoriaDAO->readCategoria() as $key => $categoria) {?>
            <div class="col">
                <div class="card border-light shadow-lg">
                    <p class="fs-1 text-center mt-4">
                        &#<?=$categoria['icone']?>;
                    </p>
                    <div class="card-body">
                        <form action="../../../../controller/categorias/update.php" method="post">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" placeholder=" " name="icone"
                                    value="<?=$categoria['icone']?>">
                                <label for="">
                                    Ícone
                                </label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" placeholder=" " name="nome"
                                    value="<?=$categoria['nome']?>">
                                <label for="">
                                    Nome
                                </label>
                            </div>
                            <div class="form-floating mb-3 d-none">
                                <input type="number" class="form-control" placeholder=" " name="id"
                                    value="<?=$categoria['id']?>">
                                <label for=""></label>
                            </div>
                            <button type="submit" class="btn btn-success">
                                Salvar
                            </button>
                            <a href="../../../index.php?id_delete_categoria=<?=$categoria['id']?>"
                                class="btn btn-danger">
                                Apagar
                            </a>
                        </form>
                    </div>
                </div>
            </div>
            <?php }?>
        </div>
    </section>
</body>

</html>