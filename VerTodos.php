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
<div style="text-align: center;"><span style="font-size: larger;"><span style="color: rgb(204, 0, 0);"><b>Veja os Próximos Membros da Fila-Única á receber R$  <? echo $membershipperiod ?> !
<br>Quando Você chegar no Topo e for o 1º Desta lista, será o Próximo!</b></span></span></div>

<table cellspacing="3" cellpadding="3" border="1" align="center" width="100%">
    <tbody>
        <tr>
             <td bgcolor="#006600" style="text-align: center;"><span style="color: rgb(255, 255, 255);"><b>Posição</b></span></td>
             <td bgcolor="#006600" style="text-align: center;"><span style="color: rgb(255, 255, 255);"><b>Nome</b></span></td>
            <td bgcolor="#006600" style="text-align: center;"><span style="color: rgb(255, 255, 255);"><b>Cidade</b></span></td>
            <td valign="top" bgcolor="#006600" width="100" style="text-align: center;"><span style="color: rgb(255, 255, 255);"><b>Estado</b></span></td>
        </tr>

<?
include "config.php";

$sql = mysql_query("SELECT * FROM ativo ORDER BY posicao");
$linhas = mysql_num_rows($sql);
if (!$sql){
echo "Nenhum Membro";
}
else {
while ($reg = mysql_fetch_array($sql)){
$nome = $reg['nome'];
$estado = $reg['estado'];
$cidade = $reg['cidade'];
$posicao = $reg['posicao'];

$num++;
echo "
<tr>
<td style='text-align: center;'>$num</td>
<td style='text-align: center;'>$nome</td>
<td style='text-align: center;'>$cidade</td>
<td style='text-align: center;'>$estado</td>
</tr>
";
}
}
mysql_close;
?>




    </tbody>
</table>
<p>&nbsp;</p>




<?
}
?>

<?php
include "footer.php";
?>
