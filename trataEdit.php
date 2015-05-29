<?php


$cod = $_GET['codigo'];
$pnome = $_GET['pnome'];
$snome = $_GET['snome'];
$idade = $_GET['idade'];
$tel = $_GET['tel'];
$email = $_GET['email'];

//Banco
$link = mysql_connect("localhost", "root", "");
$bd = mysql_select_db("banco", $link);

$sql = mysql_query("UPDATE cadastro SET nome = '$pnome', sobrenome = '$snome', idade = $idade, telefone = '$tel', email = '$email' WHERE codigo = $cod;", $link);
mysql_close($link);

?>