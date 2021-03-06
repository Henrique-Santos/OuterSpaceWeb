<?php
include "../../acao/persistenciaGrupo.php";
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
    <div class="mx-auto boxCriaGrupo">
            <center>
                <h1 class="font titulo">Criar Grupo</h1>
            </center>
            <br>
            <div class="form-group row">
                <div class="col-sm-12">
                    <center>
                    <form action="../../acao/validaGrupo.php" method="post" name="" onsubmit="">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Nome do Grupo:</label>
                            <input type="text" class="form-control" name="descricaoGrupo" maxlength="50" required/>
                        </div>

                        <div class="form-group">
                            <label for="formGroupExampleInput">Seu Nick:</label>
                            <input type="text" class="form-control" name="usuario_idUsuario" maxlength="50" required/>
                        </div>
                        <button type="submit" class="btn btn-dark btn-lg btn-block font botoes">Criar</button>
                    </form>
                    </center>
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

        <!-- Tratamento de erro! -->
        <div id="Modal" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Outer Space Informa.</h5>
                    </div>
                    <div class="modal-body">
                        <?php
                            $msg= isset($_GET["msg"]) ? ($_GET["msg"]) :"";
                            if($msg==1){
                                echo "<p>Já existe um grupo com esse nome ou esse usuário não existe.</p>";
                            }elseif($msg==2){
                                echo "<p>O nick informado não é o seu.</p>";
                            }
                        ?>
                    </div>
                    <div class="modal-footer">
                        <a href="telaGrupo.php">
                        <button type="onclick" class="btn btn-warning" data-dismiss="modal" onclick="return window.history.back()">OK</button>
                        </a>
                        <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                    </div>
                </div>
            </div>
        </div>
        <!-- Tratamento de erro! -->

    </body>
</html>
<?php
$msg= isset($_GET["msg"]) ? ($_GET["msg"]) :"";
if($msg==1){
    echo("<script>$(document).ready( function (){ $('#Modal').show(1); });</script>");
} else if($msg==2) {
    echo("<script>$(document).ready( function (){ $('#Modal').show(1); });</script>");
}