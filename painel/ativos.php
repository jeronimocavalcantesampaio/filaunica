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
        echo "<h1>Membros Ativos (Primeiro da Fila-Única)</h1><p class='msg info'>Este é o primeiro membro da fila, após efetuar o pagamento, clique em (Pago - Fim da Fila!)</p>";
  $step=50;
  $currentpage = $p;
    $sql="Select * from ativo order by posicao";
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
    echo("&nbsp; ");
  }
  $start=($currentpage-1)*$step;

    $query="Select * from ativo order by posicao";
  $sql = $query . " LIMIT 1";

$rs=mysql_query($sql);

if (mysql_num_rows($rs))
{

print "
<table cellspacing='2' cellpadding='2' border='1'width='100%'>
    <tbody>
        <tr>
            <td bgcolor='#cccccc' width='250' style='text-align: center;'><b>&nbsp;Nome</b></td>
            <td bgcolor='#cccccc' width='250' style='text-align: center;'><b>&nbsp;Dados para Pagamento</b></td>

        </tr>
";

 while($arr=mysql_fetch_array($rs))
 { ?>
<tr>
            <td>&nbsp;<? echo $arr["nome"]; ?></td>
            <td>
            <font color="#FF0000">Email Pagseguro: <? echo $arr["emailpagseguro"]; ?></font><BR>
<b>Banco:</b> <? echo $arr["titulolink"]; ?>
<b> # Agencia:</b> <? echo $arr["linkdolink"]; ?><BR>
<b>N° da Conta:</b> <? echo $arr["linkdosite"]; ?> <BR>
<b>Tipo da Conta:</b> <? echo $arr["linkdaimagem"]; ?> <BR>
<b>Titular: </b><? echo $arr["linksitepequeno"]; ?><BR>



            </td>
            <td>

   <form action="EditarAtivo.php?membro=<? echo $arr["id"]; ?>" method="post"><INPUT type=submit class="input-submit"  value="Ver/Editar"></form>




            </td>

            <td>
<form action="FimDaFila.php?membro=<? echo $arr["id"]; ?>" method="post"><INPUT type=submit class="input-submit"  value="Pago - Fim da Fila!"></form>


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















 <?{
        echo "<h1>Membros Ativos (Todos da Fila-Única)</h1>";
  $step2=50;
  $currentpage2 = $p2;
    $sql2="Select * from ativo order by posicao";
  if(!$rs2=mysql_query($sql2))
  {
    print mysql_error();
    exit;
  }
  $row2=mysql_num_rows($rs2);
    $totallinks2=$row2;
  if(!isset($currentpage2))
  {
    $currentpage2=1;
  }

  if ($totallinks2 > 0)
  {
    if ($totallinks2 < 50)
    {
        echo("<p class='msg info'><b>Total de ATIVOS - " . $totallinks2 . "</b></p>");
    }
    else
    {
      if (($currentpage2*50) > $totallinks2)
      {
        echo("<p class='msg info'><b>Total de ATIVOS - ".$totallinks2."</b></p>");
      }
      else
      {
        echo("<p class='msg info'><b>Total de ATIVOS  -  ".$totallinks2."</b></p>");
      }
    }
  }

  if($totallinks2 > $step2)
  {
    $pagecount2=ceil($totallinks2/$step2);
    print "&nbsp;";
    for($i2=1;$i2<=$pagecount2;$i2++)
    {
      if($pageno2==$i2)
      {
        echo($i2 . " ");
      }
      else
      {
        echo("&nbsp; ");
      }
    }
    echo("&nbsp; ");
  }
  $start2=($currentpage2-1)*$step2;

    $query2="Select * from ativo order by posicao";
  $sql2 = $query2 . " LIMIT 99999";

$rs2=mysql_query($sql2);

if (mysql_num_rows($rs2))
{

print "
<table cellspacing='2' cellpadding='2' border='1'width='100%'>
    <tbody>
        <tr>
            <td bgcolor='#cccccc' width='250' style='text-align: center;'><b>&nbsp;Nome</b></td>
            <td bgcolor='#cccccc' width='250' style='text-align: center;'><b>&nbsp;Email</b></td>

        </tr>
";

 while($arr2=mysql_fetch_array($rs2))
 { ?>
<tr>
            <td>&nbsp;<? echo $arr2["nome"]; ?></td>
            <td>&nbsp;<? echo $arr2["email"]; ?></td>
            <td>

   <form action="EditarAtivo.php?membro=<? echo $arr2["id"]; ?>" method="post"><INPUT type=submit class="input-submit"  value="Ver/Editar"></form>




            </td>

            <td>
<form action="FimDaFila.php?membro=<? echo $arr2["id"]; ?>" method="post"><INPUT type=submit class="input-submit"  value="Pago - Fim da Fila!" readonly disabled></form>


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
