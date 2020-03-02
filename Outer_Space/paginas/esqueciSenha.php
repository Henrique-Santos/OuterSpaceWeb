<html>
    <head>
        <meta charset="utf-8">
        <title>Outer Space</title>
        <link rel="stylesheet" href="../estilo/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="../estilo/css/main.css"/>
        <link href="https://fonts.googleapis.com/css?family=Orbitron&display=swap" rel="stylesheet"/>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script type="text/javascript" src="../js/funcoes.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="mx-auto boxEsqueciSenha">
                <center><h1 class="font">Esqueci Minha Senha</h1></center>
                <br>
                <form action="../acao/alteraSenha.php" method="post" name="altSenha" onsubmit="return esqueciSenha()">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Nome:</label>
                        <input type="text" class="form-control" name="nome" maxlength="50" required/>
                    </div>
                    
                    <div class="form-group">
                        <label for="formGroupExampleInput">Usuário:</label>
                        <input type="text" class="form-control" name="nick" maxlength="50" required/>
                    </div>

                    <div class="form-group">
                        <label for="formGroupExampleInput">Senha:</label>
                        <input type="password" class="form-control" name="senha" maxlength="50" required/> 
                    </div>

                    <div class="form-group">
                        <label for="formGroupExampleInput">Confirmar Senha:</label>
                        <input type="password" class="form-control" name="confir_senha" maxlength="50" required/>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Alterar</button>
                    
                </form>
                <a href="login.php" class="linkbtn">
                    <button type="submit" class="btn btn-dark btn-block">Voltar</button>
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
                                if($msg==4){
                                    echo "<p>Sua senha não pode ser alterada. Tente novamente!</p>";
                                }
                            ?>
                        </div>
                        <div class="modal-footer">
                            <a href="javascript:history.back()">
                            <button type="onclick" class="btn btn-warning" data-dismiss="modal">OK</button>
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
if($msg==4){
    echo("<script>$(document).ready( function (){ $('#Modal').show(1); });</script>");
}
?>