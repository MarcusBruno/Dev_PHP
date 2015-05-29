<?php
session_start();
if (!isset($_SESSION["logado"]) || $_SESSION["logado"] != TRUE) {
    header("Location: login.php");
}
?>
<form id="newUser" name="newUser">
    <label>Nome do Usuário:</label>
    <br>
    <input type="text" id="user" name="user" class="caixa_entrada_NU">
    <br>
    <label>Digite a Senha: </label>
    <br>
    <input type="password" id="passUser" name="passUser" class="caixa_entrada_NU">
    <br>
    <input type="button" value="Salvar" id="btSalvaNU" onclick="salvarNovoUsu(document.getElementById('user').value, document.getElementById('passUser').value)">
    <input type="button" value="Voltar" onclick="confirmarBack()">
</form>      
