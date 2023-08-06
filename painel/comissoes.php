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
        echo "<h1>COMISSÕES</h1>
<p class='msg info'>Ap&oacute;s efetuar o pagamento, clique em &quot;PAGAR/ZERAR&quot;</p>
<p class='msg warning'>Será Enviado um aviso por email para o Membro</p>
";
  $step=50;
  $currentpage = $p;
    $sql="Select * from ativo order by saldo desc";
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
        echo("");
    }
    else
    {
      if (($currentpage*50) > $totallinks)
      {
        echo("");
      }
      else
      {
        echo("");
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
        echo("&nbsp; ");
      }
    }
    echo("<br><br>");
  }
  $start=($currentpage-1)*$step;

    $query="Select * from ativo order by saldo desc";
  $sql = $query . " LIMIT 100";

$rs=mysql_query($sql);

if (mysql_num_rows($rs))
{

print "
<table cellspacing='2' cellpadding='2' border='2'width='100%'>
    <tbody>
        <tr>
            <td bgcolor='#cccccc' width='250' style='text-align: center;'><b>&nbsp;Nome</b></td>
            <td bgcolor='#cccccc' width='250' style='text-align: center;'><b>&nbsp;Dados para Pagamento</b></td>
            <td bgcolor='#cccccc' width='250' style='text-align: center;'><b>&nbsp;Saldo</b></td>

        </tr>
";

 while($arr=mysql_fetch_array($rs))
 { ?>
<tr>
            <td>&nbsp;<? echo $arr["nome"]; ?></td>
            <td><font color="#FF0000">Email Pagseguro: <? echo $arr["emailpagseguro"]; ?></font><BR>
<b>Banco:</b> <? echo $arr["titulolink"]; ?>
<b> # Agencia:</b> <? echo $arr["linkdolink"]; ?><BR>
<b>N° da Conta:</b> <? echo $arr["linkdosite"]; ?> <BR>
<b>Tipo da Conta:</b> <? echo $arr["linkdaimagem"]; ?> <BR>
<b>Titular: </b><? echo $arr["linksitepequeno"]; ?><BR>

             </td>
            <td>&nbsp;R$ <? echo $arr["saldo"]; ?></td>
            <td>&nbsp;

<form action="pago.php?membro=<? echo $arr["id"]; ?>" method="post">
<INPUT type=submit class="input-submit"  value="PAGAR/ZERAR">
</form>
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
print " <p class='msg warning'>Nenhum Membro Encontrado!</p>";
}
}?>


<? }
include "footer.php";
?>
