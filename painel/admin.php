<?php
session_start();
session_register("admin_session");
session_register("totalusercount_session");
session_register("usercount_session");
include "config.php";

function top()
{

echo("<p align='center'>Acesso Restrito</p>");
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

<?
$b=$_GET[b];
if(!$b) $b=$_POST[b];
$id=$_POST[id];
$p=$_GET[p];
$act=$_GET[act];
$edit=$_POST[edit];

if($b=="100") {
    echo "<h3 align=center>Configurações do site</h3>";

      $sql = "select * from adminsettings";
      $result = mysql_query($sql);
      $rs  =  mysql_fetch_array($result);
      echo("<table><br><form action='admin.php' method=post><input type=hidden name=id value=1><input type=hidden name=edit value=1>");
}
    elseif($b=="Update Settings")
    {
      $sql_u="update adminsettings set
   sitename='$_POST[asitename]',
   siteurl='$_POST[asiteurl]',
   Email='$_POST[aemail]',
   Password='$_POST[apassword]',
   Alertpay='$_POST[alertpay]',
   profee='$_POST[profee]',
   levels='$_POST[llevels]',
   level1='$_POST[llevel1]',
   level2='$_POST[llevel2]',
   level3='$_POST[llevel3]',
   level4='$_POST[llevel4]',
   level5='$_POST[llevel5]',
   level6='$_POST[llevel6]',
   level7='$_POST[llevel7]',
   level8='$_POST[llevel8]',
   level9='$_POST[llevel9]',
   level10='$_POST[llevel10]',
   duration='$_POST[duration]',
   signupbonus='$_POST[signupbonus]',
   forcedmatrix='$_POST[forcedmatrix]'
";
      $rs=mysql_query($sql_u);

	echo("<br><br><b>Parabéns, Suas atualizações foram realizadas com sucesso!</b><br><br>");
    }

elseif($b=="99") {
  $_SESSION["admin_session"]="";
session_unregister('admin_session');
session_destroy();
?>
<script>
location.href='admin.php';
</script>
<?
}

elseif($b=="6") {
?>

<?
}

elseif($b=="Compress Matrix") {
set_time_limit(6000);
include "config.php";
$rs=mysql_query("update members set ref_by=0");
$rs=mysql_query("update members set Level1=0");
$rs=mysql_query("update members set Level2=0");
$rs=mysql_query("update members set Level3=0");
$rs=mysql_query("update members set Level4=0");
$rs=mysql_query("update members set Level5=0");
$rs=mysql_query("update members set Level6=0");
$rs=mysql_query("update members set Level7=0");
$rs=mysql_query("update members set Level8=0");
$rs=mysql_query("update members set Level9=0");
$rs=mysql_query("update members set Level10=0");
$l=1;
$rsmatrix=mysql_query("select * from members order by ID limit 0,1");
$arr=mysql_fetch_array($rsmatrix);
$fid=$arr[0];
$rsmatrix=mysql_query("select * from members where ID>$fid order by ID");
while($arrmatrix=mysql_fetch_array($rsmatrix)) {

$acountid=$arrmatrix[0];
$a[11]=$arrmatrix[22];

$rs=mysql_query("select * from members where Level1<'$forcedmatrix' and ID <>'$acountid' order by ID limit 0,1");
 if (mysql_num_rows($rs)>0)
 {
 $arr=mysql_fetch_array($rs);
 assignreferralss($acountid,$arr[0],0,1);
 }

}
echo "<br><b>SUCESO NA ATUALIZAÇÃO</b><br>";
}

//'************************************************************
elseif ($b=="101")
{
    if (!isset($_POST["srcorder"]))
    {
?>
<div align="center">
<TABLE WIDTH="90%" BORDER="0" CELLSPACING="0" CELLPADDING="5">
<TR>
<TD COLSPAN="2" HEIGHT="8" bgcolor="#ffffff"></TD>
</TR>
<TR>
<TD BGCOLOR="#ffffff" COLSPAN="2" ALIGN="CENTER">

<form action=admin.php?b=101 method=post>
<p><font face="Arial Black" size="5">Pesquisar membros no banco de dados</font><br><small>(deixe em branco caso queira pesquisar todos os membros)</p>
<input type=text name="src">
<select name=srcorder>
<option value="Search by ID">Pesquisar por ID</option>
<option value="Search by email">Pesquisar por email</option>
<option value="Search by pid">Pesquisar detalhes de pagamentos</option>
</select>
<input type=Submit value="Pesquisar">&nbsp;&nbsp;&nbsp;</form>
</td></tr></table>
<?
     }
     else {

if ($_POST["src"]=="")
{
$rs=mysql_query("Select * from members order by ID");

if (mysql_num_rows($rs))
{
print "<br><table width=90% border=1 cellspacing=0 cellpadding=0><tr><Td width=15 align=center>ID</td><td width=90 align=center>Name</td><td width=50 align=center>Country</td><td width=190 align=center>Email</td><td width=180 align=center>Payment Type & ID</td><td align=center>Action</td></tr>";
    while($arr=mysql_fetch_array($rs))
    {
	print "<tr><Td align=center>".$arr[0]."</td><Td align=center>".$arr[1]."</td><Td align=center>".$arr[6]."</td><Td align=center>".$arr[8]."</td><Td align=center>".$arr[10]."</td><Td align=center>";
	print "<form action=admin.php method=post><input type=hidden name=id 	value=".$arr[0]."><input type=Submit style=\"color: #000000; font-size: 10pt; font-family: 	Verdana; font-weight: bold; border: 1px ridge #000000; background-color: B0D8DD\" 	name=\"b\" value=\"View Details\">&nbsp;<input type=Submit style=\"color: #000000; 	font-size: 10pt; font-family: Verdana; font-weight: bold; border: 1px ridge #000000; 	background-color: B0D8DD\" name=\"b\" value=\"Resend Details\">&nbsp;<input type=Submit 	style=\"color: #000000; font-size: 10pt; font-family: Verdana; font-weight: bold; border: 	1px ridge #000000; background-color: B0D8DD\" name=\"b\" 	value=\"Delete\"></form></td></tr>";
    }
    print "</table>";
}
else
{
print "<br><b>Nenhum resultado</b>";
}
}

else
{
if ($_POST["srcorder"]=="Search by ID") {
$rs=mysql_query("Select * from members where ID=".$_POST["src"]);
}
elseif ($_POST["srcorder"]=="Search by email"){
$rs=mysql_query("Select * from members where Email like '%".$_POST["src"]."%'");
}
elseif ($_POST["srcorder"]=="Search by pid"){
$rs=mysql_query("Select * from members where PaymentDetails like '%".$_POST["src"]."%'");
}

if ($rs && mysql_num_rows($rs))
{
print "<br><table width=90% border=1 cellspacing=0 cellpadding=0><tr><Td width=15 align=center>ID</td><td width=90 align=center>Nome</td><td width=50 align=center>Pais</td><td width=190 align=center>Email</td><td width=180 align=center>Pag Seguro</td><td align=center>Ação</td></tr>";

    while($arr=mysql_fetch_array($rs))  {
    print "<tr><Td align=center>".$arr[0]."</td><Td align=center>".$arr[1]."</td><Td     align=center>".$arr[6]."</td><Td align=center>".$arr[8]."</td><Td align=center>".$arr[10]."</td><Td align=center>";

	print "<form action=admin.php method=post><input type=hidden name=id 	value=".$arr[0]."><input type=Submit style=\"color: #000000; font-size: 10pt; font-family: 	Verdana; font-weight: bold; border: 1px ridge #000000; background-color: B0D8DD\" 	name=\"b\" value=\"Ver detalhes do membro\">&nbsp;<input type=Submit style=\"color: #000000; 	font-size: 10pt; font-family: Verdana; font-weight: bold; border: 1px ridge #000000; 	background-color: B0D8DD\" name=\"b\" value=\"Resetar\">&nbsp;<input type=Submit 	style=\"color: #000000; font-size: 10pt; font-family: Verdana; font-weight: bold; border: 	1px ridge #000000; background-color: B0D8DD\" name=\"b\" 	value=\"Apagar\"></form></td></tr>";

    }
   print "</table>";
   }
  else
  {
  print "<br><b>Nenhum resultado</b>";
  }
 }
}

}


//**************************************************************
elseif ($b=="Resend Details") {
$rs=mysql_query("select * from members where id=".$_POST["id"]);
$arr=mysql_fetch_array($rs);

$body="Olá membro,<br>Sua conta foi ativada com sucesso .<br><br>Sua ID é ".$arr[0].", <br>Sua senha é ".$arr[9]." <br><br>Guarde bem a sua senha, pois ela servirá para você fazer login no site. <br><br>att<br>".$sitename."<br>".$siteurl;

$from = $webmasteremail;
$to = $arr[8];
$subject = $sitename." Informações da sua conta!";
    	$header = "From: $sitename<$from>\n";
	$header .="Content-type: text/html; charset=iso-8859-1\n";
	$header .= "Reply-To: <$from>\n";
	$header .= "X-Sender: <$from>\n";
	$header .= "X-Mailer: PHP4\n";
	$header .= "X-Priority: 3\n";
	$header .= "Return-Path: <$from>\n";
mail($to,$subject,$body,$header);

print "<b><br>Mensgem enviada com sucesso";
}

//**************************************************************
elseif ($b=="View Details") {
$rs=mysql_query("select * from members where id=".$_POST["id"]);
$arr=mysql_fetch_array($rs);
print "<table><br><br>";
print "<tr><Td width=200>ID</td><td width=400>".$arr[0]."</td></tr>";
print "<tr><Td width=200>Nome</td><td width=400>".$arr[1]."</td></tr>";
print "<tr><Td width=200>Sexo</td><td width=400>".$arr[2]."</td></tr>";
print "<tr><Td width=200>Cidade</td><td width=400>".$arr[3]."</td></tr>";
print "<tr><Td width=200>Estado</td><td width=400>".$arr[4]."</td></tr>";
print "<tr><Td width=200>CEP</td><td width=400>".$arr[5]."</td></tr>";
print "<tr><Td width=200>Pais</td><td width=400>".$arr[6]."</td></tr>";
print "<tr><Td width=200>Telefone</td><td width=400>".$arr[7]."</td></tr>";
print "<tr><Td width=200>Email</td><td width=400>".$arr[8]."</td></tr>";
print "<tr><Td width=200>Senha</td><td width=400>".$arr[9]."</td></tr>";
print "<tr><Td width=200>Pagseguro</td><td width=400>".$arr[10]."</td></tr>";
print "<tr><Td width=200>Indicado por</td><td width=400>".$arr[22]."</td></tr>";
print "<tr><Td width=200>Matrix Upline ID</td><td width=400>".$arr[11]."</td></tr>";
for($i=1;$i<=$levels;$i++) {
print "<tr><Td width=200>Nível".$i." Downline</td><td width=400>".$arr[11+$i]."</td></tr>";
}
print "<tr><Td width=200>Total ganho</td><td width=400>$".$arr[23]."</td></tr>";
print "<tr><Td width=200>Pendente</td><td width=400>$".$arr[24]."</td></tr>";
print "<tr><Td width=200>Pago</td><td width=400>$".$arr[25]."</td></tr>";
print "<tr><Td width=200>IP </td><td width=400>".$arr[26]."</td></tr>";
print "<tr><Td width=200>Date de registro</td><td width=400>".$arr[27]."</td></tr>";
print "<tr><td colspan=2><form action=admin.php method=post><input type=hidden name=id value=".$arr[0]."><input type=Submit style=\"color: #000000; font-size: 10pt; font-family: 	Verdana; font-weight: bold; border: 1px ridge #000000; background-color: B0D8DD\" 	name=\"b\" value=\"Ver detalhes\">&nbsp;<input type=Submit style=\"color: #000000; font-size: 10pt; font-family:Verdana; font-weight: bold; border: 1px ridge #000000; background-color: B0D8DD\" name=\"b\" value=\"Editar\">&nbsp;<input type=Submit style=\"color: #000000; 	font-size: 10pt; font-family: Verdana; font-weight: bold; border: 1px ridge #000000; 	background-color: B0D8DD\" name=\"b\" value=\"reenviar dados para usuário\">&nbsp;<input type=Submit 	style=\"color: #000000; font-size: 10pt; font-family: Verdana; font-weight: bold; border: 	1px ridge #000000; background-color: B0D8DD\" name=\"b\" value=\"apagar\"></form></td></tr>";
print "</table>";

}


//**************************************************************
elseif ($b=="999") {
if($_POST["email"]!="") {
        $query="update members set Name='$_POST[naame]', Address='$_POST[address]', City='$_POST[city]', State='$_POST[state]', Zip='$_POST[zip]', Country='$_POST[country]', Phone='$_POST[phone]', Email='$_POST[email]', PaymentDetails='$_POST[paymentdetails]', Password='$_POST[password]' where ID=".$_POST["id"];
	$rs = mysql_query($query);
   	echo "<b>SUCESSO!<br>";
}
$rs=mysql_query("select * from members where id=".$_POST["id"]);
$arr=mysql_fetch_array($rs);

print "<table><br><br><form action=admin.php?b=999 method=post>";
print "<tr><Td width=200>ID</td><td width=400>".$arr[0]."</td></tr>";
print "<tr><Td width=200>Nome</td><td width=400><input type=text name=\"naame\" value=\"".$arr[1]."\"></td></tr>";
print "<tr><Td width=200>sexo</td><td width=400><input type=text name=\"address\" value=\"".$arr[2]."\"></td></tr>";
print "<tr><Td width=200>Cidade</td><td width=400><input type=text name=\"city\" value=\"".$arr[3]."\"></td></tr>";
print "<tr><Td width=200>estado</td><td width=400><input type=text name=\"state\" value=\"".$arr[4]."\"></td></tr>";
print "<tr><Td width=200>cep</td><td width=400><input type=text name=\"zip\" value=\"".$arr[5]."\"></td></tr>";
print "<tr><Td width=200>pais</td><td width=400><input type=text name=\"country\" value=\"".$arr[6]."\"></td></tr>";
print "<tr><Td width=200>Phone</td><td width=400><input type=text name=\"phone\" value=\"".$arr[7]."\"></td></tr>";
print "<tr><Td width=200>Email</td><td width=400><input type=text name=\"email\" value=\"".$arr[8]."\"></td></tr>";
print "<tr><Td width=200>senha</td><td width=400><input type=text name=\"password\" value=\"".$arr[9]."\"></td></tr>";
print "<tr><Td width=200>pagseguro</td><td width=400><input type=text name=\"paymentdetails\" value=\"".$arr[10]."\"></td></tr>";
print "<tr><td colspan=2><font size=-1>só aceitamos pag seguro nesse site </font></td></tr>";
print "</table>";

print "<input type=hidden name=id value=".$arr[0]."><input type=Submit style=\"color: #000000; font-size: 10pt; font-family:Verdana; font-weight: bold; border: 1px ridge #000000; background-color: B0D8DD\" name=\"b\" value=\"EDITAR\"></form></td></tr>";

}


//**************************************************************
elseif($b=="1") {
        echo "<h2 align=center>Membros Ativos</h2>";
  $step=50;
  $currentpage = $p;
    $sql="Select * from members where Email<>'' order by ID";
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
        echo("<br><b>Displaying Records from 1 - " . $totallinks . "</b><br>");
    }
    else
    {
      if (($currentpage*50) > $totallinks)
      {
        echo("<br><b>Displaying Records from ".intval(($currentpage*50)-49)." - ".$totallinks."</b><br>");
      }
      else
      {
        echo("<br><b>Displaying Records from ".intval(($currentpage*50)-49)." - ".intval($currentpage*50)."</b><br>");
      }
    }
  }

  if($totallinks > $step)
  {
    $pagecount=ceil($totallinks/$step);
    print "<br>Page NO - &nbsp;&nbsp;";
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

    $query="Select * from members where Email<>'' order by ID";
  $sql = $query . " LIMIT $start,$step";

$rs=mysql_query($sql);

if (mysql_num_rows($rs))
{
print "<br><table width=90% border=1 cellspacing=0 cellpadding=0><tr><Td width=15 align=center>ID</td><td width=90 align=center>Name</td><td width=50 align=center>Country</td><td width=190 align=center>Email</td><td width=180 align=center>Payment Type & ID</td><td align=center>Action</td></tr>";

    while($arr=mysql_fetch_array($rs))  {
    print "<tr><Td align=center>".$arr[0]."</td><Td align=center>".$arr[1]."</td><Td     align=center>".$arr[6]."</td><Td align=center>".$arr[8]."</td><Td align=center>".$arr[10]."</td><Td align=center>";
	print "<form action=admin.php method=post><input type=hidden name=id 	value=".$arr[0]."><input type=Submit style=\"color: #000000; font-size: 10pt; font-family: 	Verdana; font-weight: bold; border: 1px ridge #000000; background-color: B0D8DD\" 	name=\"b\" value=\"View Details\">&nbsp;<input type=Submit style=\"color: #000000; 	font-size: 10pt; font-family: Verdana; font-weight: bold; border: 1px ridge #000000; 	background-color: B0D8DD\" name=\"b\" value=\"Resend Details\">&nbsp;<input type=Submit 	style=\"color: #000000; font-size: 10pt; font-family: Verdana; font-weight: bold; border: 	1px ridge #000000; background-color: B0D8DD\" name=\"b\" 	value=\"Delete\"></form></td></tr>";

    }
   print "</table>";
}
else
{
print "<br><center><br><b>No Records Found!</b></center>";
}
}


