<?php

function obterConexaoBD()
{
    return mysqli_connect("localhost", "formab5_user", "P4ssword", "formab5_bd_remota");
}

function validarSessao()
{
    if (!isset($_SESSION["id"])) {
        header("Location: login.php");
        exit;
    }
}

function obterIdSessao()
{
    return $_SESSION["id"];
}
