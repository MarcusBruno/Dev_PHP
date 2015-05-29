<?php
session_start();
if (!isset($_SESSION["logado"]) || $_SESSION["logado"] != TRUE) {
    header("Location: login.php");
}

$pnome = $_GET['pnome'];
$snome = $_GET['snome'];
$idade = $_GET['idade'];
$tel = $_GET['tel'];
$email = $_GET['email'];

$link = mysql_connect("localhost", "root", "");
$bd = mysql_select_db("banco", $link);
mysql_query("INSERT INTO cadastro(nome, sobrenome, idade, telefone, email) VALUES ('$pnome', '$snome', $idade,'$tel', '$email')", $link);
mysql_close($link);

?>