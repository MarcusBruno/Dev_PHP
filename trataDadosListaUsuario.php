<?php
session_start();
if (!isset($_SESSION["logado"]) || $_SESSION["logado"] != TRUE) {
    header("Location: login.php");
}

$link = mysql_connect("localhost", "root", "");
$bd = mysql_select_db("banco", $link);

//Busca no Banco de todas os usuarios.
$sql = mysql_query("SELECT * FROM usuario", $link);
echo '<div id="listarUsuario" class="container_reg_usuario">';
while ($reg = mysql_fetch_array($sql)) {

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
mysql_close($link);

?>
