<?php
session_start();
if(!isset($_SESSION["usuario"])){
    header("Location: ../acao/mensagem/msg_permicao.php");
}
?>