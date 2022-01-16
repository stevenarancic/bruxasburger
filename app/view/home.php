<?php

require_once 'vendor/autoload.php';

$itemCardapioDAO = new \app\model\itens_cardapio\ItemCardapioDAO();
$filialDAO = new \app\model\filiais\FilialDAO();
$imagemFilialDAO = new \app\model\filiais\ImagemFilialDAO();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'app/view/structure/head.php' ?>
    <title>
        Home - Bruxas Burger
    </title>
</head>

<body>
    <?php require_once 'app/view/structure/header.php' ?>

    <section style="min-height: 100vh">
        <div class="owl-carousel owl-item-filial-home owl-theme d-flex align-items-center">
            <div class="item">
                <div class="col" style="position: inherit;">
                    <img src="app/view/img1.png" style="filter: brightness(70%); height: 90vh; object-fit: cover;"
                        alt="">
                </div>
            </div>
            <div class="item">
                <div class="col" style="position: inherit;">
                    <img src="app/view/img2.png" style="filter: brightness(70%); height: 90vh; object-fit: cover;"
                        alt="">
                </div>
            </div>
            <div class="item">
                <div class="col" style="position: inherit;">
                    <img src="app/view/img3.png" style="filter: brightness(70%); height: 90vh; object-fit: cover;"
                        alt="">
                </div>
            </div>
            <div class="item">
                <div class="col" style="position: inherit;">
                    <img src="app/view/img4.png" style="filter: brightness(70%); height: 90vh; object-fit: cover;"
                        alt="">
                </div>
            </div>

        </div>

        <style>
        .bounce {
            position: absolute;
            left: 50%;
            height: 50px;
            width: 50px;
            -webkit-animation: bounce 1s infinite;
        }

        @-webkit-keyframes bounce {
            0% {
                bottom: 05px;
            }

            25%,
            75% {
                bottom: 15px;
            }

            50% {
                bottom: 20px;
            }

            100% {
                bottom: 0;
            }
        }

        @media (max-width: 900px) {
            #teste {
                position: absolute;
                left: 45%;
            }
        }

        @media (min-width: 900px) {
            #teste {
                position: absolute;
                left: 48.5%;
            }
        }
        </style>

        <div class="d-flex justify-content-center">
            <button id="teste" onclick="scrollar()" class="btn btn-danger text-white bounce"
                style="margin-bottom: 3rem; z-index: 998;"><i class="bi bi-caret-down"></i></button>
        </div>
        <section class="container col-md-6">
            <!-- Cardapio -->
            <h2 class="text-center mt-4">Confira nosso cardápio</h2>
            <div class="owl-carousel owl-item-cardapio owl-theme">
                <?php foreach ($itemCardapioDAO->readItemCardapio() as $key => $itemCardapio) { ?>
                <div class="item">
                    <div class="col">
                        <div class="card shadow ms-3 me-3 mb-4 mt-4">
                            <img src="assets/img/cardapio_itens/{{ itemCardapio.imagem }}" class="card-img-top"
                                alt="..." style="height: 20em; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title"><?= $itemCardapio['item_nome'] ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted">
                                    <?= $itemCardapio['nome'] ?>&#<?= $itemCardapio['icone'] ?>;
                                </h6>
                                <p class="card-text">
                                    <?= $itemCardapio['descricao'] ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="d-flex justify-content-center">
                <a href="cardapio.php" class="btn btn-warning fs-5">Ver todos</a>
            </div>

            <h2 class="text-center mt-5 mb-4">Quem somos</h2>
            <p class="myP">
                O Bruxas Burger tem como missão trazer cada vez mais conforto e bem estar aos seus clientes, mantendo
                sempre um
                ótimo atendimento e buscando sempre ter os melhores preços para a satisfação de todos. Temos como
                objetivo
                expandir
                nosso empreendimento e abrir filiais em diversos lugares do RS, SC e PR, para divulgar o trabalho
                singular que
                só o
                Bruxas tem.
                <br>
                Bruxas Burger foi fundado há mais de 25 anos no litoral norte de Imbé por duas irmãs que há oito anos
                venderam o
                mesmo para o atual proprietário: Edson Jacinto Herzogues. Tendo como sócios Carlos Fernando Noronha e
                Yuri Lima
                de
                Noronha, proprietários da franquia em Porto Alegre.
            </p>
            <!-- Filiais -->
            <h2 class="text-center mt-4">Encontre um Bruxas perto de você</h2>
            <?php foreach ($filialDAO->readFilial() as $key => $filial) { ?>
            <div class="modal fade" id="modalImagem<?= $filial['id'] ?>" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">";
                            <?php foreach ($imagemFilialDAO->filtrarPorFilial($filial['id']) as $key => $itemImagem) { ?>
                            <img src="assets/img/filiais/<?= $filial['cidade'] ?>/<?= $itemImagem['nome'] ?>"
                                class="img-fluid rounded card-img-top mb-3" alt="..." data-bs-toggle="modal"
                                data-bs-target="#modalImagem<?= $filial['id'] ?>"
                                style="height: 25rem; width: 100%; object-fit: cover">
                            <?php } ?>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <div class="owl-carousel owl-filial owl-theme">
                <?php foreach ($filialDAO->readFilial() as $key => $filial) { ?>
                <div class="item">
                    <div class="col" style="position: inherit;">
                        <div class="card shadow ms-3 me-3 mb-4 mt-4" style="position: inherit;">
                            <?php
                                foreach ($imagemFilialDAO->filtrarPorFilial($filial['id']) as $key => $value) {
                                    if ($key === array_key_first($imagemFilialDAO->filtrarPorFilial($filial['id']))) { ?>
                            <img src="assets/img/filiais/<?= $filial['cidade'] ?>/<?= $itemImagem['nome'] ?>"
                                class="img-fluid rounded card-img-top" alt="..." data-bs-toggle="modal"
                                data-bs-target="#modalImagem<?= $filial['id'] ?>"
                                style="height: 25rem; width: 100%; object-fit: cover">
                            <?php
                                    }
                                } ?>
                            <div class="card-body">
                                <h5 class="card-title">Bruxas Burger <?= $filial['cidade'] ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted">
                                    <?= $filial['rua'] ?> - <?= $filial['numero'] ?>, <?= $filial['bairro'] ?>
                                </h6>
                                <a href="https://api.whatsapp.com/send?phone=<?= $filial['telefone'] ?>"
                                    class="btn btn-success w-100" style="position: inherit;">
                                    <i class="bi bi-whatsapp"></i> Chamar no Whatsapp
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="d-flex justify-content-center">
                <a href="filiais.php" class="btn btn-warning fs-5">Ver todos</a>
            </div>
        </section>
    </section>

    <?php require_once 'app/view/structure/footer.php' ?>

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Scripts -->
    <script src="assets/js/scripts.js"></script>

    <script>
    $(document).ready(function() //When the page is ready, load function
        {
            $("#teste").click(function() // When arrow is clicked
                {
                    $("body,html").animate({
                        scrollTop: window.innerHeight * 0.9 // Scroll 93% of the screen from top of body
                    }, 400); //how fast the scrolling animation will be in miliseconds
                });
        });
    </script>

    <!-- Owl Carousel - Carousels -->
    <script type="text/javascript">
    $(document).ready(function() {
        $('.owl-filial').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            dots: false,
            items: 1,
        })
    });
    $(document).ready(function() {
        $('.owl-item-cardapio').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            dots: false,
            items: 1,
        })
    });
    $(document).ready(function() {
        $('.owl-item-filial-home').owlCarousel({
            loop: true,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: false,
            margin: 10,
            nav: false,
            dots: false,
            items: 1,
        })
    });
    </script>

    <!-- Botão que volta pro início -->
    <script>
    $(document).ready(function() {
        $(window).scroll(function() {
            if ($(window).scrollTop() > 300) {
                $('.my_bttn').fadeIn(250);
            } else {
                $('.my_bttn').fadeOut(250);
            }
        });
        $('.my_bttn').click(function() {
            $('html,body').animate({
                scrollTop: 0
            }, 400);
        });
    });
    </script>

    <!-- Bootstrap scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>

    <!-- Owl Carousel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>