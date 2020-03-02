<html>
    <head>
        <meta charset="utf-8">
        <title>Outer Space</title>
        <link rel="stylesheet" href="../estilo/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="../estilo/css/main.css"/>
        <link href="https://fonts.googleapis.com/css?family=Orbitron&display=swap" rel="stylesheet"/>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="mx-auto login">
                <center><h1 class="font">Login</h1></center>
                <br>
                <form action="../acao/validaLogin.php" method="post">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Usuário:</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="nick" maxlength="20" required/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Senha:</label>
                        <div class="col-sm-10">
                        <input type="password" class="form-control" name="senha" maxlength="20" required/>
                        </div>
                    </div>

                    <center><a href='esqueciSenha.php'>Esqueci Minha Senha</a></center><br>
                    <button type="submit" class="btn btn-success btn-block">Entrar</button>
                </form>
                <a href="cadastro.php" class="linkbtn">
                    <button type='button' class='btn btn-dark btn-block'>Cadastrar</button>
                </a> 
            </div>
        </div>
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
                                echo "<p>Usuário ou Senha incorreto!</p>";
                            }elseif($msg==2){
                                echo "<p>Usuário não logado.</p>";
                            }
                        ?>
                    </div>
                    <div class="modal-footer">
                        <a href="login.php">
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
    //echo("<script>$(document).ready( function (){ alert('Usuário ou Senha incorreto!'); });</script>");
    echo("<script>$(document).ready( function (){ $('#Modal').show(1); });</script>");
}elseif ($msg==2) {
    //echo("<script>$(document).ready( function (){ alert('Usuário não logado!'); });</script>");
    echo("<script>$(document).ready( function (){ $('#Modal').show(1); });</script>");
}
?>