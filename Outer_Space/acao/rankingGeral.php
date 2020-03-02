<?php
include "../bancoOuterSpace/banco.php";
onConexao();
$ranking = selecionar("SELECT nick, pontos FROM usuario WHERE permissao = 0 ORDER BY pontos Desc Limit 10");
offConexao();
?>
