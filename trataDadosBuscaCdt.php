<?php

    session_start();
    if (!isset($_SESSION["logado"]) || $_SESSION["logado"] != TRUE) {
    header("Location: login.php");
}   

function buscaNoBanco($valor) {
    $buscaCdt = $_POST["buscaCdt"];

    $link = mysql_connect("localhost", "root", "");
    $bd = mysql_select_db("banco", $link);

    $sql = mysql_query("SELECT * FROM cadastro c WHERE c.codigo = $buscaCdt", $link);

    $registro = mysql_fetch_array($sql);

    echo '';
}

?>
