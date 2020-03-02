<pre>
<?php
session_start();

include "../bancoOuterSpace/banco.php";

$userLogin = $_SESSION["usuario"];

$userLogin = $userLogin["nick"];

$dados = $_POST;

$descricaoGrupo = $dados["descricaoGrupo"];

$membro = $dados["usuario_idUsuario"];

onConexao();

$grupo = selecionar("SELECT * FROM grupo WHERE descricaoGrupo = '$descricaoGrupo'");

$usuario = selecionar("SELECT * FROM usuario WHERE nick = '$membro'");

offConexao();

$nomeGrupo = $grupo[0]["descricaoGrupo"];

if(($nomeGrupo == $descricaoGrupo) || empty($usuario)) {
    header("Location: ../paginas/auxGrupo/telaGrupo.php?msg=1");
} else if($userLogin <> $membro){
    header("Location: ../paginas/auxGrupo/telaGrupo.php?msg=2");
} else {
    $_SESSION["post"] = $_POST;
    header("Location: criaGrupo.php");
}
?>
</pre>