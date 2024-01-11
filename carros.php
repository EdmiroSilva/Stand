<?php
include("funcoes.php");
session_start();
validarSessao();
$conexao = obterConexaoBD();
include("cabecalho.php");
?>
<main>
    <!--? Popular Items Start -->
    <div class="popular-items">
        <div class="container">
            <!-- Section tittle -->
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8 col-md-10">
                    <div class="section-tittle mb-70 text-center">
                        <h2>Carros</h2>
                        <p>Todos os carros disponíveis no stand online</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                $consultaTodosCarros = "SELECT carros_stand. *, marcas_stand.marca
                FROM carros_stand
                JOIN marcas_stand ON carros_stand.marca = marcas_stand.id ORDER BY data_criacao DESC";
                $todosCarros = mysqli_query($conexao, $consultaTodosCarros);
                while ($carro = mysqli_fetch_array($todosCarros)) {
                ?>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="single-popular-items mb-50 text-center">
                            <div class="popular-img">
                                <img src="assets/img/carros/<?= $carro["imagem"] ?>" alt="">
                                <div class="img-cap">
                                    <span>Ver</span>
                                </div>
                            </div>
                            <div class="popular-caption">
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
    </div>
    <!-- Popular Items End -->
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