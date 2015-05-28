<?php
session_start();
if (!isset($_SESSION["logado"]) || $_SESSION["logado"] != TRUE) {
    header("Location: login.php");
}

$pnome = $_POST['pnome'];
$snome = $_POST['snome'];
$idade = $_POST['idade'];
$tel = $_POST['tel'];
$email = $_POST['email'];

$link = mysql_connect("localhost", "root", "");
$bd = mysql_select_db("banco", $link);
mysql_query("INSERT INTO cadastro(nome, sobrenome, idade, telefone, email) VALUES ('$pnome', '$snome', $idade,'$tel', '$email')", $link);
mysql_close($link);


header("Location:index.php");
?>