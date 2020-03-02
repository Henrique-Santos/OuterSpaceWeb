<?php
include "../acao/persistenciaUsuario.php";
include "../bancoOuterSpace/banco.php";

if(isset($_SESSION["usuario"])){
  $usuario = $_SESSION["usuario"];
  $nick = $usuario["nick"];
  $idUsuario = $usuario["idUsuario"];
}
onConexao();

  $pontos = selecionar("SELECT maxponto, fase_idFase, pontuacao FROM usuario WHERE idUsuario = $idUsuario");
  $recorde = $pontos[0]["maxponto"];
  $pontuacao = $pontos[0]["pontuacao"];
  
offConexao();

include "../acao/acaoJogo/req_fase.php";

echo" <script>
var idFase=".$idFase.",pontFase=".$pontFase.",totalMeteoro=".$qtdMeteoro.",velocidadeNave=".$velocidadeNave.",pontuacao=".$pontuacao." 
</script> ";
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Outer Space</title>
    <link rel="stylesheet" href="../estilo/css/main.css"/>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/phaser@3.15.1/dist/phaser-arcade-physics.min.js"></script>
    <script type="text/javascript" src="../js/script.js"></script>
    <script>
      $(document).ready(function(){
        startJogo();
      })
    </script>
  </head>
  <body>
      <div class="pontuacao">
        <?php
          echo "Meteoros Destruídos: ".$pontuacao;
        ?>
      </div>

      <div class="maxponto">
        <?php
          echo "RECORDE: ".$recorde;
        ?>
      </div>
  </body>
</html>
