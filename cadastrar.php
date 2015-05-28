<?php
include 'menu.php';
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
        <form id="form_cadastro" method="post" name="form_cadastro" action="trataDadosInsercao.php">
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
                            <input type="submit" id="enviar" value="Enviar">
                            <input type="reset" id="limpar" value="Limpar">
                            <a href="index.php"><input type="button" value="Voltar"></a>
                        </div>
                    </td>                
                </tr>
            </table>
        </form>
    </body>
</html>