elseif($b=="2") {
        echo "<h2 align=center>Membros Pendentes</h2>";
  $step=50;
  $currentpage = $p;
    $sql="Select * from temp order by ID";
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
        echo("<br><b>Displaying Records from 1 - " . $totallinks . "</b><br>");
    }
    else
    {
      if (($currentpage*50) > $totallinks)
      {
        echo("<br><b>Displaying Records from ".intval(($currentpage*50)-49)." - ".$totallinks."</b><br>");
      }
      else
      {
        echo("<br><b>Displaying Records from ".intval(($currentpage*50)-49)." - ".intval($currentpage*50)."</b><br>");
      }
    }
  }

  if($totallinks > $step)
  {
    $pagecount=ceil($totallinks/$step);
    print "<br>Page NO - &nbsp;&nbsp;";
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

    $query="Select * from temp order by ID";
  $sql = $query . " LIMIT $start,$step";

$rs=mysql_query($sql);

if (mysql_num_rows($rs))
{
print "<br><table width=90% border=1 cellspacing=0 cellpadding=0><tr><Td width=15 align=center>ID</td><td width=90 align=center>Name</td><td width=50 align=center>Country</td><td width=190 align=center>Email</td><td width=180 align=center>Payment Type & ID</td><td align=center valign=center>Action</td></tr>";

 while($arr=mysql_fetch_array($rs))
 {
print "<tr><Td align=center>".$arr[0]."</td><Td align=center>".$arr[1]."</td><Td align=center>".$arr[6]."</td><Td align=center>".$arr[8]."</td><Td align=center>".$arr[10]."</td><Td align=center>";
print "<form action=admin.php method=post><input type=hidden name=id value=".$arr[0]."><input type=Submit style=\"color: #000000; font-size: 10pt; font-family: Verdana; font-weight: bold; border: 1px ridge #000000; background-color: B0D8DD\" name=\"b\" value=\"View  Details\">&nbsp;<input type=Submit style=\"color: #000000; font-size: 10pt; font-family: Verdana; font-weight: bold; border: 1px ridge #000000; background-color: B0D8DD\" name=\"b\" value=\"Verify User\">&nbsp;<input type=Submit style=\"color: #000000; font-size: 10pt; font-family: Verdana; font-weight: bold; border: 1px ridge #000000; background-color: B0D8DD\" name=\"b\" value=\"Delete Account\"></form></td></tr>";
 }
print "</table>";
}
else
{
print "<br><center><br><b>Nenhum dado aqui!</b></center>";
}
}



