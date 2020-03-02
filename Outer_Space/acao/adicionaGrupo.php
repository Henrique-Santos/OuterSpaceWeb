<?php
session_start();

include "../bancoOuterSpace/banco.php";

$usuario = $_SESSION["usuario"];

$grupo = $_SESSION["dadosGrupo"];

$idGrupo = $grupo[0]["idGrupo"];

$nick = $usuario["nick"];

$codigo = $grupo[0]["codigo"];

$erro = 0;

onConexao();

$pertenceGrupo = selecionar("SELECT u.nick, g.descricaoGrupo, g.codigo
                            FROM usuario u INNER JOIN usuariogrupo ug 
                            ON u.idUsuario = ug.usuario_idUsuario 
                            INNER JOIN grupo g 
                            ON ug.grupo_idGrupo = g.idGrupo
                            WHERE nick = '$nick'");

offConexao();

foreach($pertenceGrupo as $array) {
    foreach($array as $chave => $valor) {
        if($chave == 'codigo' && $valor == $codigo) {
            $erro = 1;  
        } 
    }
}

if($erro == 1) {
    header("Location: ../paginas/auxGrupo/codigoGrupo.php?msg=3");
} else {

    onConexao();

    $arrayUsuario = selecionar("SELECT * FROM usuario WHERE nick = '$nick'");

    $idUsuario = array_column($arrayUsuario, "idUsuario");

    $idUsuario = implode("", $idUsuario);

    $usuarioGrupo = array("grupo_idGrupo" => $idGrupo, "usuario_idUsuario" => $idUsuario);

    inserir('usuarioGrupo', $usuarioGrupo);

    $rankingGrupo = array("grupo_idGrupo" => $idGrupo, "usuario" => $nick, "ponto" => 0);

    inserir('rankinggrupo', $rankingGrupo);

    $sucesso = mysqli_affected_rows($conexao);

    offConexao();

    $descricaoGrupo = $grupo[0]["descricaoGrupo"];

    $ranking = array("nick" => $nick,"descricaoGrupo" => $descricaoGrupo);

    if($sucesso >= 1) {
        $_SESSION["rankingGrupo"] = $ranking;
        header("Location: rankingGrupo.php?id=$idGrupo");
    } else {
        header("Location: ../paginas/auxGrupo/codigoGrupo.php?msg=2");
    }

}

?>
