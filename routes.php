<?php

require_once("router.php");

// ##################################################
// ##################################################
// ##################################################

// Static GET
// In the URL -> http://localhost
// The output -> Index

// ##################################################
// ##################################################
// ##################################################

// ##################################################
// ##################################################
// ##################################################

// SITE BASE
get('/bruxasburger', 'bruxasburger/app/view/home.php');
get('/bruxasburger/filiais', 'bruxasburger/app/view/filiais.php');
get('/bruxasburger/cardapio', 'bruxasburger/app/view/cardapio.php');

// GERENCIADOR BASE
get('/bruxasburger/gerenciamento', 'bruxasburger/app/view/gerenciamento/index.php');
get('/bruxasburger/gerenciamento/login', 'bruxasburger/app/view/gerenciamento/login.php');

// GERENCIADOR - CARDAPIO
get('/bruxasburger/gerenciamento/cardapio', 'bruxasburger/app/view/gerenciamento/cardapio/home.php');
// ITENS
get('/bruxasburger/gerenciamento/cardapio/itens', 'bruxasburger/app/view/gerenciamento/cardapio/itens/home.php');
get('/bruxasburger/gerenciamento/cardapio/itens/create', 'bruxasburger/app/view/gerenciamento/cardapio/itens/create.php');
get('/bruxasburger/gerenciamento/cardapio/itens/update/$id', 'bruxasburger/app/view/gerenciamento/cardapio/itens/update.php');
// CATEGORIAS
get('/bruxasburger/gerenciamento/cardapio/categorias', 'bruxasburger/app/view/gerenciamento/cardapio/categorias/home.php');

// GERENCIADOR - FILIAIS
get('/bruxasburger/gerenciamento/filiais', 'bruxasburger/app/view/gerenciamento/filiais/home.php');
get('/bruxasburger/gerenciamento/filiais/create', 'bruxasburger/app/view/gerenciamento/filiais/create.php');
get('/bruxasburger/gerenciamento/filiais/update/$id', 'bruxasburger/app/view/gerenciamento/filiais/update.php');

// ##################################################
// ##################################################
// ##################################################

// ##################################################
// ##################################################
// ##################################################

// Dynamic GET. Example with 1 variable
// The $id will be available in user.php
// get('/user/$id', 'user.php');

// Dynamic GET. Example with 2 variables
// The $name will be available in user.php
// The $last_name will be available in user.php
// get('/user/$name/$last_name', 'user.php');

// Dynamic GET. Example with 2 variables with static
// In the URL -> http://localhost/product/shoes/color/blue
// The $type will be available in product.php
// The $color will be available in product.php
// get('/product/$type/color/:color', 'product.php');

// Dynamic GET. Example with 1 variable and 1 query string
// In the URL -> http://localhost/item/car?price=10
// The $name will be available in items.php which is inside the views folder
// get('/item/$name', 'views/items.php');


// ##################################################
// ##################################################
// ##################################################
// any can be used for GETs or POSTs

// For GET or POST
// The 404.php which is inside the views folder will be called
// The 404.php has access to $_GET and $_POST
any('/404', 'bruxasburger/app/view/404.php');