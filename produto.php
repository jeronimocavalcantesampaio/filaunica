<? include "header.php"; ?>
<h2>Produto</h2><div class='item first'>
<?
include "config.php";

$sql21 = mysql_query("SELECT * FROM produto ORDER BY id DESC");
$linhas21 = mysql_num_rows($sql21);
if (!$sql21){
echo "Nenhum Conteudo";
}
else {
while ($reg21 = mysql_fetch_array($sql21)){
$titulo = $reg21['conteudo'];

echo "$titulo";
}
}
mysql_close;
?>

<p style="text-align: center;"><a href="cadastro.php?ind=<? echo limpiar($_GET["ind"]); ?>"><img border="0" src="img/cadastro2_BRA.jpg" alt="" /></a></p>
<BR><BR><BR> <BR<BR>
<? include "footer.php"; ?>
