<pre>
<?php
include "../bancoOuterSpace/banco.php";
session_start();

$grupo = $_SESSION["rankingGrupo"];

$user = $_SESSION["usuario"];

$nick = $user[0]["nick"];
$grupo = [0]
print_r($user);
print_r($grupo);
?>
</pre>