<? include "header.php"; ?>
<h2>Perguntas Frequentes</h2><div class='item first'>
<?
include "config.php";

$sql = mysql_query("SELECT * FROM faq ORDER BY id DESC");
$linhas = mysql_num_rows($sql);
if (!$sql){
echo "Nenhuma Pergunta Adicionada";
}
else {
while ($reg = mysql_fetch_array($sql)){
$titulo = $reg['titulo'];
$resposta = $reg['resposta'];

echo "
<div><span style='color: rgb(0, 51, 0);'><b> $titulo</b></span></div>
<div> $resposta</div>
<div>&nbsp;</div>
";
}
}
mysql_close;
?>
<p style="text-align: center;"><a href="cadastro.php?ind=<? echo limpiar($_GET["ind"]); ?>"><img border="0" src="img/cadastro2_BRA.jpg" alt="" /></a></p>
<BR><BR><BR> <BR<BR>
<? include "footer.php"; ?>
