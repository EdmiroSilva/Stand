<?php
include("funcoes.php");
$erros = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = obterIdSessao();
    $conexao = obterConexaoBD();

    $email = mysqli_real_escape_string($conexao, $_POST["email"]);
    $password = mysqli_real_escape_string($conexao, $_POST["password"]);

    $consulta = mysqli_query($conexao, "SELECT * FROM utilizadores_stand WHERE email= '$email'");
    if ($consulta->num_rows == 0) {
        $erros = "Utilizador ou palavra passe inválidos";
    } else {
        $infoUtilizador = mysqli_fetch_array($consulta);
        $hashUtilizador = $infoUtilizador["password"];
        if (password_verify($password, $hashUtilizador)) {
            session_start();
            $_SESSION["id"] = $infoUtilizador["id"];
            header("Location: utilizador.php");
        } else {
            $erros = "Utilizador ou Palavra passe inválidos!";
        }
    }
}
?>

<?php include("cabecalho.php");
?>
<main>
    <!-- Hero Area Start-->
    <div class="slider-area ">
        <div class="single-slider slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Login</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area End-->
    <!--================login_part Area =================-->
    <section class="login_part section_padding ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <h2>Novo no nosso site?</h2>
                            <p>Tire partido de todas as vantagens do nosso site. <br>Começe por:</p>
                            <a href="registo.php" class="btn_3">Criar uma conta</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>Bem vindo de volta ! <br>
                                Inicie a sua sessão</h3>
                            <form class="row contact_form" action="#" method="post">
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Palavra-passe">
                                </div>
                                <div class="col-md-12 form-group p_star error"><?= $erros ?></div>
                                <div class="col-md-12 form-group">
                                    <button type="submit" value="submit" class="btn_3">Iniciar sessão</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================login_part end =================-->
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