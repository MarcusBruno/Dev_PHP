<?php
session_start();

if (!isset($_SESSION["logado"]) || $_SESSION["logado"] != TRUE) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Tela Inicial</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script>
            
            iniciaAjax();
            function IniciaAJAX() { //Validação da API AJAX
//Objeto 
                var ajax;

                if (window.XMLHttpRequest) {
                    ajax = new XMLHttpRequest();
                    ajax.overrideMimeType('text/xml');
                } else if (window.ActiveXObject) {
                    ajax = new ActiveXObject("Msxml2.XMLHTTP");
                    if (!ajax) {
                        ajax = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                } else {
                    alert("Seu navegador não possui suporte a essa aplicação !")
                }
                return ajax;
            }
            
            ajax.onreadystatechange = function(){
                ajax.open('POST', 'index.php', true);
                
                ajax.send(null);
            }
            
            
            ajax.onreadystatechange = function inserirCadastro(){
               ajax.open('POST', 'cadastrar.php', true);
                
               ajax.send(null);
           }
        </script>
        <meta charset="UTF-8">
        <script>

            function validaRota(id) {
                r = confirm("Você tem certeza ?");
                if (r == true) {
                    location.href = "trataDadosExcluir.php?codigo=" + id + "";
                } else {
                    location.href = "index.php";
                }
            }

            function validaRotaNU(id) {
                r = confirm("Você tem certeza ?");
                if (r == true) {
                    location.href = "trataDadosExcluirNU.php?codigo=" + id + "";
                }
            }
        </script>
    </head>
    <body>
        <header id="body_menu">
            <form  name="form_index" id="form_index">
                <div id="box-bt-menu">
                <button name="Bt1" href="cadastrar.php" class="botoes" formaction="cadastrar.php" formmethod="POST" id="botao1" onclick="inserirCadastro()">Inserir</button>
                <button value="sim" name="btListar" id="btListar" id="botao2" formmethod="POST" formaction="index.php">Listar</button>
                <button name="btNU" href="newUser.php" class="botoes"  formmethod="POST" formaction="trataDadosDoNovoU.php" id="botao3">Novo Usuário</button>
                <button name="btListarU" id="btListarU" class="botoes" formmethod="POST" formaction="trataDadosListaUsuario.php" onclick="listaUsuarios()">Listar Usuários</button>
                <button name="btSair" id="btSair" class="botoes" formmethod="POST" formaction="trataSaida.php" >Sair</button>
                </div>
            </form>
        </header>
    </body>        
</html>
