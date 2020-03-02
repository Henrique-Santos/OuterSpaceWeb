<?php
include "../../acao/persistenciaGrupo.php";
//session_start();
include "../../bancoOuterSpace/banco.php"; 
if(isset($_SESSION["usuario"])){
    $usuario = $_SESSION["usuario"];
    $nick = $usuario["nick"];
    $idUsuario = $usuario["idUsuario"];
}
if(isset($_SESSION["rankingGrupo"])){
    $dados = $_SESSION["rankingGrupo"];
    $codGrupo= $dados[0]["codigo"];
    $nomeGrupo= $dados[0]["descricaoGrupo"];
}
onConexao();
$arrayDados = selecionar("SELECT g.descricaoGrupo, g.idGrupo
                            FROM usuario u
                            INNER JOIN usuariogrupo ug
                            ON u.idUsuario = ug.usuario_idUsuario
                            INNER JOIN grupo g
                            ON ug.grupo_idGrupo = g.idGrupo
                            WHERE ug.usuario_idUsuario = '$idUsuario'");
offConexao();
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Outer Space</title>
        <link rel="stylesheet" href="../../estilo/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="../../estilo/css/grupo.css"/>
        <link href="https://fonts.googleapis.com/css?family=Orbitron&display=swap" rel="stylesheet"/>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    </head>
    <body>
    <div class="mx-auto box">
            <center>
                <h1 class="font titulo">SEUS GRUPOS</h1>
            </center>
            <div class="form-group row">
                <div class="col-sm-12">
                    <br>
                        <div class="container">
                            <div class="mx-auto RankingGrupo">
                                <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col"></th>
                                    <th scope="col"><h4>Grupos</h4></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    foreach ($arrayDados as $chave => $valor){
                                        $chave++;
                                        $idGrupo = $valor["idGrupo"];
                                        echo "<tr>";
                                        echo "<td>";
                                        echo "<h5>".$chave."º</h5>";
                                        echo "</td>";
                                        echo "<td>";
                                        echo "<a href='../../acao/rankingGrupo.php?id=$idGrupo'><h5>".$valor['descricaoGrupo']."</h5></a>";
                                        echo "</td>";
                                    }
                                ?>
                                </tbody>
                                </table>
                            </div>
                        </div>
                    <br>
                </div>
            </div>
        </div>
        <br>
        <br>
        <center>
        <div class="col-sm-12">
            <?php
                echo "<a class='linkbtn' href='../grupo.php'><button type='button' class='btn btn-dark btn-lg btn-block font botoes'><< Voltar</button></a>"
            ?>
        </div>
        </center>
    </body>
</html>