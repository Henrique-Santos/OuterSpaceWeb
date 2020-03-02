<?php
if(isset($_SESSION["usuario"])){
    $idUsuario=$usuario["idUsuario"];

    onConexao();
    
    $arrayFase = selecionar("SELECT idFase, maxPontFase, qtdMeteoro, velocidadeNave 
                             FROM fase  INNER JOIN usuario 
                             ON fase.idfase = usuario.fase_idFase WHERE idUsuario = '$idUsuario'");
    offConexao();

    $idFase = $arrayFase[0]["idFase"];
    $pontFase = $arrayFase[0]["maxPontFase"];
    $qtdMeteoro = $arrayFase[0]["qtdMeteoro"];
    $velocidadeNave = $arrayFase[0]["velocidadeNave"];
}
  
?>
