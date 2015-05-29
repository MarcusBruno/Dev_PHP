<?php

session_start();
if (!isset($_SESSION["logado"]) || $_SESSION["logado"] != TRUE) {
    header("Location: login.php");
}
$usuario = $_GET['usuario'];
$senha = $_GET['senha'];

if ($usuario == "" OR $senha == "") {
    echo 'erro';
} else {
    $link = mysql_connect("localhost", "root", "");
    $bd = mysql_select_db("banco", $link);
    $sql = "INSERT INTO usuario(usuario, senha) VALUES ('$usuario', '$senha')";
    mysql_query($sql, $link);
    mysql_close($link);
}
?>