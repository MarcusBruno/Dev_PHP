<?php
session_start();
if (!isset($_SESSION["logado"]) || $_SESSION["logado"] != TRUE) {
    header("Location: login.php");
}

$cod = $_GET['codigo'];

$link = mysql_connect("localhost", "root", "");
$bd = mysql_select_db("banco", $link);

$sql = mysql_query("SELECT * FROM usuario WHERE codigo = $cod", $link);
$reg = mysql_fetch_array($sql);

mysql_close($link);
?>   
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulário de Preenchimento</title>
        <link rel="stylesheet" type="text/css" href="style.css">



    </head>
    <body>
        <form id='form_edit_cadastro'>
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
                       <input type="button" id="enviar" value="Salvar" onclick="confirmarEdicaoUsuario(document.getElementById('codigo').value, document.getElementById('usuario').value, document.getElementById('senha').value)">
                       <input type="button" value="Voltar" onclick="confirmarBack()">
                    </td>                
                </tr>
            </table>
        </form>
    </body>
</html>