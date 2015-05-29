<?php
session_start();
if (!isset($_SESSION["logado"]) || $_SESSION["logado"] != TRUE) {
    header("Location: login.php");
}
$valor = $_GET['valor'];
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <?php
    //Conexão com o Banco
    $link = mysql_connect("localhost", "root", "");
    $bd = mysql_select_db("banco", $link);

    $query_string = "SELECT * FROM `usuario` WHERE `usuario` LIKE '%$valor%' OR `codigo` = '$valor'";
    $busca = mysql_query($query_string) or die (mysql_error());


    echo '<div id="listarUsuario" class="container_reg_usuario">';
while( $reg = mysql_fetch_assoc($busca) ) {

    echo '<div class="box_reg_usuario">';
    echo '<span class="bt_reg" onclick="validaRotaNU(' . $reg['codigo'] . ')" id="botaoExcluir"><a href="#"></a></span>';
    echo '<span class="bt_reg" onclick="realizaAcaoUsu(' . $reg['codigo'] . ')" id="botaoEditar"><a href="#"></a></span>';      
    echo 'Código: ' . $reg['codigo'];
    echo '<br>';
    echo 'Usuario: ' . $reg['usuario'];
    echo '<br>';
    echo 'Senha: ' . $reg['senha'];
    echo '</div>';
}
echo '</div>';
    mysql_close($link); //Encerra a ligação com o banco.
    ?>
</html>
