<? include "header.php"; ?>
<h2>Como Funciona</h2><div class='item first'>
<?
include "config.php";

$sql = mysql_query("SELECT * FROM como_funciona ORDER BY id DESC");
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

<p style="text-align: center;"><a href="cadastro.php?ind=<? echo limpiar($_GET["ind"]); ?>"><img border="0" src="img/cadastro2_BRA.jpg" alt="" /></a></p>
<BR><BR><BR> <BR<BR>
<? include "footer.php"; ?>
