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
            <td bgcolor="#0000FF">




<?php

include "config.php";
$id=$_GET[membro];
$sql = mysql_query("SELECT * FROM temp where ID=$id");
$linhas = mysql_num_rows($sql);
if (!$sql){
echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=index.php'>";
}
else {
while ($reg = mysql_fetch_array($sql)){

?>
<p align="center"><font color="#FF0000">Todos os campos são obrigatórios</font></p>
<script language="JavaScript">
function verificacao() {
if(document.verifica.first_name.value==""
 || document.verifica.address.value=="" || document.verifica.state.value=="" || document.verifica.country.value==""
 || document.verifica.zip.value=="" || document.verifica.phone.value=="" || document.verifica.city.value=="" || document.verifica.password.value=="") {
window.alert("Preencha todos os campos")
return false;
}
}
</script>
<form action="Editando.php?membro=<? echo $reg["ID"]; ?>&status=members" method="post"   onSubmit="return verificacao()" name="verifica">
<table cellspacing="0" cellpadding="0" border="0" style="width: 550px; height: 70px;" align="center">
    <tbody>
        <tr>
            <td width="40%" style="text-align: right;">Nome:</td>
            <td>&nbsp;<INPUT maxLength=55 name=first_name size=23 value="<? echo $reg["Name"]; ?>"></td>
        </tr>
        <tr>
            <td style="text-align: right;">Sexo:</td>
            <td>&nbsp;<INPUT maxLength=55 name=address size=23 value="<? echo $reg["Address"]; ?>"></td>
        </tr>
        <tr>
            <td style="text-align: right;">Estado:</td>
            <td>&nbsp;<INPUT maxLength=55 name=State size=23 value="<? echo $reg["State"]; ?>"></td>
        </tr>
        <tr>
            <td style="text-align: right;">Pa&iacute;s:</td>
            <td>&nbsp;<INPUT maxLength=55 name=country size=23 value="<? echo $reg["Country"]; ?>"></td>
        </tr>
        <tr>
            <td style="text-align: right;"><span style="font-weight: bold;">TITULO</span> do An&uacute;ncio: </td>
            <td>&nbsp;<INPUT maxLength=25 name=zip size=23 value="<? echo $reg["Zip"]; ?>"></td>
        </tr>
        <tr>
            <td style="text-align: right;"><b>LINK</b> do An&uacute;ncio:</td>
            <td>&nbsp;<INPUT maxLength=70 name=phone size=23 value="<? echo $reg["Phone"]; ?>"></td>
        </tr>
        <tr>
            <td style="text-align: right;">Pequena <b>DESCRI&Ccedil;&Atilde;O</b> do An&uacute;ncio:</td>
            <td>&nbsp;<INPUT maxLength=300 name=city size=23 value="<? echo $reg["City"]; ?>"> </td>
        </tr>
        <tr>
            <td style="text-align: right;">Email <b>Pagseguro</b>:</td>
            <td>&nbsp;<INPUT maxLength=55 name=paymentid size=23 value="<? echo $reg["PaymentDetails"]; ?>"></td>
        </tr>
        <tr>
            <td style="text-align: right;">Email:</td>
            <td>&nbsp;<INPUT maxLength=55 name=Email size=23 value="<? echo $reg["Email"]; ?>"></td>
        </tr>
        <tr>
            <td style="text-align: right;"><b>SENHA:</b></td>
            <td>&nbsp;<INPUT maxLength=55 type=password name=Password size=23 value="<? echo $reg["Password"]; ?>"></td>
        </tr>
        <tr>
            <td style="text-align: right;">&nbsp;</td>
            <td><INPUT name=FormsButton1 type=submit value="EDITAR"></td>
        </tr>
    </tbody>
</table>
</form>
<? }} ?>






            </td>
        </tr>
    </tbody>
</table>
</BODY>
</HTML>
<? } ?>


