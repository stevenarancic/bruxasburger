<!-- Depois deixar o create "mudavel" para também poder ser um update.php -->
<form action="../../../../bruxasburger/app/controller/filiais/<?=$condicional?>.php" method="post"
    enctype="multipart/form-data">
    <div class="form-floating mb-3">
        <input type="tel" class="form-control" placeholder=" " name="telefone" value="<?=$filial['telefone']?>">
        <label for="floatingInput">
            Telefone
        </label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" placeholder=" " name="uf" value="<?=$filial['uf']?>">
        <label for="">
            UF
        </label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" placeholder=" " name="cidade" value="<?=$filial['cidade']?>">
        <label for="">
            Cidade
        </label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" placeholder=" " name="bairro" value="<?=$filial['bairro']?>">
        <label for="">
            Bairro
        </label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" placeholder=" " name="rua" value="<?=$filial['rua']?>">
        <label for="">
            Rua
        </label>
    </div>
    <div class="form-floating mb-3">
        <input type="number" class="form-control" placeholder=" " name="numero" value="<?=$filial['numero']?>">
        <label for="">
            Número
        </label>
    </div>
    <div class="form-floating mb-3 d-none">
        <input type="number" class="form-control" placeholder=" " name="id" value="<?=$filial['id']?>">
        <label for=""></label>
    </div>
    <div class="mb-3">
        <label for="formFile" class="form-label">
            Imagens
        </label>
        <input class="form-control" type="file" name="upload[]" multiple="multiple" />
    </div>
    <button type="submit" class="btn btn-primary">
        Confirmar
    </button>
</form>