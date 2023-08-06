<?php
include "config.php";
if(!$_POST) {
first();
}
else
{
$id=$_POST["id"];
$rs=mysql_query("Select * from ativo where id='$id'");
if(mysql_num_rows($rs)==0) {
echo("<p align='center'><font color='#FF0000'>Desculpe , Este ID não existe em nosso sistema!</font></p>");
first();
}
else
{
$arr=mysql_fetch_array($rs);
$body = "Olá membro do site $sitename!,<br>
 Você esqueceu a sua senha e solicitou que enviasse por email.<br> Segue abaixo: <br>
Seu ID: " .$arr[id]." <br>
Sua senha:" .$arr[senha]."<br><br>att.<br>".$sitename;

$to = $a;
$subject = "Sua Senha!";
$from = "senhas@$sitename.com";
    	$header = "From: $sitename <$from>\n";
	$header .="Content-type: text/html; charset=iso-8859-1\n";
	$header .= "Reply-To: <$from>\n";
	$header .= "X-Sender: <$from>\n";
	$header .= "X-Mailer: PHP4\n";
	$header .= "X-Priority: 3\n";
	$header .= "Return-Path: <$from>\n";
mail($to,$subject,$body,$header);

echo("<p align='center'><font color='#008000'><b>Sua senha foi enviada para seu e-mail " .$arr[email].", aguarde alguns minutos</b>!</font></p>");
}

}
?>
<br>
<br>
<?php
function first() { ?>

<p>&nbsp;</p>
<form action=LembrarSenha.php method=post>
<table height="36" cellspacing="0" cellpadding="0" border="0" align="center" width="472" style="">
    <tbody>
        <tr>
            <td width="40%" style="text-align: right;"><b>Digite Seu <b>ID</b>:</b></td>
            <td>&nbsp;<input name="id" size="30" ></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type="submit" value="Enviar Senha Para Meu Email"></td>
        </tr>
    </tbody>
</table>
   </form>

<?
}

?>
