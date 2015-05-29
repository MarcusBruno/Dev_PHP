<?php
session_start();
if (!isset($_SESSION["logado"]) || $_SESSION["logado"] != TRUE) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulário de Preenchimento</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="jquery-2.1.1.js"></script>

        <!--Função de Mascára-->
        <script src="jquery.maskedinput.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.phone_with_ddd').mask('(99) 9999-9999');
            });
        </script>
    </head>
    <body>
        <form id="form_cadastro" name="form_cadastro">
            <table>
                <tr>
                    <td>
                        <label class="label">Nome:</label>
                        <br>
                        <input type='text' id="pnome" name="pnome" class="caixa_entrada_inserir">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="label">Sobrenome:</label>
                        <br>
                        <input type="text" id="snome" name="snome" class="caixa_entrada_inserir"> 
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="label">Idade:</label>
                        <br>
                        <input type="text" id="idade" name="idade" class="caixa_entrada_inserir">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="label">Telefone</label>
                        <br>
                        <input type="tel" id="tel" name="tel" value="" class="phone_with_ddd caixa_entrada_inserir">
                    <td>
                </tr>
                <tr>
                    <td>
                        <label class="label">Email:</label>
                        <br>
                        <input type="email" id="email" name="email" class="caixa_entrada_inserir">
                    </td>
                </tr>
                <tr>
                    <td>
                        <br>
                        <div  class="box_bts">
                            
                            <input type="submit" value="Cadastrar" onclick="cadastrarNovaPessoa(document.getElementById('pnome').value, document.getElementById('snome').value, document.getElementById('idade').value, document.getElementById('tel').value, document.getElementById('email').value)">
                            <input type="reset" id="limpar" value="Limpar">
                            <a href="#" onclick="confirmarBack()"><input type="button" value="Voltar"></a>
                        </div>
                    </td>                
                </tr>
            </table>
        </form>
    </body>
</html>