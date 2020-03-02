<?php
session_start();
print_r($_SESSION);
if(!empty($_SESSION["usuario"])) {
    unset($_SESSION["usuario"]);
    header("Location: ../index.php?pagina=sair");
}
?>