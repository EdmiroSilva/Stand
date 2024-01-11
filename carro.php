<?php
include("funcoes.php");
session_start();

if (!isset($_GET["id"])) {
    header("Location: index.php");
    exit;
}

$id = $_GET["id"];
$conexao = obterConexaoBD();
$resultadoCarros = mysqli_query($conexao, "SELECT carros_stand.*, marcas_stand.marca as marca, 
utilizadores_stand.nome as dono, utilizadores_stand.email as email_dono FROM carros_stand JOIN marcas_stand ON carros_stand.marca = marcas_stand.id
JOIN utilizadores_stand ON carros_stand.utilizador = utilizadores_stand.id WHERE carros_stand.id =$id");

$carro = mysqli_fetch_array($resultadoCarros);
include("cabecalho.php");
?>
<main>
    <!--================Single Product Area =================-->
    <div class="single_product product_image_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="single_product_text text-center">
                        <h3> <?= $carro["marca"] ?><?= $carro["modelo"] ?></h3>
                        <img src="assets/img/carros/<?= $carro["imagem"] ?>" alt="">
                        <h5 class="price"><?= $carro["preco"] ?>€</h5>

                        <h4 class="specs-title">Características</h4>
                        <div class="center-content">
                            <table class="car-specs">
                                <tr>
                                    <td>Marca</td>
                                    <td><?= $carro["marca"] ?></td>
                                </tr>
                                <tr>
                                    <td>Modelo</td>
                                    <td><?= $carro["modelo"] ?></td>
                                </tr>
                                <tr>
                                    <td>Ano</td>
                                    <td><?= $carro["ano"] ?></td>
                                </tr>
                                <tr>
                                    <td>Mês</td>
                                    <td><?= $carro["mes"] ?></td>
                                </tr>
                                <tr>
                                    <td>Cor</td>
                                    <td><?= $carro["cor"] ?></td>
                                </tr>
                            </table>
                            <table class="car-specs">
                                <tr>
                                    <td>Cavalos</td>
                                    <td><?= $carro["n_cavalos"] ?></td>
                                </tr>
                                <tr>
                                    <td>Kilometros</td>
                                    <td><?= $carro["kilometros"] ?></td>
                                </tr>
                                <tr>
                                    <td>Combustível</td>
                                    <td><?= $carro["combustivel"] ?></td>
                                </tr>
                                <tr>
                                    <td>Adicionado em</td>
                                    <td><?= $carro["data_criacao"] ?></td>
                                </tr>
                                <tr>
                                    <td>Pertence a</td>
                                    <td> <?= $carro["dono"] ?></td>
                                </tr>
                            </table>

                        </div>

                        <div class="card_area specs_btn">
                            <a href="mailto:<?= $carro["email_dono"] ?>" class="btn_3">Marcar test drive</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================End Single Product Area =================-->
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