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
<h1>Ganhadores</h1>
<p class="msg info">Veja abaixo quem já recebeu!</p>

<table border="5" width="100%">
<tr>
  <td>&nbsp;<b>Nome</b></td>
  <td>&nbsp;<b>Email</b></td>
  <td>&nbsp;<b>Estado</b></td>

</tr>
<?
include "config.php";
$sql = mysql_query("SELECT * FROM ganhadores ORDER BY id");
$linhas = mysql_num_rows($sql);
if (!$sql){
echo "Nenhum membro";
}
else {
while ($reg = mysql_fetch_array($sql)){

?>

<tr>
  <td>&nbsp;<? echo $reg["nome"]; ?></td>
  <td>&nbsp;<? echo $reg["email"]; ?></td>
  <td>&nbsp;<? echo $reg["estado"]; ?></td>
</tr>

<?
}
}
mysql_close;
?>

</table>


<? }
 include "footer.php";
?>

