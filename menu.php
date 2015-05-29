<?php
session_start();
if (!isset($_SESSION["logado"]) || $_SESSION["logado"] != TRUE) {
    header("Location: login.php");
}
?>
<!DOTCYPE html>
<html>
    <head>
        <title> Tela Inicial</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link href='http://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>  
        <script src="jquery-2.1.1.js"></script>
        <!--Função de Mascára-->
        <script src="jquery.maskedinput.min.js"></script>
        <!-- Script de Tratamento dos Eventos utilizando Ajax -->
        <script>
            $(document).ready(function () {
                $('.phone_with_ddd').mask('(99) 9999-9999');
            });

            /** Função Ajax **/
            function loadPageDoc(doc, div) {
                var xmlhttp;
                if (window.XMLHttpRequest) {
                    xmlhttp = new XMLHttpRequest();
                } else {// code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        document.getElementById(div).innerHTML = xmlhttp.responseText;
                    } else {
                        document.getElementById(div).innerHTML = "<img src='_images/loading.gif' id='loading'/>";
                    }
                }
                xmlhttp.open("POST", doc, true);
                xmlhttp.send();
            }

            //Função de Tratamento de Novos Cadastros de Pessoas
            function cadastrarNovaPessoa(pnome, snome, idade, tel, email) {
                var c = confirm("Você tem certeza ?");
                if (c == true) {
                    loadPageDoc("trataDadosInsercao.php?pnome=" + pnome + "&snome=" + snome + "&idade=" + idade + "&tel=" + tel + "&email=" + email + "", "listar");
                    alert("Cadastrado com Sucesso !");
                }
                loadPageDoc("index.php", "listar");
            }

            //Função de Tratamento de Cadastro de Novos Usuários do Sistema
            function salvarNovoUsu(usuario, senha) {
                var c = confirm("Você tem certeza ?");
                if (c == true) {
                    loadPageDoc("trataDadosNewUser.php?usuario=" + usuario + "&senha=" + senha + "", "listar");
                }
                alert("Realziado com Sucesso !")
                loadPageDoc('trataDadosListaUsuario.php', 'listar');
            }

            //Editar Cadastro dos Usuarios do Sistema.
            function realizaAcaoUsu(id) {
                loadPageDoc("EditarCadastroNU.php?codigo=" + id + "", "listar");
            }

            //Função de Tratamento para a Edicação dos campos de Login e Senha dos Usuários
            function confirmarEdicaoUsuario(codigo, usuario, senha) {
                var r = confirm("Você tem certeza ?");
                if (r == true) {
                    loadPageDoc("trataEditNU.php?codigo=" + codigo + "&usuario=" + usuario + "&senha=" + senha + "", "listar");
                }
                alert("Alterado com Sucesso !");
                loadPageDoc('trataDadosListaUsuario.php', 'listar');
            }

            //** Chamada da Função Ajax para mostrar os cadastrados**//
            function mostraCadastro() {
                loadPageDoc("index.php", "listar");
            }

            /** Edição de Cadastros e Usuários **/
            ///Editar Cadastros das Pessoas Cadastradas
            function realizaAcaoCad(id) {
                loadPageDoc("EditarCadastro.php?codigo=" + id + "", "listar");
            }

            //Função de Tratamento de Edição das informações dos Cadastrados 
            function confirmarEdicaoCadastro(codigo, pnome, snome, idade, tel, email) {
                var c = confirm("Você tem certeza ?");
                if (c == true) {
                    loadPageDoc("trataEdit.php?codigo=" + codigo + "&pnome=" + pnome + "&snome=" + snome + "&idade=" + idade + "&tel=" + tel + "&email=" + email + "", "listar");
                }
                alert("Alterado com Sucesso !");
                loadPageDoc("index.php", "listar");
            }

            /** Botão de Voltar **/
            //Ação de Voltar
            function confirmarBack() {
                var r = confirm("Você tem certeza ?");
                if (r == true) {
                    loadPageDoc("index.php", "listar");
                }
            }

            /**Exclusão**/
            // Verifica se o usuário quer realmente excluir o usuario na page Listar Cadastro - Ação de Exclusão - OK
            function validaRota(id) {
                var r = confirm("Você tem certeza ?");
                if (r == true) {
                    loadPageDoc("trataDadosExcluir.php?codigo=" + id + "", "listar");
                    alert("Excluido com Sucesso !");
                    loadPageDoc("index.php", "listar");
                }
            }

            // Verifica se o usuário quer realmente excluir o usuario na page Listar Usuario - Ação de Exclusão - OK
            function validaRotaNU(id) {
                r = confirm("Você tem certeza ?");
                if (r == true) {
                    loadPageDoc("trataDadosExcluirNU.php?codigo=" + id + "", "listar");
                    alert("Excluido com Sucesso !");
                    loadPageDoc("trataDadosListaUsuario.php", "listar");
                }
            }

            function realizaBusca(valor) {
                if (valor == "") {
                    alert("Pesquisa Inválida !");
                } else {
                    loadPageDoc("trataBusca.php?valor=" + valor, "listar");
                    loadPageDoc("trataBuscaUsuario.php?valor=" + valor, "buscarUsuario");
                }
            }
            function limparDivBuscarUsuario(){
                document.getElementById("buscarUsuario").innerHTML = "";
            }
        </script>

    </head>
    <body onload="mostraCadastro()">
        <header id="body_menu">            
            <div id="box-bt-menu">
                <a class="botao" href="#" onclick="limparDivBuscarUsuario();loadPageDoc('cadastrar.php', 'listar')">Inserir</a>
                <a class="botao" href="#" onclick="limparDivBuscarUsuario();loadPageDoc('index.php', 'listar')">Listar</a>
                <a class="botao_composto" href="#" onclick="limparDivBuscarUsuario();loadPageDoc('newUser.php', 'listar')">Novo Usuário</a>
                <a class="botao_composto" href="#" onclick="limparDivBuscarUsuario();loadPageDoc('trataDadosListaUsuario.php', 'listar')">Listar Usuários</a>
                <a class="botao" href="trataSaida.php">Sair</a>
            </div>           
            <!-- Menu -->
            <div id="box-search">
                <input type="text" id="campoBusca" name="campoBusca">
                <span id="bt-busca" onclick="realizaBusca(document.getElementById('campoBusca').value)"></span>
            </div>
        </header>
        <article>
            <section id="listar">

            </section>
            <br>
            <section id="buscarUsuario">

            </section>
            <!-- Sessão onde será exibido todo o conteúdo, através do Ajax -->

        </article>
    </body>        
</html>
