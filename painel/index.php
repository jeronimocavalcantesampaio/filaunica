<?php
session_start();
session_register("admin_session");
session_register("totalusercount_session");
session_register("usercount_session");
include "config.php";

function top()
{

echo("
<HTML>
<HEAD>
 <TITLE>Painel de Admin</TITLE>
</HEAD>
<BODY bgcolor='#000000'>
<p>&nbsp;</p> <form action=index.php method=post>
<table cellspacing='0' cellpadding='0' border='0' align='center' style='width: 343px; height: 93px;'>
    <tbody>
        <tr>
            <td bgcolor='#cc0000' style='text-align: center;'><span style='color: rgb(255, 255, 255);'><b><span style='font-size: xx-large;'>ADMINISTRA&Ccedil;&Atilde;O</span></b></span></td>
        </tr>
        <tr>
            <td bgcolor='#cccccc' style='text-align: center;'>
            <div><span style='color: rgb(255, 0, 0);'><span style='font-size: medium;'><b>DIGITE SUA SENHA ABAIXO:</b></span></span></div>
            <div><input type=password name=admin></div>
            <div><input type=Submit value=Entrar></div>
            <p align='center'>Sistema Fila-Única <a href='http://www.marketing-brasil.com/' target='_blank'>Marketing-Brasil</a></p>
            </td>
        </tr>
    </tbody>
</table></form>
</BODY>
</HTML>
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
echo("

<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=home.php'>
 ");

}
?>

