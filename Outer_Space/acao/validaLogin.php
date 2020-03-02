<?php
session_start();
$nick = isset($_POST["nick"]) ? $_POST["nick"] : "";
$senha = isset($_POST["senha"]) ? $_POST["senha"] : "";

include "../bancoOuterSpace/banco.php";

onConexao();

$arrayUsu = selecionar("SELECT * FROM usuario WHERE senha='$senha' and nick='$nick'");

offConexao();

if(empty($arrayUsu)) {
    header("Location: ../paginas/login.php?msg=1");
}else {
    $id_usuario = $arrayUsu[0]["idUsuario"];

    $permissao = $arrayUsu[0]["permissao"];

    $nick = $arrayUsu[0]["nick"];

    $senha = $arrayUsu[0]["senha"];

    $usuario = array("idUsuario"=>$id_usuario ,"nick"=>$nick, "senha"=>$senha, "permissao"=>$permissao);
    
    $_SESSION["usuario"] = $usuario;

    if($usuario["permissao"] == 1) {
        header("Location: ../paginas/pagsAdm/menuAdm.php");
    }else {
        header("Location: ../paginas/saudacoes.php");
    }
}
?>