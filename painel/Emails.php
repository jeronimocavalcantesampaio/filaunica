<?php
session_start();
session_register("admin_session");
session_register("totalusercount_session");
session_register("usercount_session");
include "config.php";

function top()
{

echo("<p align='center'><b><font color='#FF0000'>Acesso Restrito!</font></b></p>");
  return 1;
} ?>

<?
if (!isset($_SESSION["admin_session"]))
{

  if ($_POST) {
		$a=$_POST["admin"];
	} else {
		$a="";
		}

  if ($a=="")
  {
top();
  }
    else
  {

    if ($a!=$adminpass)
    {

top();
    }
      else
    {
      $_SESSION[admin_session]=$adminpass;
process();
    }

  }

}
else {
process();
}


function process()
{
include "config.php";
include "header.php";
?>
<h1>Ver Emails</h1>
<p class="msg info">Copie e cole em um bloco de notas para importar em seu sistema de Email Marketing.</p>


<table border="1" width="100%">
<tr>
  <td>&nbsp;Emails de Membros Ativos</td>
  <td>&nbsp;Emails de Membros Pendentes</td>
</tr>
<tr>
  <td><?
include "config.php";
$sql = mysql_query("SELECT * FROM ativo ORDER BY id");
$linhas = mysql_num_rows($sql);
if (!$sql){
echo "Nenhum email";
}
else {
while ($reg = mysql_fetch_array($sql)){

?>
<? echo $reg["email"]; ?><br>
<?
}
}
mysql_close;
?>
  </td>
  <td><?
include "config.php";
$sql = mysql_query("SELECT * FROM pendente ORDER BY id");
$linhas = mysql_num_rows($sql);
if (!$sql){
echo "Nenhum email";
}
else {
while ($reg = mysql_fetch_array($sql)){

?>
<? echo $reg["email"]; ?><br>
<?
}
}
mysql_close;
?></td>
</tr>
</table>


<? }
include "footer.php";
 ?>


