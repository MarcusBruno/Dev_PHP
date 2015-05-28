<?php

if (!isset($_SESSION["logado"]) || $_SESSION["logado"] != TRUE) {
    header("Location: login.php");
}

$cod = $_POST['codigo'];
$pnome = $_POST['pnome'];
$snome = $_POST['snome'];
$idade = $_POST['idade'];
$tel = $_POST['tel'];
$email = $_POST['email'];

//Banco
$link = mysql_connect("localhost", "root", "");
$bd = mysql_select_db("banco", $link);

$sql = mysql_query("UPDATE cadastro SET nome = '$pnome', sobrenome = '$snome', idade = $idade, telefone = '$tel', email = '$email' WHERE codigo = $cod;", $link);
mysql_close($link);

echo 'Alterado com Sucesso !';

header("Location:index.php");
?>