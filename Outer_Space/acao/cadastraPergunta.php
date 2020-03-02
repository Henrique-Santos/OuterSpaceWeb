<pre>
<?php
include "../bancoOuterSpace/banco.php";

$dados = $_POST;

$bonus = rand(1, 4);

$tema = $dados["tema"];

if($tema == "tecnologia") {
    $idTema = 1;
} else {
    $idTema = 2;
}

$tema = array("tema_idTema" => $idTema);

unset($dados["tema"]);

$opcaoCorreta = $dados["resposta"];
unset($dados["resposta"]);

$pergunta = array("descricaoPergunta" => $dados["pergunta"], "bonus_idBonus" => $bonus);
unset($dados["pergunta"]);

$alternativa = $dados;

onConexao();

$id = inserir('pergunta', $pergunta);

alterar('pergunta', $tema, "idPergunta = ". $id);

foreach($alternativa as $chave => $valor) {
       if($chave == $opcaoCorreta) {
            $certa = array("descricaoAlternativa" => $valor, "opcaoCorreta" => 1, "pergunta_idPergunta" => $id);
            inserir('alternativa', $certa);
            unset($alternativa[$chave]);
       }else {
           $errada = array("descricaoAlternativa" => $valor, "opcaoCorreta" => 0, "pergunta_idPergunta" => $id);
           inserir('alternativa', $errada);
       }
}

offConexao();

header("Location: ../paginas/pagsAdm/cadastraTema.php?msg=1");
?>
</pre>

