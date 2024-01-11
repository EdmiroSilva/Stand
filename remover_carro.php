<?php
include("funcoes.php");
session_start();

if (isset($_GET["id"])) {
    $idCarro = $_GET["id"];
    $idUtilizador = obterIdSessao();

    $conexao = obterConexaoBD();
    $carroExisteSQL = "SELECT * FROM carros_stand WHERE utilizador = $idUtilizador AND id= $idCarro";
    $carroExiste = mysqli_query($conexao, $carroExisteSQL);

    if ($carroExiste->num_rows === 0) {
        header('Location: index.php'); // Tentar apagar veiculo de outro utilizador
    } else {
        mysqli_query($conexao, "DELETE FROM carros_stand WHERE id=$idCarro");
        header("Location: utilizador.php");
    }
} else {
    header("Location: index.php"); // 
}
