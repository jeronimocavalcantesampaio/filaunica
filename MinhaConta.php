<?php
  session_start();
  session_register("id_session");
  session_register("password_session");
include "header.php";
include "config.php";
$a="";
$b="";
if ($_POST) {
	$a=trim($_POST["id"]);
	$b=trim($_POST["password"]);
	$a=str_replace("'","",$a);
	$b=str_replace("'","",$b);
	$a=str_replace("\"","",$a);
	$b=str_replace("\"","",$b);
}
if ($a=="" || $b=="")
{

  if ($_SESSION["id_session"]=="" || $_SESSION["password_session"]=="")
  {

?>
<h2>Minha Conta</h2><div class='item first'>

<p>&nbsp;</p><form action=MinhaConta.php method=post>
<table cellspacing="0" cellpadding="0" border="0" align="center" style="width: 284px; height: 53px;">
    <tbody>
        <tr>
            <td width="40%" style="text-align: right;"><b>Seu ID:</b></td>
            <td>&nbsp;<input type=text name=id></td>
        </tr>
        <tr>
            <td style="text-align: right;"><b>Senha:</b></td>
            <td>&nbsp;<input type=password name=password></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td style="text-align: center;"><input type=submit value="Entrar"></td>
        </tr>
    </tbody>
</table>
</form>

  <br> <br> <br>
<div><span style="color: rgb(204, 0, 0);"><b><span style="font-family: Arial;"><span style="font-size: larger;">ESQUECEU A SENHA?</span></span></b></span></div>

<IFRAME name=iframe marginWidth=0 marginHeight=0 src="LembrarSenha.php" frameBorder=0 width=100% height=150></IFRAME>


<?
  }
  else
  {
  middle();
  }
}
else
{
$check=0;

$id=$_POST["id"];
$rs = mysql_query("select * from ativo where id='$id'");

if ($rs) {
$arr=mysql_fetch_array($rs);
	$n2=$arr['senha'];
	if ($n2==$b) {
		$check=1;
		$_SESSION["id_session"]=$arr[id];
		$_SESSION["password_session"]=$arr[senha];
		middle();
	}
}
if ($check==0)
{
  print "<p align='center'><font color='#FF0000'>Login ou Senha Inválidos! Ou Sua conta está Inativa!</font></p>";
?>
<h2>Minha Conta</h2><div class='item first'>

<p>&nbsp;</p><form action=MinhaConta.php method=post>
<table cellspacing="0" cellpadding="0" border="0" align="center" style="width: 284px; height: 53px;">
    <tbody>
        <tr>
            <td width="40%" style="text-align: right;"><b>Seu ID:</b></td>
            <td>&nbsp;<input type=text name=id></td>
        </tr>
        <tr>
            <td style="text-align: right;"><b>Senha:</b></td>
            <td>&nbsp;<input type=password name=password></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td style="text-align: center;"><input type=submit value="Entrar"></td>
        </tr>
    </tbody>
</table>
</form>

  <br> <br> <br>
<div><span style="color: rgb(204, 0, 0);"><b><span style="font-family: Arial;"><span style="font-size: larger;">ESQUECEU A SENHA?</span></span></b></span></div>

<IFRAME name=iframe marginWidth=0 marginHeight=0 src="LembrarSenha.php" frameBorder=0 width=100% height=150></IFRAME>


<? 
} 
}

