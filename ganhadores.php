<table border="1" width="100%">
<tr>
  <td bgcolor="#006600">&nbsp;<b><font color="#FFFFFF">NOME</font></b></td>
  <td bgcolor="#006600">&nbsp;<b><font color="#FFFFFF">ESTADO</font></b></td>
</tr>



<?
include "config.php";

$sql = mysql_query("SELECT * FROM ganhadores ORDER BY id DESC LIMIT 5");
$linhas = mysql_num_rows($sql);
if (!$sql){
echo "Nenhum Membro";
}
else {
while ($reg = mysql_fetch_array($sql)){
$nome = $reg['nome'];
$estado = $reg['estado'];

echo "
<tr>
  <td>&nbsp;$nome</td>
  <td>&nbsp;$estado</td>
</tr>

";
}
}
mysql_close;
?>  </table>