//**************************************************************
elseif($b=="View  Details") {
$rs=mysql_query("select * from temp where id=".$_POST["id"]);
$arr=mysql_fetch_array($rs);

print "<table><br><br>";
print "<tr><Td width=200>ID</td><td width=400>".$arr[0]."</td></tr>";
print "<tr><Td width=200>Nome</td><td width=400>".$arr[1]."</td></tr>";
print "<tr><Td width=200>sexo</td><td width=400>".$arr[2]."</td></tr>";
print "<tr><Td width=200>Cidade</td><td width=400>".$arr[3]."</td></tr>";
print "<tr><Td width=200>estado</td><td width=400>".$arr[4]."</td></tr>";
print "<tr><Td width=200>cep</td><td width=400>".$arr[5]."</td></tr>";
print "<tr><Td width=200>pais</td><td width=400>".$arr[6]."</td></tr>";
print "<tr><Td width=200>Phone</td><td width=400>".$arr[7]."</td></tr>";
print "<tr><Td width=200>Email</td><td width=400>".$arr[8]."</td></tr>";
print "<tr><Td width=200>senha</td><td width=400>".$arr[9]."</td></tr>";
print "<tr><Td width=200>pagseguro</td><td width=400>".$arr[10]."</td></tr>";
print "<tr><Td width=200>indicado por</td><td width=400>".$arr[11]."</td></tr>";
print "<tr><Td width=200>IP Address</td><td width=400>".$arr[12]."</td></tr>";
print "<tr><Td width=200>Data de registro</td><td width=400>".$arr[13]."</td></tr>";
print "<tr><td colspan=2><br><form action=admin.php method=post><input type=hidden name=id value=".$arr[0]."><input type=Submit style=\"color: #000000; font-size: 10pt; font-family: Verdana; font-weight: bold; border: 1px ridge #000000; background-color: B0D8DD\" name=\"b\" value=\"Verify User\">&nbsp;<input type=Submit style=\"color: #000000; font-size: 10pt; font-family: Verdana; font-weight: bold; border: 1px ridge #000000; background-color: B0D8DD\" name=\"b\" value=\"Delete Account\"></form></td></tr>";
print "</table>";
}


