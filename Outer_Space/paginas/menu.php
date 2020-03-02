<?php
  //print_r ($_SESSION["S_usuario"]);
  include "../acao/persistenciaUsuario.php";
?>
<html>
  <head>
    <title>Outer Space</title>
    <link rel="stylesheet" href="../estilo/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../estilo/css/menu.css"/>
    <link href="https://fonts.googleapis.com/css?family=Orbitron&display=swap" rel="stylesheet"/>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  </head>
  <body>
    <div class="container menu">
      <div class="mx-auto ">
        <center><h1 class="font">OUTER SPACE</h1></center>
        <br>
        <div class="form-group row">
          <div class="col-sm-10">
            <?php
              echo "<a class='linkbtn' href='../index.php?pagina=jogo'><button type='button' class='btn btn-dark btn-lg btn-block font botao'>Jogar</button></a>";
            ?>
            <br>
          </div>
          <div class="col-sm-10">
            <?php
              echo "<a class='linkbtn' href='../index.php?pagina=grupo'><button type='button' class='btn btn-dark btn-lg btn-block font botao'>Grupo</button></a>"
            ?>
            <br>
          </div>
          <div class="col-sm-10 ">
            <?php
              echo "<a class='linkbtn' href='../index.php?pagina=ranking'><button type='button' class='btn btn-dark btn-lg btn-block font botao'>Ranking </button> </a>"
            ?>
            <br>
          </div>
          <div class="col-sm-10">
            <?php
              echo "<a class='linkbtn' href='../acao/logoutUsuario.php' ><button type='button' class='btn btn-dark btn-lg btn-block font botao'>Sair</button></a>"
            ?>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
