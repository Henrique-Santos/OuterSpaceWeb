<pre>
<?php
include "../bancoOuterSpace/banco.php";

$dados = $_POST;

onConexao();

inserir('fase', $dados);

echo "<script>alert('Cadastrado com sucesso!')</script>";
header("Location: ../paginas/pagsAdm/menuAdm.php");
?>
</pre>