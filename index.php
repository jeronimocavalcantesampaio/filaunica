<? include ("header.php"); ?>
      <h2>Seja Bem Vindo(a) ao <? echo $sitename ?>!</h2>
      <div class="item first">

<?
include "config.php";

$sql = mysql_query("SELECT * FROM home ORDER BY id DESC");
$linhas = mysql_num_rows($sql);
if (!$sql){
echo "Nenhum Conteudo";
}
else {
while ($reg = mysql_fetch_array($sql)){
$titulo = $reg['conteudo'];

echo "
$titulo
";
}
}
mysql_close;
?><BR><BR><BR><BR>
<p align="center"><a href="cadastro.php?ind=<? echo limpiar($_GET["ind"]); ?>"><img src="img/cadastro2_BRA.jpg" border="0"></a></p>


<? include ("footer.php"); ?>
