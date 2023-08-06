<?php
  session_start();
  session_register("id_session");
  session_register("password_session");
  include "header.php";

  $id=$_SESSION["id_session"];
  $password=$_SESSION["password_session"];
if ($id=="" && $password=="")
{

?>
<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=MinhaConta.php'>
<? }
  else
{

?>

<? include ("menu.php"); ?>

<div style="text-align: center;"><span style="color: rgb(204, 0, 0);"><b><span style="font-size: medium;">Veja seus Indicados ATIVOS</span></b></span></div>
<table height="15" cellspacing="0" cellpadding="0" border="1" align="center" width="100%" style="">
    <tbody>
        <tr>
            <td bgcolor="#006600" style="text-align: center;"><span style="color: rgb(255, 255, 255);"><b>Nome Completo</b></span></td>
            <td bgcolor="#003300" width="30%" style="text-align: center;"><span style="color: rgb(255, 255, 0);"><b>Estado</b></span></td>
        </tr>
<?
include "config.php";
$id=$_SESSION["id_session"];
$sql3 = mysql_query("SELECT * FROM ativo WHERE indicadopor='$id'");
$linhas3 = mysql_num_rows($sql3);
if (!$sql3){
echo "
<tr>
<td>&nbsp;Nenhum Indicado</td>
<td>&nbsp;</td>
</tr>
";
}
else {
while ($reg3 = mysql_fetch_array($sql3)){
$nome2 = $reg3['nome'];
$estado2 = $reg3['estado'];

echo "
        <tr>
            <td>&nbsp;$nome2</td>
            <td>&nbsp;$estado2</td>
        </tr>
";
}
}
?>







    </tbody>
</table>
<div style="text-align: center;">&nbsp;</div>
<hr>
<hr>
<div style="text-align: center;"><span style="color: rgb(204, 0, 0);"><b><span style="font-size: medium;">Veja seus Indicados PENDENTES</span></b></span></div>
<table height="15" cellspacing="0" cellpadding="0" border="1" align="center" width="100%" style="">
    <tbody>
        <tr>
            <td bgcolor="#006600" style="text-align: center;"><span style="color: rgb(255, 255, 255);"><b>Nome Completo</b></span></td>
            <td bgcolor="#003300" width="50%" style="text-align: center;"><span style="color: rgb(255, 255, 0);"><b>Email</b></span></td>
        </tr>
<?
include "config.php";
$id=$_SESSION["id_session"];
$sql32 = mysql_query("SELECT * FROM pendente WHERE indicadopor='$id'");
$linhas32 = mysql_num_rows($sql32);
if (!$sql32){
echo "
<tr>
<td>&nbsp;Nenhum Indicado</td>
<td>&nbsp;</td>
</tr>
";
}
else {
while ($reg32 = mysql_fetch_array($sql32)){
$nome2 = $reg32['nome'];
$emailxx = $reg32['email'];

echo "
        <tr>
            <td>&nbsp;$nome2</td>
            <td>&nbsp;$emailxx</td>
        </tr>
";
}
}
?>







    </tbody>
</table>
<div style="text-align: center;">&nbsp;</div>

<?
}
?>

<?php
include "footer.php";
?>
