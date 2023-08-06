<?include "header.php"; ?>
<h2>Efetuar Pagamento</h2><div class="item first">
<?
include "config.php";

$sql0 = mysql_query("SELECT * FROM pagamento ORDER BY id DESC");
$linhas0 = mysql_num_rows($sql0);
if (!$sql0){
echo "Nenhum Conteudo";
}
else {
while ($reg0 = mysql_fetch_array($sql0)){
$titulo = $reg0['conteudo'];

echo "$titulo";
}
}
mysql_close;
?>

<BR><BR><BR><BR>

 <?include "footer.php"; ?>
