<?php
session_start();
include "../../bancoOuterSpace/banco.php";

if(isset($_SESSION["usuario"])){
    $usuario = $_SESSION["usuario"];
    $idUsuario = $usuario["idUsuario"];
    $nick = $usuario["nick"];
    $pont = $_POST["pont"];
    //echo $pont;
    onConexao();
    $arrayPonto = selecionar("SELECT maxPonto, pontos FROM usuario WHERE idUsuario = '$idUsuario'");
    $maxPonto = $arrayPonto[0]["maxPonto"];
    $auxPont = $arrayPonto[0]["pontos"];

    if($maxPonto<$pont){
        $maxPonto=$pont;
    }
    $auxPont+=$pont;
    $id_fase=1;
    $pontuacao=0;
    $dados= array("idUsuario"=>$idUsuario,"fase_idFase"=>$id_fase,"maxPonto"=>$maxPonto,"pontos"=>$auxPont,"pontuacao"=>$pontuacao);
    alterar("usuario",$dados,"idUsuario=".$idUsuario);

    $idGrupo = selecionar("SELECT grupo_idGrupo FROM usuariogrupo WHERE usuario_idUsuario = '$idUsuario'");
    if($idGrupo!=NULL){
        $id_grupo=$idGrupo[0]["grupo_idGrupo"];
        $pontogrupo =selecionar("SELECT ponto FROM rankinggrupo WHERE grupo_idGrupo = '$id_grupo'");
        $auxPontGrupo = $pontogrupo[0]["ponto"];
        $auxPontGrupo+=$pont;
        echo $auxPontGrupo;
        $dadosGrupo= array("ponto"=>$auxPontGrupo);
        print_r($dadosGrupo);
        alterar("rankinggrupo",$dadosGrupo,"usuario='$nick'");
    }
    offConexao();
}
?>