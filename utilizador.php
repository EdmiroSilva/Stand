<?php
session_start();
include("funcoes.php");

validarSessao();
$id = obterIdSessao();
$conexao = obterConexaoBD();
$consulta = mysqli_query($conexao, "SELECT * FROM utilizadores_stand WHERE id= $id");

$infoUtilizador = mysqli_fetch_array($consulta);
$nomeUtilizador = $infoUtilizador["nome"];
$emailUtilizador = $infoUtilizador["email"];

if (isset($_POST["nome"]) && isset($_POST["email"])) {
    $nomeUtilizador = mysqli_real_escape_string($conexao, $_POST["nome"]);
    $emailUtilizador = mysqli_real_escape_string($conexao, $_POST["email"]);

    mysqli_query($conexao, "UPDATE utilizadores_stand SET email= '$emailUtilizador', nome='$nomeUtilizador' WHERE id=$id");
}

include("cabecalho.php");
?>

<main>
    <div class="slider-area ">
        <div class="single-slider slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Dados <?= $nomeUtilizador ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="user section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <h3>Alterar dados</h3>
                    <form class="row contact_form" action="#" method="post">
                        <div class="col-md-12 form-group p_star">
                            Nome:
                            <input type="text" value=" <?= $nomeUtilizador ?>" class="form-control" id="nome" name="nome" placeholder="Nome">
                        </div>
                        <div class="col-md-12 form-group p_star">
                            Email:
                            <input type="text" value=" <?= $emailUtilizador ?>" class="form-control" id="email" name="email" placeholder="Email">
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <button type="submit" value="submit" class="btn_3">Alterar</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 col-md-6">
                    <h3>Sair</h3>
                    <a class="btn_3" href="terminar_sessao.php">Terminar sessão</a>
                </div>
            </div>
        </div>
    </section>
    <section class="new-product-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section-tittle mb-70">
                        <h2>Os meus carros</h2>
                    </div>
                </div>
            </div>
            <div class="row">

                <?php
                $consultaMeusCarros = "SELECT carros_stand.*, marcas_stand.marca FROM carros_stand JOIN marcas_stand ON
                carros_stand.marca = marcas_stand.id
                WHERE utilizador = $id
                ORDER BY data_criacao DESC";

                $meusCarros = mysqli_query($conexao, $consultaMeusCarros);
                if ($meusCarros->num_rows > 0) {
                    while ($carro = mysqli_fetch_array($meusCarros)) {
                ?>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                            <div class="single-new-pro mb-30 text-center">
                                <div class="product-img">
                                    <img src="assets/img/carros/<?= $carro["imagem"] ?>" alt="">
                                </div>
                                <div class="product-caption">
                                    <h3><a href="carro.php?id=<?= $carro["id"] ?>"><?= $carro["marca"] ?></a></h3>
                                    <span><?= $carro["preco"] ?>€</span>
                                </div>
                                <div class="actions">
                                    <a href="vender.php?id=<?= $carro["id"] ?>" class="red-link">Editar</a>
                                    <a href="remover_carro.php?id=<?= $carro["id"] ?>" class="red-link">Remover</a>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo '<div class="col-xl-12">';
                    echo '<p>Sem carros para venda</p>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </section>
</main>
<?php include("rodape.php");
?>
<!--? Search model Begin -->
<div class=" search-model-box">
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