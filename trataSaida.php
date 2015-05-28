<?php
session_start();
$_SESSION['logado'] = null;
session_destroy();
header("Location:login.php");
?>