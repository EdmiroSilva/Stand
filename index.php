<?php
session_start();
include("funcoes.php");

$conexao = obterConexaoBD();

include("cabecalho.php");

?>
<main>
    <!--? slider Area Start -->
    <div class="slider-area">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height d-flex align-items-center slide-bg">
                <div class="container">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                            <div class="hero__caption">
                                <h1 data-animation="fadeInLeft" data-delay=".4s" data-duration="2000ms">Descubra o
                                    seu carro ideal</h1>
                                <p data-animation="fadeInLeft" data-delay=".7s" data-duration="2000ms">
                                    O maior site de venda de carros particulares que tem as melhores ofertas para
                                    qualquer pessoa a preços incriveis e para os mais variados gostos
                                </p>
                                <div class="hero__btn" data-animation="fadeInLeft" data-delay=".8s" data-duration="2000ms">
                                    <a href="carros.html" class="btn hero-btn">Ver Carros</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->
    <!-- ? New Product Start -->
    <section class="new-product-area">
        <div class="container">
            <!-- Section tittle -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="section-tittle mb-70">
                        <h2>Novas chegadas</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                $consultaNovasChegadas = "SELECT carros_stand. *, marcas_stand.marca FROM carros_stand 
                JOIN marcas_stand ON carros_stand.marca = marcas_stand.id
                ORDER BY data_criacao DESC 
                LIMIT 3";

                $novasChegadas = mysqli_query($conexao, $consultaNovasChegadas);
                while ($carro = mysqli_fetch_array($novasChegadas)) {
                ?>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="single-new-pro mb-30 text-center">
                            <div class="product-img">
                                <img src="assets/img/carros/<?= $carro["imagem"] ?>" alt="">
                            </div>
                            <div class="product-caption">
                                <h3><a href="carro.php?id=<?= $carro["id"] ?>"> <?= $carro["marca"] ?></a></h3>
                                <span><?= $carro["preco"] ?>€</span>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>
    <!--  New Product End -->

    <!--? Popular Items Start -->
    <div class="popular-items section-padding30">
        <div class="container">
            <!-- Section tittle -->
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8 col-md-10">
                    <div class="section-tittle mb-70 text-center">
                        <h2>Os mais económicos</h2>
                        <p>As máquinas aos preços mais competitivos ainda dísponiveis</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                $consultaMaisEconomicos = "SELECT carros_stand. *, marcas_stand.marca
                FROM carros_stand
                JOIN marcas_stand ON carros_stand.marca = marcas_stand.id
                ORDER BY preco ASC
                LIMIT 6";

                $maisEconomicos = mysqli_query($conexao, $consultaMaisEconomicos);
                while ($carro = mysqli_fetch_array($maisEconomicos)) {
                ?>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="single-popular-items mb-50 text-center">
                            <div class="popular-img">
                                <img src="assets/img/carros/<?= $carro["imagem"] ?>" alt="">
                                <div class="img-cap">
                                    <span>Ver</span>
                                </div>
                                <div class="favorit-items">
                                    <span class="flaticon-heart"></span>
                                </div>
                            </div>
                            <div class="popular-caption">
                                <h3><a href="carro.php?id=<?= $carro["id"] ?>"><?= $carro["marca"] ?></a></h3>
                                <span><?= $carro["preco"] ?>€</span>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>

            </div>
            <div class="popular-items section-padding30">
                <div class="container">
                    <!-- Section tittle -->
                    <div class="row justify-content-center">
                        <div class="col-xl-7 col-lg-8 col-md-10">
                            <div class="section-tittle mb-70 text-center">
                                <h2>Os mais recentes</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                        $consultaMaisEconomicos = "SELECT carros_stand. *, marcas_stand.marca
                FROM carros_stand
                JOIN marcas_stand ON carros_stand.marca = marcas_stand.id
                ORDER BY ano DESC, ano ASC
                LIMIT 6";

                        $maisEconomicos = mysqli_query($conexao, $consultaMaisEconomicos);
                        while ($carro = mysqli_fetch_array($maisEconomicos)) {
                        ?>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                <div class="single-popular-items mb-50 text-center">
                                    <div class="popular-img">
                                        <img src="assets/img/carros/<?= $carro["imagem"] ?>" alt="">
                                        <div class="img-cap">
                                            <span>Ver</span>
                                        </div>
                                        <div class="favorit-items">
                                            <span class="flaticon-heart"></span>
                                        </div>
                                    </div>
                                    <div class="popular-caption">
                                        <h3><a href="carro.php?id=<?= $carro["id"] ?>"><?= $carro["marca"] ?></a></h3>
                                        <span><?= $carro["preco"] ?>€</span>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                    </div>
                    <!-- Button -->
                    <div class="row justify-content-center">
                        <div class="room-btn pt-70">
                            <a href="carros.php" class="btn view-btn1">Ver mais carros</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Popular Items End -->

            <!--? Shop Method Start-->
            <div class="shop-method-area">
                <div class="container">
                    <div class="method-wrapper">
                        <div class="row d-flex justify-content-between">
                            <div class="col-xl-4 col-lg-4 col-md-6">
                                <div class="single-method mb-40">
                                    <i class="ti-money"></i>
                                    <h6>Sem taxas</h6>
                                    <p>Qualquer agendamento de test drive e posterior transação é isenta de taxas.</p>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6">
                                <div class="single-method mb-40">
                                    <i class="ti-unlock"></i>
                                    <h6>Seguro</h6>
                                    <p>Comunicações seguras e encriptadas entre o vendedor e comprador.</p>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6">
                                <div class="single-method mb-40">
                                    <i class="ti-mobile"></i>
                                    <h6>Cómodo</h6>
                                    <p>Agende um test drive pelo seu smartphone ou computador.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Shop Method End-->
</main>
<?php include("rodape.php");
?>

<!--? Search model Begin -->
<div class="search-model-box">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-btn">+</div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Pesquisa.....">
        </form>
    </div>
</div>
<!-- Search model end -->

<!-- JS here -->
<script src="assets/js/vendor/modernizr-3.5.0.min.js"></script>
<script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.slicknav.min.js"></script>
<script src="assets/js/slick.min.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/animated.headline.js"></script>
<script src="assets/js/jquery.magnific-popup.js"></script>
<script src="assets/js/jquery.scrollUp.min.js"></script>
<script src="assets/js/jquery.sticky.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/main.js"></script>
</body>

</html>