function middle()
{
$id=$_SESSION["id_session"];
include "config.php";
$sql = mysql_query("SELECT * FROM ativo WHERE id='$id'");
$linhas = mysql_num_rows($sql);
if (!$sql){
echo "Nenhum Link";
}
else {
while ($reg = mysql_fetch_array($sql)){
?>


<? include ("menu.php"); ?>
<table cellspacing="1" cellpadding="1" border="0" align="center" style="width: 100%; height: 23px;">
    <tbody>
        <tr>
            <td style="text-align: center;">&nbsp;<span style="font-size: larger;"><span style="color: rgb(255, 0, 0);"><b>Saldo do Bônus por Indicação: R$ <? echo $reg["saldo"]; ?></b></span></span></td>
        </tr>
    </tbody>
</table>
<hr />
<div style="text-align: center;">&nbsp;<b><font color="#008000">SEU LINK DE INDICAÇÃO:</font> <font color="#0000FF"><? echo $siteurl ?>/?ind=<? echo $reg["id"]; ?></font></b></div>
<hr />
<table cellspacing="0" cellpadding="0" border="0" width="100%">
    <tbody>
        <tr>
            <td bgcolor="#003300" style="text-align: center;"><span style="font-size: larger;"><span style="color: rgb(255, 255, 0);"><b>QUEM J&Aacute; GANHOU OS R$ <? echo $membershipperiod ?>?</b></span></span><span style="color: rgb(255, 255, 255);"> (&uacute;ltimos 10 Ganhadores)</span></td>
        </tr>
    </tbody>
</table>
<table cellspacing="0" cellpadding="0" border="1" width="100%">
    <tbody>
        <tr>
            <td bgcolor="#999999" style="text-align: center;"><b>Nome</b></td>
            <td bgcolor="#999999" width="200" style="text-align: center;"><b>Email</b></td>
            <td bgcolor="#999999" width="120" style="text-align: center;"><b>Cidade</b></td>
            <td bgcolor="#999999" width="120" style="text-align: center;"><b>Estado</b></td>
        </tr>
<?
include "config.php";
$sql4 = mysql_query("SELECT * FROM ganhadores ORDER BY id DESC LIMIT 10");
$linhas4 = mysql_num_rows($sql4);
if (!$sql4){
echo "Nenhum Membro";
}
else {
while ($reg4 = mysql_fetch_array($sql4)){
$nome4 = $reg4['nome'];
$cidade4 = $reg4['cidade'];
$email4 = $reg4['email'];
$estado4 = $reg4['estado'];

echo "
<tr>
            <td>&nbsp;$nome4</td>
            <td>&nbsp;$email4</td>
            <td>&nbsp;$cidade4</td>
            <td>&nbsp;$estado4</td>
</tr>
";
}
}
mysql_close;
?>

    </tbody>
</table>




<BR><BR><BR>
<hr>
<h3>Painel de Downloads</h3> <BR>
<table cellspacing="0" cellpadding="0" border="1" width="100%">
    <tbody>

<?
include "config.php";

$sqlxz = mysql_query("SELECT * FROM arquivos ORDER BY id DESC");
$linhasxz = mysql_num_rows($sqlxz);
if (!$sqlxz){
echo "Nenhum Conteudo";
}
else {
while ($regxz = mysql_fetch_array($sqlxz)){
$titulo = $regxz['titulo'];
$descricao = $regxz['descricao'];
$link = $regxz['link'];

echo "
<tr>
<td>
<div><span style='color: rgb(153, 0, 0);'><span style='font-size: larger;'><b>$titulo</b></span></span></div>
<div>$descricao</div>
</td>
<td width='120' style='text-align: center;'>
<form action=$link method=post>
<INPUT name=FormsButton1 type=submit class='input-submit'   value='Baixar'>
</form>


</td>
</tr>



";
}
}
mysql_close;
?>

    </tbody>
</table>

<hr>
<p><span style="color: rgb(204, 0, 0);"><b><span style="font-size: larger;">Banners Para divulgar</span></b></span></p>
<?
include "config.php";
$id=$_SESSION["id_session"];
$sqlxzs = mysql_query("SELECT * FROM banners ORDER BY id DESC");
$linhasxzs = mysql_num_rows($sqlxzs);
if (!$sqlxzs){
echo "Nenhum Banner";
}
else {
while ($regxzs = mysql_fetch_array($sqlxzs)){
$banner = $regxzs['link'];
$num++;
echo "

<hr />
<div><b>BANNER$num</b></div>
<p><a href='$siteurl/?ind=$id' target='_blank'><img border='0' src='$banner'></a></p>
<p><textarea name='' cols='30' rows='3'><p><a href='$siteurl/?ind=$id' target='_blank'><img border='0' src='$banner'></a></p></textarea></p>
<hr />


";
}
}
mysql_close;
?>






























<?
}
}
mysql_close;
}
include "footer.php";
?>
