<a href="ativos.php">xx</a>
<a href="painel.php">xx</a>
<a href="Ganhadores.php">xx</a>
<a href="Emails.php">xx</a>
<a href="EditarAdmin.php">xx</a>
<a href="sair.php">xx</a>
 <a href="comissoes.php">xx</a>
<hr>
<h3><a href="admin.php?b=3">ENVIAR EMAILS</a></h3>
 <hr>
 <?
include "config.php";

$sql = mysql_query("SELECT * FROM ativo ORDER BY posicao DESC LIMIT 1");
$linhas = mysql_num_rows($sql);
if (!$sql){
echo "Nenhum Membro";
}
else {
while ($reg = mysql_fetch_array($sql)){
$numero11 = $reg['posicao'];

echo "
<b>O NUMERO NESTE MOMENTO PARA SEGUIR É: <font color='#FF0000'>$numero11</font></b>

";
}
}
mysql_close;
?>
<hr>
