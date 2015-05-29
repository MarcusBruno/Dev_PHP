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
    
    $query_string = "SELECT * FROM `cadastro` WHERE `codigo` = '$valor' OR `nome` LIKE '%$valor%' OR `sobrenome` LIKE '%$valor%' OR `telefone` LIKE '%$valor%' OR `email` LIKE '%$valor%'";
    $busca = mysql_query($query_string) or die (mysql_error());
    
    
    
    echo '<div id="listar" class="container_box_reg">'; 
    while( $reg = mysql_fetch_assoc($busca) ) {
        echo '<div class="box_reg">';
        echo "Código: " . $reg['codigo'];
        echo '<span class="bt_reg" onclick="validaRota(' . $reg['codigo'] . ')" id="botaoExcluir"><a href=""></a></span>';
        echo '<span class="bt_reg" onclick="realizaAcaoCad(' . $reg['codigo'] . ')" id="botaoEditar"><a href=""></a></span>';
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
      mysql_close($link); //Encerra a ligação com o banco.
    ?>
</html>
