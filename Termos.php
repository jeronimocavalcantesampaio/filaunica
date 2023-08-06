<? include ("header.php"); ?>
      <h2>&nbsp;TERMOS E CONDI&Ccedil;&Otilde;ES DE USO</h2>
      <div class="item first">
<?
include "config.php";

$sql = mysql_query("SELECT * FROM termos ORDER BY id DESC");
$linhas = mysql_num_rows($sql);
if (!$sql){
echo "Nenhum Conteudo";
}
else {
while ($reg = mysql_fetch_array($sql)){
$titulo = $reg['conteudo'];

echo "$titulo";
}
}
mysql_close;
?>
      
<BR><BR><BR><BR><BR>

<? include ("footer.php"); ?>
