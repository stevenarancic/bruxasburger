<?php

require_once("router.php");

// SITE BASE
get('/bruxasburger', 'bruxasburger/app/view/home.php');
get('/bruxasburger/filiais', 'bruxasburger/app/view/filiais.php');
get('/bruxasburger/cardapio', 'bruxasburger/app/view/cardapio.php');

// ##################################################

// GERENCIADOR BASE
get('/bruxasburger/gerenciamento', 'bruxasburger/app/view/gerenciamento/index.php');
get('/bruxasburger/gerenciamento/login', 'bruxasburger/app/view/gerenciamento/login.php');

// ##################################################

// GERENCIADOR - CARDAPIO
get('/bruxasburger/gerenciamento/cardapio', 'bruxasburger/app/view/gerenciamento/cardapio/home.php');
// ITENS
get('/bruxasburger/gerenciamento/cardapio/itens', 'bruxasburger/app/view/gerenciamento/cardapio/itens/home.php');
get('/bruxasburger/gerenciamento/cardapio/itens/create', 'bruxasburger/app/view/gerenciamento/cardapio/itens/create.php');
get('/bruxasburger/gerenciamento/cardapio/itens/update/$id', 'bruxasburger/app/view/gerenciamento/cardapio/itens/update.php');
// CATEGORIAS
get('/bruxasburger/gerenciamento/cardapio/categorias', 'bruxasburger/app/view/gerenciamento/cardapio/categorias/home.php');

// ##################################################

// GERENCIADOR - FILIAIS
get('/bruxasburger/gerenciamento/filiais', 'bruxasburger/app/view/gerenciamento/filiais/home.php');
get('/bruxasburger/gerenciamento/filiais/create', 'bruxasburger/app/view/gerenciamento/filiais/create.php');
get('/bruxasburger/gerenciamento/filiais/update/$id', 'bruxasburger/app/view/gerenciamento/filiais/update.php');

// ##################################################

// CONTROLLER - CATEGORIAS
post('/bruxasburger/controller/categorias/create', 'bruxasburger/app/controller/categorias/create.php');
get('/bruxasburger/controller/categorias/delete/$id', 'bruxasburger/app/controller/categorias/delete.php');
get('/bruxasburger/controller/categorias/update/$id', 'bruxasburger/app/controller/categorias/update.php');

// CONTROLLER - FILIAIS
post('/bruxasburger/controller/filiais/create', 'bruxasburger/app/controller/filiais/create.php');
get('/bruxasburger/controller/filiais/delete/$id/$nomeFilial', 'bruxasburger/app/controller/filiais/delete.php');
get('/bruxasburger/controller/filiais/deleteImagem/$id', 'bruxasburger/app/controller/filiais/deleteImagem.php');
post('/bruxasburger/controller/filiais/pesquisa', 'bruxasburger/app/controller/filiais/pesquisa.php');
post('/bruxasburger/controller/filiais/update', 'bruxasburger/app/controller/filiais/update.php');

// CONTROLLER - ITENS CARDÁPIO
post('/bruxasburger/controller/itens_cardapio/create', 'bruxasburger/app/controller/itens_cardapio/create.php');
get('/bruxasburger/controller/itens_cardapio/delete/$id', 'bruxasburger/app/controller/itens_cardapio/delete.php');
post('/bruxasburger/controller/itens_cardapio/pesquisa-por-categoria', 'bruxasburger/app/controller/itens_cardapio/pesquisa_por_categoria.php');
post('/bruxasburger/controller/itens_cardapio/pesquisa', 'bruxasburger/app/controller/itens_cardapio/pesquisa.php');
post('/bruxasburger/controller/itens_cardapio/update', 'bruxasburger/app/controller/itens_cardapio/update.php');

// CONTROLLER - USUARIOS
post('/bruxasburger/controller/usuarios/login', 'bruxasburger/app/controller/usuarios/login.php');

any('/404', 'bruxasburger/app/view/404.php');