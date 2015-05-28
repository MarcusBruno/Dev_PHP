<?php
include 'menu.php';
echo '<br><br><br>';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> Novo Usuário</title>
    </head>
    <body>

    
    <form action="trataDadosNewUser.php" id="newUser" name="newUser" method="POST">
        <label>Nome do Usuário:</label>
        <br>
        <input type="text" id="user" name="user" class="caixa_entrada_NU">
        <br>
        <label>Digite a Senha: </label>
        <br>
        <input type="password" id="passUser" name="passUser" class="caixa_entrada_NU">
        <br>
        <input type="submit" value="Salvar" name="salvar" id="btSalvaNU">
        <input type="submit" value="Voltar" name="sair" id="btSair">
    </form>      

</body>
</html>
