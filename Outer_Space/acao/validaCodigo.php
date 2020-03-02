<pre>
<?php
session_start();
include "../bancoOuterSpace/banco.php";

$dados = $_POST;

$codigo = $dados["codigo"];

onConexao();

$arrayDados = selecionar("SELECT * FROM grupo WHERE codigo = '$codigo'");

offConexao();

if(!empty($arrayDados)) {
    $_SESSION["dadosGrupo"] = $arrayDados;
    header("Location: adicionaGrupo.php");
} else {
    header("Location: ../paginas/auxGrupo/codigoGrupo.php?msg=1");
}
?>
<pre>