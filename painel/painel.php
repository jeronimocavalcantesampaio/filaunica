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

<?{
        echo "<h1>Membros Pendentes</h1>";
  $step=50;
  $currentpage = $p;
    $sql="Select * from pendente order by ID";
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
        echo("<p class='msg info'><b>Total de Pendentes  - ".$totallinks."</b></p>");
    }
    else
    {
      if (($currentpage*50) > $totallinks)
      {
        echo("<p class='msg info'><b>Total de Pendentes  - ".$totallinks."</b></p>");
      }
      else
      {
        echo("<p class='msg info'><b>Total de Pendentes  - ".$totallinks."</b></p>");
      }
    }
  }

  if($totallinks > $step)
  {
    $pagecount=ceil($totallinks/$step);
    print "&nbsp;";
    for($i=1;$i<=$pagecount;$i++)
    {
      if($pageno==$i)
      {
        echo($i . " ");
      }
      else
      {
        echo(" &nbsp; ");
      }
    }
    echo("<br><br>");
  }
  $start=($currentpage-1)*$step;

    $query="Select * from pendente order by ID";
  $sql = $query . " LIMIT 999999";

$rs=mysql_query($sql);

if (mysql_num_rows($rs))
{

print "
<table cellspacing='2' cellpadding='2' border='1' width='100%'>
    <tbody>
        <tr>
            <td bgcolor='#cccccc'  style='text-align: center;'><b>&nbsp;Nome</b></td>
            <td bgcolor='#cccccc'  style='text-align: center;'><b>&nbsp;Email</b></td>


        </tr>
";

 while($arr=mysql_fetch_array($rs))
 { ?>



<tr>
            <td>&nbsp;<? echo $arr["nome"]; ?> <br><b><font color="#FF0000">ID <? echo $arr["id"]; ?></font></b> - Email Pagseguro: <? echo $arr["emailpagseguro"]; ?></td>
            <td>&nbsp;<? echo $arr["email"]; ?>
            <br>&nbsp;<b>Cadastrou dia: <? echo $arr["datacadastro"]; ?></b>
             </td>
            <td>
            <form action="Excluir.php?membro=<? echo $arr["id"]; ?>" method="post"><INPUT type=submit class="input-submit"  value="Excluir"></form>
            </td>
            <td>
<form action="VerPendente.php?membro=<? echo $arr["id"]; ?>" method="post"><INPUT type=submit class="input-submit"  value="Ver/Editar"></form>


            </td>
            <td>
 <form action="AtivarPendente.php?membro=<? echo $arr["id"]; ?>" method="post"><INPUT type=submit class="input-submit"  value="ATIVAR"></form>


            </td>
</tr>
<?
}
print "</tr>
    </tbody>
</table>";
}
else
{
print "<p class='msg warning'>Nenhum Membro Encontrado.</p>";
}
}?>




<? }
include "footer.php";
?>