//**************************************************************
elseif($b=="Delete Account") {
$rs=mysql_query("delete from temp where ID=".$_POST["id"]);
print "<br><b>DELETADO";
}

//**************************************************************
elseif($b=="Delete") {
$rs=mysql_query("delete from members where ID=".$_POST["id"]);
$rs=mysql_query("delete from subsdetails where ID=".$_POST["id"]);
print "<br><b>DELETADO";
}

//********************************
elseif($b=="3") { ?>
<h1>NEWSLETTER</h1>
<p class="msg info">AQUI VOC&Ecirc; PODE MANDAR EMAILS PARA TODOS OS USUARIOS ATIVOS OU PENDENTES!</p>
<p class="msg warning">Pode usar código HTML no conteúdo.</p>

</font></p><form action=admin.php method=post>
<font face=verdana size=2>
<br><br>{name} PARA COLOCAR NOME DO TODOS NO EMAIL
<br>{id} PARA ID DO USUARIO<br>{password} PARA SENHA<br>{email} PARA Email DO MEMBRO<br>
<table border=0>
<tr><td align=right valign=top>ASSUNTO:</td><td align=left><input type=text name=subject></td></tr>
<tr><td align=right valign=top>FORMATO:</td><td align=left><Select name="format"><option Value="1">Texto<option value="0">HTML</select></td></tr>
<tr><td align=right valign=top><b>PARA MEMBROS</b>:</td><td align=left><Select name="para"><option Value="ativo">Ativos<option value="pendente">Pendentes</select></td></tr>
<tr><td align=right valign=top>MENSAGEM:</td><td align=left><textarea name=message cols=60 rows=10></textarea></td></tr>
<tr><td colspan=2 align=center valign=top><br>
<input class="input-submit" type=submit name="b" value="Enviar"></td></tr>
</form></table></p>
<?
}

