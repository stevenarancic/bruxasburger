<!-- Depois deixar o create "mudavel" para também poder ser um update.php -->
<form action="../../../../controller/itens_cardapio/<?= $condicional ?>.php" method="post"
    enctype="multipart/form-data">
    <div class="form-floating mb-3">
        <input type="text" class="form-control" placeholder=" " name="nome" value="<?php if (isset($itemCardapio)) {
                                                                                        echo $itemCardapio['nome'];
                                                                                    } ?>">
        <label for="floatingInput">
            Nome
        </label>
    </div>
    <div class="form-floating mb-3">
        <textarea class="form-control" placeholder=" " style="height: 8em" name="descricao">
            <?php if (isset($itemCardapio)) {
                echo $itemCardapio['descricao'];
            } ?>
        </textarea>
        <label for="">
            Descrição
        </label>
    </div>
    <div class="form-floating mb-3 d-none">
        <input type="text" class="form-control" placeholder=" " name="id" value="<?php if (isset($itemCardapio)) {
                                                                                        echo $itemCardapio['id'];
                                                                                    } ?>">
        <label for="floatingInput">
            Id
        </label>
    </div>
    <div class="form-floating mb-3 d-none">
        <input type="text" class="form-control" placeholder=" " name="imagem" value="<?php if (isset($itemCardapio)) {
                                                                                            echo $itemCardapio['imagem'];
                                                                                        } ?>">
        <label for="floatingInput">
            Imagem
        </label>
    </div>
    <select class="form-select mb-3" name="select_categoria">
        <option value="<?php if (isset($itemCardapio)) {
                            echo $itemCardapio['categoria_id'];
                        } ?>" selected>
            Escolha uma categoria (opcional)
        </option>
        <?php foreach ($categoriaDAO->readCategoria() as $key => $categoria) { ?>
        <option value="<?= $categoria['id'] ?>">
            <?= $categoria['nome'] ?>&#<?= $categoria['icone'] ?>
        </option>
        <?php } ?>
    </select>
    <div class="mb-3">
        <label for="" class="form-label">
            Foto do item (opcional)
        </label>
        <input class="form-control" type="file" name="imagem_item_cardapio">
    </div>
    <button type="submit" class="btn btn-primary">
        Confirmar
    </button>
</form>