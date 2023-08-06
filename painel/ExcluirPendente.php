<?php
session_start();
session_register("admin_session");
session_register("totalusercount_session");
session_register("usercount_session");
include "config.php";

function top()
{

echo("<p align='center'><h2><font color='#FF0000'>Página Restrita!</font></h2></p>
<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=../index.php'>
");
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

  echo("...");


?>
<HTML>
<HEAD>
 <TITLE>Painel de Controle</TITLE>
</HEAD>
<BODY bgcolor="#0000FF">
<p>&nbsp;</p>
<table cellspacing="5" cellpadding="5" border="1" align="center" width="900">
    <tbody>
        <tr>
            <td bgcolor="#006600" style="text-align: center;"><span style="color: rgb(255, 255, 255);"><span style="font-family: Arial;"><b><span style="font-size: xx-large;">ADMINISTRA&Ccedil;&Atilde;O DO SISTEMA</span></b></span></span></td>
        </tr>
        <tr>
            <td bgcolor="#FFFFFF">Menu</td>
        </tr>
        <tr>
            <td bgcolor="#FFFFFF">

<?php
if(!isset($_GET['membro'])){
echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=painel.php'>";exit();
}
if(!$_GET['membro']!=$_SESSION['string']){
echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=painel.php'>";exit();
}
include "config.php";
$id=$_GET[membro];
$sqlz = "SELECT * FROM inativos WHERE ID='$id'";
      $resultz = mysql_query($sqlz);
      $myrowz = mysql_fetch_array($resultz);
$numero=$myrowz["ID"];
if(!$numero['ID']!=$_SESSION['string']){
echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=painel.php'>";exit();
}
else
{
include "config.php";
$id=$_GET[membro];
$sqlz = "SELECT * FROM inativos WHERE ID='$id'";
      $resultz = mysql_query($sqlz);
      $myrowz = mysql_fetch_array($resultz);
$membro=$myrowz["ID"];
      $sqlex = "delete from inativos where ID='$membro'";
      $resultex = mysql_query($sqlex);
echo "
<p align='center'><b><font color='#008000'>Membro Excluido Com Sucesso!</font></b></p>
<p align='center'><b><a href='painel.php'>Voltar</a></b></p>"; exit();
}

?>

  </td>
        </tr>
    </tbody>
</table>
</BODY>
</HTML>
<? } ?>