//********************************
elseif($b=="Enviar") {

$subject=stripslashes($_POST["subject"]);
$format=$_POST["format"];
$para=$_POST["para"];
$message=stripslashes($_POST["message"]);
$users="";
$totalusercount_session=0;

$from = "$webmasteremail";
    	$header = "From: $sitename<$from>\n";
if($format==0)
	$header .="Content-type: text/html; charset=iso-8859-1\n";
else
	$header .="Content-type: text/plain; charset=iso-8859-1\n";
	$header .= "Reply-To: <$from>\n";
	$header .= "X-Sender: <$from>\n";
	$header .= "X-Mailer: PHP4\n";
	$header .= "X-Priority: 3\n";
	$header .= "Return-Path: <$from>\n";
$rs=mysql_query("select email,id,nome,senha from $para order by id");
$num=0;
 if (mysql_num_rows($rs))
 {
   while($arr=mysql_fetch_array($rs))
   {
	  $subject1=stripslashes($_POST[subject]);
	  $subject1=str_replace("{name}",$arr[nome],$subject1);
	  $subject1=str_replace("{id}",$arr[id],$subject1);
	  $subject1=str_replace("{password}",$arr[senha],$subject1);
	  $subject1=str_replace("{email}",$arr[email],$subject1);

	  $message1=$message;
	  $message1=str_replace("{name}",$arr[nome],$message1);
	  $message1=str_replace("{id}",$arr[id],$message1);
	  $message1=str_replace("{password}",$arr[senha],$message1);
	  $message1=str_replace("{email}",$arr[email],$message1);


      mail($arr[0],$subject1,$message1,$header);
      $num++;
      echo "<p class='msg done'>Mensagem enviada para :".$arr[email]."</p>";
   }
 }
}

