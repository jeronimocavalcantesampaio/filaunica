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
<?php

include "config.php";
$id=$_GET[membro];
$sql = mysql_query("SELECT * FROM adminsettings");
$linhas = mysql_num_rows($sql);
if (!$sql){
echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=index.php'>";
}
else {
while ($reg = mysql_fetch_array($sql)){

?>
<h1>Configurações</h1>
<p class="msg info">Editar Dados do Site - Todos os Campos São Obrigatórios</p>
<form action="EditandoAdmin.php" method="post">
<table cellspacing="0" cellpadding="0" border="0" style="width: 550px; height: 70px;" align="center">
    <tbody>
        <tr>
            <td width="40%" style="text-align: right;">Nome Do Site:</td>
            <td>&nbsp;<INPUT maxLength=55 name=sitename size=23 value="<? echo $reg["sitename"]; ?>"></td>
        </tr>
        <tr>
            <td style="text-align: right;">Link Do site:</td>
            <td>&nbsp;<INPUT maxLength=55 name=siteurl size=23 value="<? echo $reg["siteurl"]; ?>"></td>
        </tr>
        <tr>
            <td style="text-align: right;">Email de Contato:</td>
            <td>&nbsp;<INPUT maxLength=55 name=Email size=23 value="<? echo $reg["Email"]; ?>"></td>
        </tr>
        <tr>
            <td style="text-align: right;">Senha:</td>
            <td>&nbsp;<INPUT maxLength=55 name=Password size=23 value="<? echo $reg["Password"]; ?>"></td>
        </tr>
        <tr>
            <td style="text-align: right;">Email Pagseguro: </td>
            <td>&nbsp;<INPUT maxLength=55 name=Alertpay size=23 value="<? echo $reg["Alertpay"]; ?>"></td>
        </tr>
         <tr>
            <td style="text-align: right;">Valor da Comissão: </td>
            <td>&nbsp;<INPUT maxLength=25 name="signupbonus" size=23 value="<? echo $reg["signupbonus"]; ?>"></td>
        </tr>
        <tr>
            <td style="text-align: right;">Valor pago ao chegar a vez do membro na fila-única: </td>
            <td>&nbsp;<INPUT maxLength=25 name="duration2" size=23 value="<? echo $reg["duration"]; ?>"></td>
        </tr>
        <tr>
            <td style="text-align: right;">&nbsp;</td>
            <td><INPUT name=FormsButton1 type=submit class="input-submit" value="EDITAR"></td>
        </tr>
    </tbody>
</table>
</form>
<? }} ?>

<? }
include "footer.php";
 ?>


