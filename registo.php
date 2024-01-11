<?php
session_start();
include("funcoes.php");
$erros = "";
$nome = "";
$email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conexao = obterConexaoBD();

    $nome = mysqli_real_escape_string($conexao, $_POST["nome"]);
    $email = mysqli_real_escape_string($conexao, $_POST["email"]);
    $password = mysqli_real_escape_string($conexao, $_POST["password"]);
    $confirmacao = mysqli_real_escape_string($conexao, $_POST["confirm"]);

    $validacoesVazio = array(
        "Nome" => $nome,
        "Email" => $email,
        "Password" => $password,
        "Confirmacao" => $confirmacao
    );

    foreach ($validacoesVazio as $campo => $valor) {
        if ($valor == "") {
            $erros .= "$campo é obrigatório<br>";
        }
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erros .= "Email inválido!<br>";
    }

    if (strlen($password) < 8) {
        $erros .= "A senha deve ter pelo menos 8 caracteres<br>";
    }

    if ($erros == "") {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $resultado = mysqli_query($conexao, "INSERT INTO utilizadores_stand  (email, nome, password) VALUES ('$email', '$nome', '$hash')");
        if ($resultado == false) {
            $erros .= "Erro na criação da conta";
        } else {
            header("Location: conta_criada.php");
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
                            <h2>Registo</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area End-->
    <section class="registration section_padding ">
        <div class="container">
            <div class="col-lg-12 col-md-12">
                <h3 class="text-center">Introduza os dados para o seu registo</h3>

                <form action="#" method="post">
                    <div class="row">
                        <div class="col-md-6 form-group p_star">
                            <div>Nome:</div>
                            <input type="text" value="<?= $nome ?>" class="form-control" id="nome" name="nome" placeholder="Nome">
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <div>Email:</div>
                            <input type="text" value="<?= $email ?>" class="form-control" id="email" name="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group p_star">
                            <div>Password:</div>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Palavra-passe">
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <div>Confirmação da password:</div>
                            <input type="password" class="form-control" id="confirm" name="confirm" placeholder="Confirmação da palavra-passe">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group error"><?= $erros ?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group error">
                            <button type="submit" value="submit" class="btn_3">Criar conta</button>
                        </div>
                    </div>

                </form>

            </div>

        </div>
    </section>
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