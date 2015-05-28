<?php
//Barra de Menu
include 'menu.php';
//Chamada da Função
listarDados();

function listarDados() {
    $link = mysql_connect("localhost", "root", "");
    $bd = mysql_select_db("banco", $link);

    $busca = mysql_query("SELECT * FROM cadastro", $link);
    while ($reg = mysql_fetch_array($busca)) {
        echo '<div class="container_box_reg">';    
            echo '<div class="box_reg">';    
            echo "Código: " . $reg['codigo'];         
            echo '<button class="bt_reg" onclick="validaRota(' . $reg['codigo'] . ')">Delete</button>';
            echo '<a href="EditarCadastro.php?codigo=' . $reg['codigo'] . '"><input type="button" value="Editar" class="bt_reg"></a>';
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
        echo '</div>';
        
    }
    mysql_close($link); //Encerra a ligação com o banco.
}

?>