//********************************
elseif($b=="Verify User") {
 include "config.php";
$rs1=mysql_query("select * from temp where ID=".$_POST["id"]);
$arr1=mysql_fetch_array($rs1);

for ($i=1; $i<=13; $i=$i+1) {
$a[$i]=$arr1[$i];
}

$rs1=null;

$rs1=mysql_query("delete from temp where ID=".$_POST["id"]);

for($i=1;$i<=11;$i++) {
$temparr[$i]=$a[$i];
}
for($i=12;$i<=25;$i++) {
$temparr[$i]=0;
}
$temparr[22]=$a[11];
$temparr[26]=$a[12];
$temparr[27]=$a[13];


$query="insert into members(Name,Address,City,State,Zip,Country,Phone,Email,Password,PaymentDetails,ref_by,Level1,Level2,Level3,Level4,Level5,Level6,Level7,Level8,Level9,Level10,Leader,Total,Unpaid,Paid,IP,Date) values (";
	for ($i=1;$i<=26;$i++) {
		$query=$query . "'" . $temparr[$i] . "', ";
	}
	$query=$query ."'". $temparr[27] . "')";

        $rs=mysql_query($query);
$b=mysql_insert_id();

        $rs=null;

if($b>0) {
$query="insert into subsdetails(CDate,RDate,UDate) values (
	  now(),
	  now(),
	  now()
	)";
        $rs=mysql_query($query);

	$acountid=$b;
$rs=mysql_query("update subsdetails set RDate='".date ( "Y-m-d h:i:s", mktime (date("h"),date("i"),date("s"),date("m"),date("d")+$membershipperiod,date("Y")))."' where ID=".$acountid);

$rs=mysql_query("Select * from members where ID=".$a[11]);
if(mysql_num_rows($rs)>0) {
$rsupdate=mysql_query("Update members set Total=Total+".$signupbonus." where ID=".$a[11]);
$rsupdate=mysql_query("Update members set Unpaid=Unpaid+".$signupbonus." where ID=".$a[11]);
}

$rs=mysql_query("select * from members where Level1<'$forcedmatrix' and ID <>'$acountid' order by ID limit 0,1");
 if (mysql_num_rows($rs)>0)
 {
 $arr=mysql_fetch_array($rs);
 assignreferrals($acountid,$arr[0],0,1);
 }


}

print "<b>Record SuccessFully Updated!</b>";
}


//********************************
elseif($b=="4") { ?>


<?php
}

//**************************************
elseif(($b=="Show Earnings")||($b=="se")) { ?>

<?
$k=$_GET[k];
if(($_POST["aff"]==1)||($k==1)) {
$sql="Select * from members order by ID";
$k=1;
}
else {
$sql="Select * from members order by Unpaid desc";
$k=2;
}

  $step=50;
  $currentpage = $p;

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
        echo("<br><b>Displaying Records from 1 - " . $totallinks . "</b><br>");
    }
    else
    {
      if (($currentpage*50) > $totallinks)
      {
        echo("<br><b>Displaying Records from ".intval(($currentpage*50)-49)." - ".$totallinks."</b><br>");
      }
      else
      {
        echo("<br><b>Displaying Records from ".intval(($currentpage*50)-49)." - ".intval($currentpage*50)."</b><br>");
      }
    }
  }

  if($totallinks > $step)
  {
    $pagecount=ceil($totallinks/$step);
    print "<br>Page NO - &nbsp;&nbsp;";
    for($i=1;$i<=$pagecount;$i++)
    {
      if($pageno==$i)
      {
        echo($i . " ");
      }
      else
      {
        echo("<br>");
      }
    }
    echo("<br>");
  }
  $start=($currentpage-1)*$step;

    $query=$sql;
  $sql = $query . " LIMIT $start,$step";

