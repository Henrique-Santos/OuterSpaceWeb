<?php
session_start();

include "../bancoOuterSpace/banco.php";

$resposta = $_POST["resp"];

$pergunta = $_SESSION["pergunta"];

$idPergunta = $pergunta[0][0]["idPergunta"];

onConexao();

$arrayResposta = selecionar("SELECT descricaoAlternativa, opcaoCorreta FROM alternativa WHERE descricaoAlternativa = '$resposta' AND pergunta_idPergunta = '$idPergunta'");

offConexao();

if($arrayResposta[0]["opcaoCorreta"] == 1) {
    echo 1;
} else {
    echo 2;
}
?>