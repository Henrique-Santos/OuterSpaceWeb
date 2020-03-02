<?php
include "../../acao/persistenciaGrupo.php";
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
    $integranteGrupo = $dados[0]["nick"];
}else{
    $dados="";
    $codGrupo="";
    $nomeGrupo="";
    $integranteGrupo="";
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
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
            <a class="navbar-brand font" href="../menu.php"><?php echo $nick; ?> </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle letra" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Grupos
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php
                            foreach($arrayDados as $chave => $valor) {
                                $idGrupo = $valor["idGrupo"];
                                echo "<a class='dropdown-item' href='../../acao/rankingGrupo.php?id=$idGrupo'>". $valor["descricaoGrupo"] ."</a>";
                            }
                        ?>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link letra" href="../menu.php">Menu</a>
                    </li>
                    <li class="nav-item">
                        <?php
                            echo "<a class='nav-link letra cursor' data-toggle='modal' data-target='#exampleModal'>Sair do Grupo</a>";
                        ?>
                    </li>
                </ul>
                <a href="../grupo.php">
                    <button type="submit" class="btn btn-outline-danger my-2 my-sm-0 letra"><< Voltar</button>
                </a>
            </div>
        </nav>
        <div class="mx-auto box">
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tem certeza que deseja SAIR deste grupo?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <?php
                            echo "<a href='../../acao/deixarGrupo.php?cod=$codGrupo'><button type='button' class='btn btn-primary'>Sair</button></a>";
                        ?>
                        </div>
                    </div>
                </div>
            </div>
            <center>
                <h1 class="font titulo">SEU GRUPO</h1>
            </center>
            <div class="form-group row">
                <div class="col-sm-12">
                    <center><h3 class="font2"> >> <?php echo($nomeGrupo)?> << </h3></center>
                    <br>
                        <div class="container">
                            <div class="mx-auto RankingGrupo">
                                <table class="table table-sm">
                                <thead>
                                    <tr>
                                    <th scope="col">Pos</th>
                                    <th scope="col">Integrantes</th>
                                    <th scope="col">Pontuação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    if(isset($_SESSION["rankingGrupo"])){
                                        foreach ($dados as $key => $usu){
                                            $key++;
                                            echo "<tr>";
                                            echo "<td>";
                                            echo $key."º";
                                            echo "</td>";
                                            echo "<td>";
                                            echo $usu["nick"];
                                            echo "</td>";
                                            echo "<td>";
                                            echo $usu["ponto"];
                                            echo "</td>";     
                                            echo "</tr>";
                                        }
                                    }
                                ?>
                                </tbody>
                                </table>
                            </div>
                        </div>
                    <br>
                    <center><h5>Código do grupo: <?php echo($codGrupo)?></h5></center>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
    </body>
</html>