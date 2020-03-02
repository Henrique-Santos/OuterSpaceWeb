<?php
session_start();
include "../bancoOuterSpace/banco.php";

$dados = $_SESSION["post"];

unset($dados["confir_senha"]);

$fase = array("fase_idFase" => 1);

onConexao();

$id = inserir('usuario', $dados);

alterar('usuario', $fase, "idUsuario = ". $id);

$sucesso = mysqli_affected_rows($conexao);

offConexao();

if($sucesso >= 1) {
   header("Location: ../acao/mensagem/msg_cadastro.php");
}else {
   header("Location: ../paginas/cadastro.php?msg=2");
}
?>