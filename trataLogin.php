<?php

//Inicio da Sessão
session_start();

//Salvar usuário e senha do Login
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

verificarLogin($usuario, $senha);

function verificarLogin($usuario, $senha) {

    //Conexão com o Banco
    $link = mysql_connect("localhost", "root", "");
    $bd = mysql_select_db("banco", $link);

//Realiza a busca no banco.
    $busca = mysql_query("SELECT u.usuario, u.senha FROM usuario u WHERE u.usuario = '$usuario' AND u.senha = '$senha' ", $link);

    $reg = mysql_fetch_array($busca);
    $_SESSION["logado"] = null;
    if ($reg) {
        while ($reg) {
            if ($reg['usuario'] == $usuario AND $reg['senha'] == $senha) {
                $_SESSION["logado"] = true;
                $_SESSION["user"] = $usuario;
                header("Location:menu.php");
            } else {
                header("Location: login.php");
            }
        }
    } else {
        header("Location: login.php");
    }
    mysql_close($link);
}
?>