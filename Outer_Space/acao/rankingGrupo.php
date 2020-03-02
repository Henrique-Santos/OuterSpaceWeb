<?php
include "../bancoOuterSpace/banco.php";
session_start();

$idGrupo = $_GET["id"];

$dados = $_SESSION["rankingGrupo"];

onConexao();

$arrayDados = selecionar("SELECT u.nick, g.descricaoGrupo, rg.ponto, g.codigo
                            FROM usuario u INNER JOIN usuariogrupo ug 
                            ON u.idUsuario = ug.usuario_idUsuario 
                            INNER JOIN grupo g 
                            ON ug.grupo_idGrupo = g.idGrupo
                            INNER JOIN rankinggrupo rg 
                            ON g.idGrupo = rg.grupo_idGrupo 
                            WHERE g.idGrupo = $idGrupo AND u.nick = rg.usuario
                            ORDER BY rg.ponto DESC;");
$sucesso = mysqli_affected_rows($conexao);

offConexao();

if($sucesso >= 1) {
    $_SESSION["rankingGrupo"] = $arrayDados;
    //print_r($arrayDados);
    header("Location: ../paginas/auxGrupo/dadosGrupo.php");
} else {
    header("Location: ../acao/mensagem/msg_banco.php");
}

?>