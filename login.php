    <!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="style.css">      
    </head>
    <body>
        <form action="trataLogin.php" id="trataLogin" name="trataLogin" method="POST">

            <label>Usuário: </label>
            <br>    
            <input type="texto" id="login" name="usuario" class="caixa_entrada_NU">
            <br>
            <label>Senha: </label>
            <br>
            <input type="password" id="senha" name="senha" class="caixa_entrada_NU">
            <br>
            <input type="submit" id="logar" value="Entrar">

        </form>
    </body>
</html>

