<?php
function onConexao() {
    global $conexao;
    $conexao = mysqli_connect("localhost","root","","outerSpace");
}

function offConexao() {
    global $conexao;
    mysqli_close($conexao);
}

function executar($sql, $condicao = null){
    global $conexao;
    if(!empty($condicao)){
        $sql.= " WHERE ". $condicao;
    }
    return mysqli_query($conexao, $sql);
}

function inserir($tabela, $dados){
    global $conexao;
    $campos = array_keys($dados);
    $sql = "INSERT INTO ".$tabela." (";
    // Monta a 1ª estrutura
    foreach($campos as $campo){
        $sql.=$campo.",";
    }
    // Pega a string do $sql e exclui o último valor
    $sql = substr($sql,0, -1);
    $sql.=") VALUES (";
    // Monta a 2ª estrutura
    foreach($dados as $dado){
        $sql.="'".$dado."',";
    }
    $sql = substr($sql,0, -1);
    $sql.=")";
    //echo $sql;
    $resultado = executar($sql);

    $id = mysqli_insert_id($conexao);
    return $id;
}

function alterar($tabela, $dados, $condicao = null) {
    $campos = array_keys($dados);
    $sql = "UPDATE " .$tabela. " SET ";
    foreach($campos as $campo) {
        $sql.=$campo;
        foreach($dados as $dado) {
            $sql.=" = '".$dado."', ";
            array_shift($dados);
            break;
        }
    }
    $sql = substr($sql, 0, -2);
    echo $condicao;
    $resultado = executar($sql,$condicao);
    echo $sql;
    return $resultado;
}

function selecionar($sql){
    $consulta = executar($sql);
    $arrayDados = mysqli_fetch_all($consulta, MYSQLI_ASSOC);
    return $arrayDados;
}

function apagar($sql, $condicao = null) {
    $resultado = executar($sql, $condicao);
    return $resultado;
}
?>

