<?php
//Verificação da Sessão
session_start();
if (!isset($_SESSION["logado"]) || $_SESSION["logado"] != TRUE) {
    header("Location: login.php");
}
$cod = $_GET['codigo'];

//Banco
$link = mysql_connect("localhost", "root", "");
$bd = mysql_select_db("banco", $link);
$flag = mysql_query("DELETE FROM usuario WHERE codigo = $cod", $link);
mysql_close($link);

?>