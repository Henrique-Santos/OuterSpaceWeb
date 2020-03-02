<?php
include "../acao/persistenciaUsuario.php";
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Outer Space</title>
        <link rel="stylesheet" href="../estilo/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="../estilo/css/grupo.css"/>
        <link href="https://fonts.googleapis.com/css?family=Orbitron&display=swap" rel="stylesheet"/>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    </head>
    <body>
        <div class="mx-auto box">
            <center>
                <h1 class="font titulo">GRUPO</h1>
            </center>
            <br>
            <div class="form-group row">
                <div class="col-sm-12">
                    <center>
                    <?php
                        echo "<a class='linkbtn' href='auxGrupo/codigoGrupo.php'><button type='button' class='btn btn-dark btn-lg btn-block font botoes'>Entrar Em Grupo Existente</button></a>"
                    ?>
                    <br>
                    <?php
                        echo "<a class='linkbtn' href='auxGrupo/telaGrupo.php'><button type='button' class='btn btn-dark btn-lg btn-block font botoes'>Criar Grupo</button></a>"
                    ?>
                    <br>
                    <?php
                        echo "<a class='linkbtn' href='../acao/contemGrupo.php'><button type='button' class='btn btn-dark btn-lg btn-block font botoes'>Visualizar Grupo</button></a>"
                    ?>
                    </center>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <center>
        <div class="col-sm-12">
            <?php
                echo "<a class='linkbtn' href='menu.php'><button type='button' class='btn btn-dark btn-lg btn-block font botoes'><< Voltar</button></a>"
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
                        <p>Você saiu do grupo.</p>
                    </div>
                    <div class="modal-footer">
                        <a href="grupo.php">
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
$msg = isset($_GET["msg"]) ? ($_GET["msg"]) :"";
if($msg==2){
    echo("<script>$(document).ready( function (){ $('#Modal').show(1); });</script>");
}
?>