<?php
session_start();
if (!isset($_SESSION["logado"]) || $_SESSION["logado"] != TRUE) {
    header("Location: login.php");
}

$cod = $_GET['codigo'];
$usuario = $_GET['usuario'];
$senha = $_GET['senha'];


//Banco
$link = mysql_connect("localhost", "root", "");
$bd = mysql_select_db("banco", $link);

$sql = mysql_query("UPDATE usuario SET usuario = '$usuario', senha = '$senha' WHERE codigo = $cod;", $link);
mysql_close($link);
?>