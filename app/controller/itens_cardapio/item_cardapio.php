<div class="card mb-3" style="position: inherit">
    <div class=" row g-0">
        <div class="col-md-4">
            <img src="assets/img/cardapio_itens/<?=$item['imagem']?>" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-8">
            <div class="card-header"
                style="font-weight: bold; border-top-left-radius: 0; background-color: dimgrey; color: white">
                <?=$item['nome']?>&#<?=$item['icone']?>;
            </div>
            <div class="card-body">
                <h4 class="card-title fs-3"><?=$item['item_nome']?></h4>
                <p class="card-text"><?=$item['descricao']?></p>
            </div>
        </div>
    </div>
</div>