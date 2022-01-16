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

// PESQUISAS
// PESQUISAS - FILIAIS
post('/bruxasburger/controller/filiais/pesquisa', 'bruxasburger/app/controller/filiais/pesquisa.php');
// PESQUISAS - CARDAPIO
post('/bruxasburger/controller/itens_cardapio/pesquisa', 'bruxasburger/app/controller/itens_cardapio/pesquisa.php');

any('/404', 'bruxasburger/app/view/404.php');