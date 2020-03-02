<?php
session_start();
include "../bancoOuterSpace/banco.php";
if(isset($_SESSION["usuario"])){
    $usuario = $_SESSION["usuario"];
    $nick = $usuario["nick"];
}
onConexao();

$id_usuario = $usuario["idUsuario"];

$grupo = selecionar("SELECT * FROM usuariogrupo WHERE usuario_idUsuario = '$id_usuario'");

offConexao();

$usuario_idUsuario = $grupo[0]["usuario_idUsuario"];

if($id_usuario==$usuario_idUsuario){
    header ("Location: ../paginas/auxGrupo/carregaGrupo.php");
}else{
    header ("Location: ../acao/mensagem/msg_grupo.php");
}
?>