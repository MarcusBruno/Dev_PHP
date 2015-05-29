<?php
session_start();
if (!isset($_SESSION["logado"]) || $_SESSION["logado"] != TRUE) {
    header("Location: login.php");
}
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <?php

    $link = mysql_connect("localhost", "root", "");
    $bd = mysql_select_db("banco", $link);


    $busca = mysql_query("SELECT * FROM cadastro", $link);
    mysql_close($link); //Encerra a ligação com o banco.
    
    echo '<div id="listar" class="container_box_reg">';
    while ($reg = mysql_fetch_array($busca)) {
        echo '<div class="box_reg">';
        echo "Código: " . $reg['codigo'];
        echo '<button class="bt_reg" onclick="validaRota(' . $reg['codigo'] . ')">Delete</button>';
        echo '<button class="bt_reg" onclick="realizaAcaoCad(' . $reg['codigo'] . ')">Editar</button>';
        echo '<br><br>';
        echo "Nome: " . $reg['nome'];
        echo '<br><br>';
        echo "Sobrenome: " . $reg['sobrenome'];
        echo '<br><br>';
        echo "Idade: " . $reg['idade'];
        echo '<br><br>';
        echo "Telefone: " . $reg['telefone'];
        echo '<br><br>';
        echo "Email: " . $reg['email'];
        echo '<br><br>';
        echo '</div>';
    }
    echo '</div>';
    ?>
</html>