<?php

session_start();
if (!isset($_SESSION["logado"]) || $_SESSION["logado"] != TRUE) {
    header("Location: login.php");
}
$usuario = $_POST['user'];
$senha = $_POST['passUser'];

if ($usuario == "" OR $senha == "") {
    header("Location:index.php");
} else {
    incluiNovoUsuario($usuario, $senha);
}

function incluiNovoUsuario($usuario, $senha) {

    $sql = "INSERT INTO usuario(usuario, senha) VALUES ('$usuario', '$senha')";

    $link = mysql_connect("localhost", "root", "");
    $bd = mysql_select_db("banco", $link);

    mysql_query($sql, $link);
    echo 'Cadastro realizado com Sucesso';
    mysql_close($link);
}

header("Location: index.php");
?>