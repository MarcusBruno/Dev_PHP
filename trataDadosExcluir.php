<?php

    session_start();
    if (!isset($_SESSION["logado"]) || $_SESSION["logado"] != TRUE) {
        header("Location: login.php");
    }
    $cod = $_GET['codigo'];
    
    $link = mysql_connect("localhost", "root", "");
    $bd = mysql_select_db("banco", $link);
    mysql_query("DELETE FROM cadastro WHERE codigo = $cod", $link);
    mysql_close($link);
    
    echo 'Ok';
?>