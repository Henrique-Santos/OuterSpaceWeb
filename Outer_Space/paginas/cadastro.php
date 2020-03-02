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
            <div class="mx-auto boxCadastro">
                <center><h1 class="font">Cadastro de Usuários</h1></center>
                <br>
                <form action="../acao/verificaUsuario.php" method="post" name="cadUsuario" onsubmit="return validaCadastro()">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Nome:</label>
                        <input type="text" class="form-control" name="nome" maxlength="50" required/>
                    </div>

                    <div class="form-group">
                        <label for="formGroupExampleInput">E-mail:</label>
                        <input type="email" class="form-control" name="email" maxlength="80" required/>
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
                    <input type="hidden" name="permissao" value="0">
                    <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>
                </form>
                <a href="login.php" class="linkbtn">
                    <button type="button" class="btn btn-dark btn-block">Voltar</button>
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
                                echo "<p>Este usuário já existe!</p>";
                            }elseif($msg==2){
                                echo "<p>Não possível efetuar seu cadastro. Tente novamente!</p>";
                            }
                        ?>
                    </div>
                    <div class="modal-footer">
                        <a href="javascript:history.back()">
                        <button type="onclick" class="btn btn-warning" data-dismiss="modal">OK</button>
                        </a>
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
    //echo("<script>$(document).ready( function (){ alert('Este usuário já existe!'); });</script>");
    echo("<script>$(document).ready( function (){ $('#Modal').show(1); });</script>");
}elseif($msg==2){
    echo("<script>$(document).ready( function (){ $('#Modal').show(1); });</script>");
    //echo("<script>$(document).ready( function (){ alert('Não possível efetuar seu cadastro. Tente novamente!'); });</script>");
}
?>