$rs=mysql_query($sql);



if (mysql_num_rows($rs)) {
print "<br>";

while($arr=mysql_fetch_array($rs)) {

print "<br>";
}
print "</table>";
}
else {
print "<br>";
}
}

//**************************************************************
elseif($b=="5") {
if($_POST["id"]=="") {
$rs=mysql_query("select * from subsdetails where RDate < now() order by RDate");
if (mysql_num_rows($rs))
{
print "<br>";

 while($arr=mysql_fetch_array($rs))
 {
$query="Select * from members where ID=".$arr[0];
$rs1=mysql_query($query);
$arr1=mysql_fetch_array($rs1);
print "<br>";
print "<br>";
 }
print "<br>";
}
else
{
print "<br>";
}
}
else {
$rs=mysql_query("update subsdetails set RDate='".date ( "Y-m-d H:i:s", mktime (date("H"),date("i"),date("s"),date("m"),date("d")+$membershipperiod,date("Y")))."' where ID=".$_POST["id"]);
$rs=mysql_query("update subsdetails set UDate='".date ( "Y-m-d H:i:s", mktime (date("H"),date("i"),date("s"),date("m"),date("d"),date("Y")))."' where ID=".$_POST["id"]);
$rs=mysql_query("Select * from members where ID=".$_POST["id"]);
$a=mysql_fetch_array($rs);
if ($a[22]!=0) {
$rs=mysql_query("update members set Total=Total+".$signupbonus.", Unpaid=Unpaid+".$signupbonus."  where ID=".$a[22]);
}
for($i=1;$i<=$levels;$i++) {
if ($a[11]!=0) {
$rs=mysql_query("Select * from members where ID=".$a[11]);
if(mysql_num_rows($rs)>0) {
$arr=mysql_fetch_array($rs);
if($i==1)
{$query="update members set Total=Total+".$level1.", Unpaid=Unpaid+".$level1." where ID=".$a[11];
}
elseif($i==2)
{
$query="update members set Total=Total+".$level2.", Unpaid=Unpaid+".$level2." where ID=".$a[11];
}
elseif($i==3)
{
$query="update members set Total=Total+".$level3.", Unpaid=Unpaid+".$level3." where ID=".$a[11];
}
elseif($i==4)
{
$query="update members set Total=Total+".$level4.", Unpaid=Unpaid+".$level4." where ID=".$a[11];
}
elseif($i==5)
{
$query="update members set Total=Total+".$level5.", Unpaid=Unpaid+".$level5." where ID=".$a[11];
}
elseif($i==6)
{
$query="update members set Total=Total+".$level6.", Unpaid=Unpaid+".$level6." where ID=".$a[11];
}
elseif($i==7)
{
$query="update members set Total=Total+".$level7.", Unpaid=Unpaid+".$level7." where ID=".$a[11];
}
elseif($i==8)
{
$query="update members set Total=Total+".$level8.", Unpaid=Unpaid+".$level8." where ID=".$a[11];
}
elseif($i==9)
{
$query="update members set Total=Total+".$level9.", Unpaid=Unpaid+".$level9." where ID=".$a[11];
}
elseif($i==10)
{
$query="update members set Total=Total+".$level10.", Unpaid=Unpaid+".$level10." where ID=".$a[11];
}

$rs = mysql_query($query);

$a[11]=$arr[11];
}//end of if loop checking that ID exists or not
else
{
break;
}

}//end of if loop checking that member with this ID exists or not
else
{
break;
}

}//end of for loop
print "<br>";
}
}


//*************************************
elseif($b=="Payout") {
$rs=mysql_query("select * from members where ID=$_POST[id]");
$arr=mysql_fetch_array($rs);
$unpaid=$arr[24];

$pay=$_POST["pay"];

if($unpaid<$pay) {
print "";
}
else {
$rs=mysql_query("Update members set Unpaid=Unpaid - $pay where ID=".$_POST["id"]);
$rs=mysql_query("Update members set Paid=Paid + $pay where ID=".$_POST["id"]);
print "<br>";
$s=$_POST["egold"];
$d=Split(":",$s);



if($d[0]=="paypal") { ?>

<?
}
if($d[0]=="inpays") { ?>

<?php
}

elseif($d[0]=="sfipay") { ?>

<?php
}
elseif($d[0]=="stormpay") { ?>

<?
}
elseif($d[0]=="alertpay") { ?>

<?
}
else { ?>

<?
}

}//end of else

}//end of elseif
  else { ?>
<br>
<br>
</font>
</center>
<?
  }
}//end of process function


