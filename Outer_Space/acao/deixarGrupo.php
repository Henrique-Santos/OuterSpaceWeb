<?php
include "../bancoOuterSpace/banco.php";

session_start();

$codigo = $_GET["cod"];

$dados = $_SESSION["usuario"];

$idUsuario = $dados["idUsuario"];

$nick = $dados["nick"];

onConexao();

$idGrupo = selecionar("SELECT idGrupo FROM grupo WHERE codigo = '$codigo'");

$idGrupo = $idGrupo[0]["idGrupo"];

apagar("DELETE FROM rankinggrupo
        WHERE grupo_idGrupo = '$idGrupo'
        AND usuario = '$nick'");
        
apagar("DELETE FROM usuariogrupo
        WHERE usuario_idUsuario = '$idUsuario'
        AND grupo_idGrupo = '$idGrupo'");

$sucesso = mysqli_affected_rows($conexao);

offConexao();

if($sucesso >= 1) {
    header("Location: ../paginas/grupo.php?msg=2");
} else {
    header("Location: ../acao/mensagem/msg_banco.php");
}

?>