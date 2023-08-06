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

  echo("...");


?>
<HTML>
<HEAD>
 <TITLE>Painel de Controle</TITLE>
</HEAD>
<BODY bgcolor="#CC0000">
<p>&nbsp;</p>
<table cellspacing="5" cellpadding="5" border="1" align="center" width="900">
    <tbody>
        <tr>
            <td bgcolor="#006600" style="text-align: center;"><span style="color: rgb(255, 255, 255);"><span style="font-family: Arial;"><b><span style="font-size: xx-large;">ADMINISTRA&Ccedil;&Atilde;O DO SISTEMA</span></b></span></span></td>
        </tr>
        <tr>
            <td bgcolor="#FFFFFF"><div align="center"><? include "menu.php"; ?></div></td>
        </tr>
        <tr>
            <td bgcolor="#FFFFFF">













 <?{
        echo "<h2 align=center>Veja os Membros INATIVOS (Já Receberam)</h2>";
  $step=50;
  $currentpage = $p;
    $sql="Select * from inativos order by ID";
  if(!$rs=mysql_query($sql))
  {
    print mysql_error();
    exit;
  }
  $row=mysql_num_rows($rs);
    $totallinks=$row;
  if(!isset($currentpage))
  {
    $currentpage=1;
  }

  if ($totallinks > 0)
  {
    if ($totallinks < 50)
    {
        echo("<br><b>Exibindo Página 1 - " . $totallinks . "</b><br>");
    }
    else
    {
      if (($currentpage*50) > $totallinks)
      {
        echo("<br><b>Exibindo Página ".intval(($currentpage*50)-49)." - ".$totallinks."</b><br>");
      }
      else
      {
        echo("<br><b>Exibindo Página ".intval(($currentpage*50)-49)." - ".intval($currentpage*50)."</b><br>");
      }
    }
  }

  if($totallinks > $step)
  {
    $pagecount=ceil($totallinks/$step);
    print "<br>Página n º - &nbsp;&nbsp;";
    for($i=1;$i<=$pagecount;$i++)
    {
      if($pageno==$i)
      {
        echo($i . " ");
      }
      else
      {
        echo("<a href='admin.php?b=".$b."&p=".$i."'>".$i."</a> &nbsp; ");
      }
    }
    echo("<br><br><br>");
  }
  $start=($currentpage-1)*$step;

    $query="Select * from inativos order by ID";
  $sql = $query . " LIMIT $start,$step";

$rs=mysql_query($sql);

if (mysql_num_rows($rs))
{

print "
<table cellspacing='2' cellpadding='2' border='1'width='100%'>
    <tbody>
        <tr>
            <td bgcolor='#cccccc' width='250' style='text-align: center;'><b>&nbsp;Nome</b></td>
            <td bgcolor='#cccccc' width='250' style='text-align: center;'><b>&nbsp;Email</b></td>

        </tr>
";

 while($arr=mysql_fetch_array($rs))
 { ?>
<tr>
            <td>&nbsp;<? echo $arr["Name"]; ?></td>
            <td>&nbsp;<? echo $arr["Email"]; ?></td>
            <td>&nbsp;<a href="VerInativo.php?membro=<? echo $arr["ID"]; ?>"><img src="imagens/detalhes.gif" border="0"></a></td>
            <td>&nbsp;<a href="ExcluirInativo.php?membro=<? echo $arr["ID"]; ?>"><img src="imagens/excluir.gif" border="0"></a></td>
            <td>&nbsp;<a href="AtivarInativo.php?membro=<? echo $arr["ID"]; ?>"><img src="imagens/ativar.gif" border="0"></a></td>
</tr>
<?
}
print "</tr>
    </tbody>
</table>";
}
else
{
print "<br><center><br><b>Nenhum membro aqui!</b></center>";
}
}?>

















            </td>
        </tr>
    </tbody>
</table>
</BODY>
</HTML>
<? } ?>
