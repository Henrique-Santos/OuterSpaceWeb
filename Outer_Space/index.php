<html>
  <a href="estilo/css/bootstrap.min.css"></a>
  
  <?php

    $getPagina = isset($_GET["pagina"]) ? $_GET["pagina"]:"";

    switch ($getPagina) {
      case 'ranking':
        header("location: paginas/ranking.php");        
        break;
      case 'grupo':
        header("location: paginas/grupo.php");
        break;
      case 'jogo':
        header("location: paginas/jogo.php");
        break;
      case 'sair':
        header("location: paginas/login.php");
        break;
      default:
        header("location: paginas/login.php");
        break;
    }
    //include '../assets/template/footer.php'
  ?>
</html>