//**********
function assignreferrals($acountid,$refid,$status,$level) {
include "config.php";

if($status==0) {
$rs=mysql_query("Update members set ref_by=".$refid." where ID=".$acountid);
}

if($level < ($levels+1)) {
$referralid=0;
$rs=mysql_query("Select * from members where ID=".$refid);
if(mysql_num_rows($rs)>0)
{
$arr=mysql_fetch_array($rs);
if($level==1) {
$rs=mysql_query("Update members set Level1=Level1+1 where ID=".$refid);
$rs=mysql_query("Update members set Total=Total+".$level1." where ID=".$refid);
$rs=mysql_query("Update members set Unpaid=Unpaid+".$level1." where ID=".$refid);
}
elseif($level==2) {
$rs=mysql_query("Update members set Level2=Level2+1 where ID=".$refid);
$rs=mysql_query("Update members set Total=Total+".$level2." where ID=".$refid);
$rs=mysql_query("Update members set Unpaid=Unpaid+".$level2." where ID=".$refid);
}
elseif($level==3) {
$rs=mysql_query("Update members set Level3=Level3+1 where ID=".$refid);
$rs=mysql_query("Update members set Total=Total+".$level3." where ID=".$refid);
$rs=mysql_query("Update members set Unpaid=Unpaid+".$level3." where ID=".$refid);
}
elseif($level==4) {
$rs=mysql_query("Update members set Level4=Level4+1 where ID=".$refid);
$rs=mysql_query("Update members set Total=Total+".$level4." where ID=".$refid);
$rs=mysql_query("Update members set Unpaid=Unpaid+".$level4." where ID=".$refid);
}
elseif($level==5) {
$rs=mysql_query("Update members set Level5=Level5+1 where ID=".$refid);
$rs=mysql_query("Update members set Total=Total+".$level5." where ID=".$refid);
$rs=mysql_query("Update members set Unpaid=Unpaid+".$level5." where ID=".$refid);
}
elseif($level==6) {
$rs=mysql_query("Update members set Level6=Level6+1 where ID=".$refid);
$rs=mysql_query("Update members set Total=Total+".$level6." where ID=".$refid);
$rs=mysql_query("Update members set Unpaid=Unpaid+".$level6." where ID=".$refid);
}
elseif($level==7) {
$rs=mysql_query("Update members set Level7=Level7+1 where ID=".$refid);
$rs=mysql_query("Update members set Total=Total+".$level7." where ID=".$refid);
$rs=mysql_query("Update members set Unpaid=Unpaid+".$level7." where ID=".$refid);
}
elseif($level==8) {
$rs=mysql_query("Update members set Level8=Level8+1 where ID=".$refid);
$rs=mysql_query("Update members set Total=Total+".$level8." where ID=".$refid);
$rs=mysql_query("Update members set Unpaid=Unpaid+".$level8." where ID=".$refid);
}
elseif($level==9) {
$rs=mysql_query("Update members set Level9=Level9+1 where ID=".$refid);
$rs=mysql_query("Update members set Total=Total+".$level9." where ID=".$refid);
$rs=mysql_query("Update members set Unpaid=Unpaid+".$level9." where ID=".$refid);
}
elseif($level==10) {
$rs=mysql_query("Update members set Level10=Level10+1 where ID=".$refid);
$rs=mysql_query("Update members set Total=Total+".$level10." where ID=".$refid);
$rs=mysql_query("Update members set Unpaid=Unpaid+".$level10." where ID=".$refid);
}



if($arr[11]!=0) {
$referralid=$arr[11];
}

if($referralid!=0) {
assignreferrals($acountid,$referralid,1,$level+1);
}

}
}

}//end of function


//**********
function assignreferralss($acountid,$refid,$status,$level) {
include "config.php";

if($status==0) {
$rs=mysql_query("Update members set ref_by=".$refid." where ID=".$acountid);
}

if($level < ($levels+1)) {
$referralid=0;
$rs=mysql_query("Select * from members where ID=".$refid);
if(mysql_num_rows($rs)>0)
{
$arr=mysql_fetch_array($rs);
if($level==1) {
$rs=mysql_query("Update members set Level1=Level1+1 where ID=".$refid);
}
elseif($level==2) {
$rs=mysql_query("Update members set Level2=Level2+1 where ID=".$refid);
}
elseif($level==3) {
$rs=mysql_query("Update members set Level3=Level3+1 where ID=".$refid);
}
elseif($level==4) {
$rs=mysql_query("Update members set Level4=Level4+1 where ID=".$refid);
}
elseif($level==5) {
$rs=mysql_query("Update members set Level5=Level5+1 where ID=".$refid);
}
elseif($level==6) {
$rs=mysql_query("Update members set Level6=Level6+1 where ID=".$refid);
}
elseif($level==7) {
$rs=mysql_query("Update members set Level7=Level7+1 where ID=".$refid);
}
elseif($level==8) {
$rs=mysql_query("Update members set Level8=Level8+1 where ID=".$refid);
}
elseif($level==9) {
$rs=mysql_query("Update members set Level9=Level9+1 where ID=".$refid);
}
elseif($level==10) {
$rs=mysql_query("Update members set Level10=Level10+1 where ID=".$refid);
}

if($arr[11]!=0) {
$referralid=$arr[11];
}

if($referralid!=0) {
assignreferralss($acountid,$referralid,1,$level+1);
}

}
}

}//end of function
 include "footer.php";
?>

