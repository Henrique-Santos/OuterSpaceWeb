<pre>
<?php
session_start();
include "../../bancoOuterSpace/banco.php";
if(isset($_SESSION["usuario"])){
    $usuario = $_SESSION["usuario"];
    $idUsuario = $usuario["idUsuario"];
    $nick = $usuario["nick"];
    $pont = $_GET["pont"];
    $id_fase = $_GET["fase"];
    $id_fase++;
}
echo $id_fase;
echo $pont;

onConexao();

$arrayPonto = selecionar("SELECT maxPonto, pontos, pontuacao FROM usuario WHERE idUsuario = '$idUsuario'");
$maxPonto = $arrayPonto[0]["maxPonto"];
$auxPont = $arrayPonto[0]["pontos"];
$pontuacao = $arrayPonto[0]["pontuacao"];

if($maxPonto<$pont){
    $maxPonto=$pont;
}

$auxPont+=$pont;
$pontuacao+=$pont;
//"maxPonto"=>$maxPonto,
$dados= array("idUsuario"=>$idUsuario, "fase_idFase"=>$id_fase,"maxPonto"=>$maxPonto,"pontos"=>$auxPont,"pontuacao"=>$pontuacao);
alterar("usuario",$dados,"idUsuario=".$idUsuario);



//ATUALIZA FASE
//ATUALIZA PONTUAÇÃO


$arrayPergunta = selecionar("SELECT * FROM pergunta");

offconexao();

$n = count($arrayPergunta);

$rand = rand(1, $n);
    
if($n == 0) {
    echo "Não há nenhuma pergunta cadastrada";
    header("Location: ../../paginas/jogo.php");
} else {
    onConexao();
    $perguntaSelecionada = selecionar("SELECT * FROM pergunta WHERE idPergunta = '$rand'");
    $alternativa = selecionar("SELECT * FROM alternativa WHERE pergunta_idPergunta = '$rand'");
    offConexao();
    $pergunta = array($perguntaSelecionada, $alternativa);
    print_r($pergunta);
    $_SESSION["pergunta"] = $pergunta;
    header("Location: ../../interacaoJogo/telaPergunta.php");
}

/*
foreach($arrayPergunta as $array) {
    foreach($array as $chave => $valor) {
        if($chave == "idPergunta") {
            $idPergunta[] = $valor;
        }
    }
    $random = array_rand($idPergunta, 1);

    foreach($array as $chave => $valor) {
        echo $valor;
        if($chave == "idPergunta" && $valor != $random) {
            echo $chave[$valor];
            $pergunta[] = $chave[$valor];
        }
    }
}*/

?>
</pre>