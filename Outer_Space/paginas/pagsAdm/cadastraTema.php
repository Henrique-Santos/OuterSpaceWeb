<?php
$msg= isset($_GET["msg"]) ? ($_GET["msg"]) :"";
include "../../acao/navbar.php";
include "../../acao/persistenciaGrupo.php";
?>
<html>
    <head>
        <link rel="stylesheet" href="../../estilo/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../estilo/css/cadastroTema.css">
        <link href="https://fonts.googleapis.com/css?family=Orbitron&amp;display=swap" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>    
    <body>
        <div class="container">
            <form action="../../acao/cadastraPergunta.php" method="post">
                <div class="row">
                    <div class="col-md-12 mt-4 md-6 mx-auto font">
                        <div class="mx-auto" style="width: 412px;"><h2>Cadastro de Perguntas</h2></div>
                    </div>
                    <div class="col-md-6 boxTema">
                        <div class="form-group ">
                            <label for="formGroupExampleInput"><h5 class="font">Tema</h5></label>
                            <select name="tema" class="form-control" required="">
                                <option value=""> -- </option>
                                <option value="tecnologia">Tecnologia</option>
                                <option value="astronomia">Astronomia</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput"><h5 class="font">Pergunta</h5></label>
                            <textarea name="pergunta" class="form-control" rows="3" maxlength="" required=""></textarea>
                        </div>
                    </div>
                    <div class="col-md-6 boxResposta">
                        <h5 class="font">Resposta</h5>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label font">A</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="A" maxlength="" required=""> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label font">B</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="B" maxlength="" required=""> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label font">C</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="C" maxlength="" required=""> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label font">D</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="D" maxlength="" required=""> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-8 col-form-label font"><h5>Selecione a Resposta Certa</h5></label>
                            <div class="col-sm-4">
                            <select name="resposta" class="select form-control" required="">
                                <option value=""> -- </option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                            </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-dark btn-lg btn-block font">Cadastrar</button> 
                    </div>
                </div>           
            </form>
            <a class="linkbtn" href="menuAdm.php">
                <button type="button" class="btn btn-dark btn-lg btn-block font">Voltar</button>
            </a> 
        </div>
    </body>
</html>
<?php
if($msg==1){
    echo ("<script>$(document).ready( function (){ alert('Cadastro com sucesso!'); });</script>");
}
?>