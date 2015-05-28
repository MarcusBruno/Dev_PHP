<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulário de Preenchimento</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        
        
        <?php
        include 'menu.php';
        $cod = $_GET['codigo'];

        $link = mysql_connect("localhost", "root", "");
        $bd = mysql_select_db("banco", $link);

        $sql = mysql_query("SELECT * FROM usuario WHERE codigo = $cod", $link);
        $reg = mysql_fetch_array($sql);

        mysql_close($link);
        
        
        ?>
        <script>
            function confirmar() {


                r = confirm("Você tem certeza ?");
                if (r == true) {
                    location.href = "trataEditNU.php";
                } else {
                    location.href = "index.php";
                }

            }

            /*function mascara(telefone) {
                if (telefone.value.length == 0)
                    telefone.value = '(' + telefone.value; //quando começamos a digitar, o script irá inserir um parênteses no começo do campo.
                if (telefone.value.length == 3)
                    telefone.value = telefone.value + ') '; //quando o campo já tiver 3 caracteres (um parênteses e 2 números) o script irá inserir mais um parênteses, fechando assim o código de área.
                if (telefone.value.length == 9)
                    telefone.value = telefone.value + '-';
            }*/

        </script>
    </head>
    <body>
        <form id="form_edit_cadastro" method="post" name="form_cadastro" action="trataEditNU.php">
            <input type="hidden" name="insere" value="sim">
            <table>
                <input type='hidden' id="codigo" name="codigo" value="<?php echo $reg['codigo']; ?>">
                <tr>
                    <td>
                        <label class="label">Usuário:</label>
                        <br>
                        <input type='text' class="caixa_entrada_NU" id="usuario" name="usuario" value="<?php echo $reg['usuario']; ?>">

                    </td>
                </tr>
                <tr>
                    <td>
                        <br>
                        <label class="label">Senha:</label>                        
                        <input type="password" class="caixa_entrada_NU" id="senha" name="senha" value="<?php echo $reg['senha']; ?>"> 
                        <br>
                    </td>
                </tr>                
                <tr>
                    <td>

                        <input type="submit" id="enviar" value="Enviar" onclick="confirmar()">
                        <a href="trataDadosListaUsuario.php"><input type="button" id="back" value="Voltar"></a>

                    </td>                
                </tr>
            </table>
        </form>
    </body>
</html>