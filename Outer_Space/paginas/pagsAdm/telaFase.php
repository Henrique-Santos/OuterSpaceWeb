<?php
include "../../acao/navbar.php";
include "../../acao/persistenciaGrupo.php";
?>
<html>
	<head>
        <link rel="stylesheet" href="../../estilo/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../estilo/css/cadastroFase.css">
        <link href="https://fonts.googleapis.com/css?family=Orbitron&amp;display=swap" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>    
    </head>
    <body>
		<div class="container">
            <form action="../../acao/cadastraFase.php" method="post">
                <div class="row">
                    <div class="col-md-4 mx-auto font">
                       <center><div class="mx-auto titulo"><h2>Cadastro de Fase</h2></div></center>
                    </div>
                    <div class="col-md-12">
                        <div class="mx-auto" style="width: 300px;">
                        <center>
                            <div class="form-group">
                                <label for="formGroupExampleInput"><h5 class="font ">Velocidade da Nave</h5></label>
                                <select name="velocidadeNave" class="form-control" required="">
                                    <option value=""> -- </option>
                                    <option value="100">100</option>
                                    <option value="200">200</option>
                                    <option value="300">300</option>
                                    <option value="400">400</option>
                                    <option value="500">500</option>
                                    <option value="600">600</option>
                                    <option value="700">700</option>
                                    <option value="800">800</option>
                                    <option value="900">900</option>
                                    <option value="1000">1000</option>
                                </select>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label"><h5 class="font">Quantidade de meteoros</h5></label>
                                <div class="col-sm-12">
                                    <input type="number" class="form-control" maxlength="3" name="qtdMeteoro" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12 col-form-label"><h5 class="font">Pontuação Máxima</h5></label>
                                <div class="col-sm-12">
                                    <input type="number" class="form-control" maxlength="3" name="maxPontFase" required="">
                                </div>
                            </div>
                            <br>
                        </div>
                    </center>
                    </div>
                    <div class="col-md-4 botoes">
                        <a class="linkbtn" href="menuAdm.php">
                            <button type="submit" class="btn btn-dark btn-lg btn-block font">Cadastrar</button>
                        </a>
                        <a class="linkbtn col-md-2" href="menuAdm.php">
                            <button type="button" class="btn btn-dark btn-lg btn-block font">Voltar</button>
                        </a>
                    </div>
                </div>           
            </form>
        </div>
	</body>
</html>
