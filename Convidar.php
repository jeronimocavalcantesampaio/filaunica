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

<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=MinhaConta.php'>
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
$rs = mysql_query("select * from members where ID='$id'");

if ($rs) {
$arr=mysql_fetch_array($rs);
	$n2=$arr['Password'];
	if ($n2==$b) {
		$check=1;
		$_SESSION["id_session"]=$arr[0];
		$_SESSION["password_session"]=$arr[9];
		middle();
	}
}
if ($check==0)
{
  print "<p align='center'><font color='#FF0000'>Login ou Senha Inválidos! Ou Sua conta está Inativa!</font></p>";
?>
<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=MinhaConta.php'>
<?
}
}

function middle()
{
	$id=$_SESSION["id_session"];
	$rs = mysql_query("select * from members where ID=$id");


?>


<? include ("menu.php"); ?>

<div style="text-align: center;"><span style="font-size: larger;"><span style="color: rgb(204, 0, 0);"><b>Formulário de Indicação</b></span></span></div>

<?php
include "config.php";
if(!$_POST) {
?>
<?
include "config.php";
$id=$_SESSION["id_session"];
$sql55 = mysql_query("SELECT * FROM ativo WHERE id='$id'");
$linhas55 = mysql_num_rows($sql55);
if (!$sql55){
echo "
ERRO
";
}
else {
while ($reg55 = mysql_fetch_array($sql55)){
$nome55 = $reg55['nome'];
$estado55 = $reg55['email'];
$id55 = $reg55['id'];

echo "

<form action=Convidar.php method=post>
<input type='hidden' name='nomeuser' value='$nome55'>
<input type='hidden' name='emailuser' value='$estado55'>
<input type='hidden' name='iduser' value='$id55'>
";

?>





<p><span style="font-size: small;"><span style="font-family: Verdana;"><span style="color: rgb(0, 128, 128);"><b>Ferramenta Para Indicar Por Emails<br />
</b></span></span></span></p>
<p><span style="color: rgb(255, 0, 0);">Para indicar, Insira abaixo o nome e e-mail das pessoas que deseja convidar.</span></p>
<table cellspacing="0" cellpadding="0" border="0" width="100%">
    <tbody>
        <tr>
            <td bgcolor="#cccccc">&nbsp; <b>Nome:</b> <input type="text" name="nome1" size="20"></td>
            <td bgcolor="#cccccc">&nbsp;<b>Email:</b> <input type="text" name="email1" size="20"></td>
        </tr>


        <tr>
            <td width="40%">&nbsp; <b>Nome:</b> <input type="text" name="nome2" size="20"></td>
            <td>&nbsp;<b>Email:</b> <input type="text" name="email2" size="20"></td>
        </tr>


        <tr>
            <td bgcolor="#cccccc">&nbsp; <b>Nome:</b> <input type="text" name="nome3" size="20"></td>
            <td bgcolor="#cccccc">&nbsp;<b>Email:</b> <input type="text" name="email3" size="20"></td>
        </tr>


        <tr>
            <td>&nbsp; <b>Nome:</b> <input type="text" name="nome4" size="20"></td>
            <td>&nbsp;<b>Email:</b> <input type="text" name="email4" size="20"></td>
        </tr>


        <tr>
            <td bgcolor="#cccccc">&nbsp; <b>Nome:</b> <input type="text" name="nome5" size="20"></td>
            <td bgcolor="#cccccc">&nbsp;<b>Email:</b> <input type="text" name="email5" size="20"></td>
        </tr>


    </tbody>
</table>
<p style="text-align: center;"><input type=submit value="Enviar Convites"></p>
</form>

<h3 align="center">Veja abaixo o email que será enviado:</h3>
<BR>
<p><b><span style="font-size: larger;"><span style="font-family: Times New Roman;">Ola (Nome do seu Amigo)! </span></span></b><span style="font-size: larger;"><span style="font-family: Times New Roman;"><br />
</span></span></p>
<p><span style="color: rgb(0, 102, 0);"><b><span style="font-size: larger;"><span style="font-family: Times New Roman;">Eu gostaria de lhe convidar para conhecer o <? echo $sitename ?>.</span></span></b></span></p>
<p><span style="font-size: larger;"><span style="font-family: Times New Roman;">Trata-se de um sistema lucrativo!. &Eacute; isso mesmo! Eu tambem nunca imaginei que poderia ganhar dinheiro na internet t&atilde;o r&aacute;pido, mas agora que conheci o <? echo $sitename ?>, cadastrei e ja estou ganhando, resolvi indicar para que voc&ecirc; tambem possa ganhar.<br />
</span></span></p>
<p><span style="color: rgb(204, 0, 0);"><b><span style="font-size: larger;"><span style="font-family: Times New Roman;">O cadastro &eacute; r&aacute;pidinho, espero que voc&ecirc; aceite meu convite!</span></span></b></span><span style="font-size: larger;"><span style="font-family: Times New Roman;"><br />
</span></span></p>
<p><b><span style="font-size: larger;"><span style="font-family: Times New Roman;">Ah! E tem mais!</span></span></b><span style="font-size: larger;"><span style="font-family: Times New Roman;"> Voc&ecirc; pode indicar ao seus amigos tamb&eacute;m!!</span></span></p>
<p><span style="color: rgb(0, 102, 0);"><b><span style="font-size: larger;"><span style="font-family: Times New Roman;">Voc&ecirc; ganha a cada amigo que indicar!</span></span></b></span></p>
<div><b><span style="font-size: larger;"><span style="font-family: Times New Roman;">Mas para cadastrar, use este link:</span></span></b><span style="font-size: larger;"><span style="font-family: Times New Roman;">&nbsp; <span style="color: rgb(255, 0, 0);"><b><? echo $siteurl ?>/?ind=<? echo $id55 ?></b></span><br />
&nbsp;<br />
<b>Sucessos!</b><br />
</span></span></div>
<div><span style="font-size: larger;"><span style="font-family: Times New Roman;"><b><? echo $nome55 ?></b></span></span></div>
<div><span style="font-size: larger;"><span style="font-family: Times New Roman;"><? echo $estado55 ?></span></span></div>
<p>&nbsp;</p>






<?
}
}

}
else {
      $to = $_POST["email1"];
      $subject = "".$_POST["nome1"].", Não apague antes de ler!!!";
      $from = $_POST["emailuser"];
      $message="
<p><b><span style='font-size: larger;'><span style='font-family: Times New Roman;'>Ola ".$_POST["nome1"]."! </span></span></b><span style='font-size: larger;'><span style='font-family: Times New Roman;'><br type='_moz' />
</span></span></p>
<p><span style='color: rgb(0, 102, 0);'><b><span style='font-size: larger;'><span style='font-family: Times New Roman;'>Eu gostaria de lhe convidar para conhecer o $sitename.</span></span></b></span></p>
<p><span style='font-size: larger;'><span style='font-family: Times New Roman;'>Trata-se de um sistema lucrativo!. &Eacute; isso mesmo! Eu tambem nunca imaginei que poderia ganhar dinheiro na internet t&atilde;o r&aacute;pido, mas agora que conheci o $sitename, cadastrei e ja estou ganhando, resolvi indicar para que voc&ecirc; tambem possa ganhar.<br type='_moz' />
</span></span></p>
<p><span style='color: rgb(204, 0, 0);'><b><span style='font-size: larger;'><span style='font-family: Times New Roman;'>O cadastro &eacute; r&aacute;pidinho, espero que voc&ecirc; aceite meu convite!</span></span></b></span><span style='font-size: larger;'><span style='font-family: Times New Roman;'><br type='_moz' />
</span></span></p>
<p><b><span style='font-size: larger;'><span style='font-family: Times New Roman;'>Ah! E tem mais!</span></span></b><span style='font-size: larger;'><span style='font-family: Times New Roman;'> Voc&ecirc; pode indicar ao seus amigos tamb&eacute;m!!</span></span></p>
<p><span style='color: rgb(0, 102, 0);'><b><span style='font-size: larger;'><span style='font-family: Times New Roman;'>Voc&ecirc; ganha a cada amigo que indicar!</span></span></b></span></p>
<div><b><span style='font-size: larger;'><span style='font-family: Times New Roman;'>Mas para cadastrar, use este link:</span></span></b><span style='font-size: larger;'><span style='font-family: Times New Roman;'>&nbsp; <span style='color: rgb(255, 0, 0);'><b>$siteurl/?ind=".$_POST["iduser"]."</b></span><br />
&nbsp;<br />
<b>Sucessos!</b><br />
</span></span></div>
<div><span style='font-size: larger;'><span style='font-family: Times New Roman;'><b>".$_POST["nomeuser"]."</b></span></span></div>
<div><span style='font-size: larger;'><span style='font-family: Times New Roman;'>".$_POST["emailuser"]."</span></span></div>

";
    	$header = "From: ".$_POST["nomeuser"]." <$from>\n";
	$header .="Content-type: text/html; charset=iso-8859-1\n";
	$header .= "Reply-To: <$from>\n";
	$header .= "X-Sender: <$from>\n";
	$header .= "X-Mailer: PHP4\n";
	$header .= "X-Priority: 3\n";
	$header .= "Return-Path: <$from>\n";

      mail($to,$subject,$message,$header);






            $to = $_POST["email2"];
      $subject = "".$_POST["nome2"].", Não apague antes de ler!!!";
      $from = $_POST["emailuser"];
      $message="
<p><b><span style='font-size: larger;'><span style='font-family: Times New Roman;'>Ola ".$_POST["nome2"]."! </span></span></b><span style='font-size: larger;'><span style='font-family: Times New Roman;'><br type='_moz' />
</span></span></p>
<p><span style='color: rgb(0, 102, 0);'><b><span style='font-size: larger;'><span style='font-family: Times New Roman;'>Eu gostaria de lhe convidar para conhecer o $sitename.</span></span></b></span></p>
<p><span style='font-size: larger;'><span style='font-family: Times New Roman;'>Trata-se de um sistema lucrativo!. &Eacute; isso mesmo! Eu tambem nunca imaginei que poderia ganhar dinheiro na internet t&atilde;o r&aacute;pido, mas agora que conheci o $sitename, cadastrei e ja estou ganhando, resolvi indicar para que voc&ecirc; tambem possa ganhar.<br type='_moz' />
</span></span></p>
<p><span style='color: rgb(204, 0, 0);'><b><span style='font-size: larger;'><span style='font-family: Times New Roman;'>O cadastro &eacute; r&aacute;pidinho, espero que voc&ecirc; aceite meu convite!</span></span></b></span><span style='font-size: larger;'><span style='font-family: Times New Roman;'><br type='_moz' />
</span></span></p>
<p><b><span style='font-size: larger;'><span style='font-family: Times New Roman;'>Ah! E tem mais!</span></span></b><span style='font-size: larger;'><span style='font-family: Times New Roman;'> Voc&ecirc; pode indicar ao seus amigos tamb&eacute;m!!</span></span></p>
<p><span style='color: rgb(0, 102, 0);'><b><span style='font-size: larger;'><span style='font-family: Times New Roman;'>Voc&ecirc; ganha a cada amigo que indicar!</span></span></b></span></p>
<div><b><span style='font-size: larger;'><span style='font-family: Times New Roman;'>Mas para cadastrar, use este link:</span></span></b><span style='font-size: larger;'><span style='font-family: Times New Roman;'>&nbsp; <span style='color: rgb(255, 0, 0);'><b>$siteurl/?ind=".$_POST["iduser"]."</b></span><br />
&nbsp;<br />
<b>Sucessos!</b><br />
</span></span></div>
<div><span style='font-size: larger;'><span style='font-family: Times New Roman;'><b>".$_POST["nomeuser"]."</b></span></span></div>
<div><span style='font-size: larger;'><span style='font-family: Times New Roman;'>".$_POST["emailuser"]."</span></span></div>

      ";
    	$header = "From: ".$_POST["nomeuser"]." <$from>\n";
	$header .="Content-type: text/html; charset=iso-8859-1\n";
	$header .= "Reply-To: <$from>\n";
	$header .= "X-Sender: <$from>\n";
	$header .= "X-Mailer: PHP4\n";
	$header .= "X-Priority: 3\n";
	$header .= "Return-Path: <$from>\n";

      mail($to,$subject,$message,$header);















            $to = $_POST["email3"];
      $subject = "".$_POST["nome3"].", Não apague antes de ler!!!";
      $from = $_POST["emailuser"];
      $message="
<p><b><span style='font-size: larger;'><span style='font-family: Times New Roman;'>Ola ".$_POST["nome3"]."! </span></span></b><span style='font-size: larger;'><span style='font-family: Times New Roman;'><br type='_moz' />
</span></span></p>
<p><span style='color: rgb(0, 102, 0);'><b><span style='font-size: larger;'><span style='font-family: Times New Roman;'>Eu gostaria de lhe convidar para conhecer o $sitename.</span></span></b></span></p>
<p><span style='font-size: larger;'><span style='font-family: Times New Roman;'>Trata-se de um sistema lucrativo!. &Eacute; isso mesmo! Eu tambem nunca imaginei que poderia ganhar dinheiro na internet t&atilde;o r&aacute;pido, mas agora que conheci o $sitename, cadastrei e ja estou ganhando, resolvi indicar para que voc&ecirc; tambem possa ganhar.<br type='_moz' />
</span></span></p>
<p><span style='color: rgb(204, 0, 0);'><b><span style='font-size: larger;'><span style='font-family: Times New Roman;'>O cadastro &eacute; r&aacute;pidinho, espero que voc&ecirc; aceite meu convite!</span></span></b></span><span style='font-size: larger;'><span style='font-family: Times New Roman;'><br type='_moz' />
</span></span></p>
<p><b><span style='font-size: larger;'><span style='font-family: Times New Roman;'>Ah! E tem mais!</span></span></b><span style='font-size: larger;'><span style='font-family: Times New Roman;'> Voc&ecirc; pode indicar ao seus amigos tamb&eacute;m!!</span></span></p>
<p><span style='color: rgb(0, 102, 0);'><b><span style='font-size: larger;'><span style='font-family: Times New Roman;'>Voc&ecirc; ganha a cada amigo que indicar!</span></span></b></span></p>
<div><b><span style='font-size: larger;'><span style='font-family: Times New Roman;'>Mas para cadastrar, use este link:</span></span></b><span style='font-size: larger;'><span style='font-family: Times New Roman;'>&nbsp; <span style='color: rgb(255, 0, 0);'><b>$siteurl/?ind=".$_POST["iduser"]."</b></span><br />
&nbsp;<br />
<b>Sucessos!</b><br />
</span></span></div>
<div><span style='font-size: larger;'><span style='font-family: Times New Roman;'><b>".$_POST["nomeuser"]."</b></span></span></div>
<div><span style='font-size: larger;'><span style='font-family: Times New Roman;'>".$_POST["emailuser"]."</span></span></div>

      ";
    	$header = "From: ".$_POST["nomeuser"]." <$from>\n";
	$header .="Content-type: text/html; charset=iso-8859-1\n";
	$header .= "Reply-To: <$from>\n";
	$header .= "X-Sender: <$from>\n";
	$header .= "X-Mailer: PHP4\n";
	$header .= "X-Priority: 3\n";
	$header .= "Return-Path: <$from>\n";

      mail($to,$subject,$message,$header);









            $to = $_POST["email4"];
      $subject = "".$_POST["nome4"].", Não apague antes de ler!!!";
      $from = $_POST["emailuser"];
      $message="
<p><b><span style='font-size: larger;'><span style='font-family: Times New Roman;'>Ola ".$_POST["nome4"]."! </span></span></b><span style='font-size: larger;'><span style='font-family: Times New Roman;'><br type='_moz' />
</span></span></p>
<p><span style='color: rgb(0, 102, 0);'><b><span style='font-size: larger;'><span style='font-family: Times New Roman;'>Eu gostaria de lhe convidar para conhecer o $sitename.</span></span></b></span></p>
<p><span style='font-size: larger;'><span style='font-family: Times New Roman;'>Trata-se de um sistema lucrativo!. &Eacute; isso mesmo! Eu tambem nunca imaginei que poderia ganhar dinheiro na internet t&atilde;o r&aacute;pido, mas agora que conheci o $sitename, cadastrei e ja estou ganhando, resolvi indicar para que voc&ecirc; tambem possa ganhar.<br type='_moz' />
</span></span></p>
<p><span style='color: rgb(204, 0, 0);'><b><span style='font-size: larger;'><span style='font-family: Times New Roman;'>O cadastro &eacute; r&aacute;pidinho, espero que voc&ecirc; aceite meu convite!</span></span></b></span><span style='font-size: larger;'><span style='font-family: Times New Roman;'><br type='_moz' />
</span></span></p>
<p><b><span style='font-size: larger;'><span style='font-family: Times New Roman;'>Ah! E tem mais!</span></span></b><span style='font-size: larger;'><span style='font-family: Times New Roman;'> Voc&ecirc; pode indicar ao seus amigos tamb&eacute;m!!</span></span></p>
<p><span style='color: rgb(0, 102, 0);'><b><span style='font-size: larger;'><span style='font-family: Times New Roman;'>Voc&ecirc; ganha a cada amigo que indicar!</span></span></b></span></p>
<div><b><span style='font-size: larger;'><span style='font-family: Times New Roman;'>Mas para cadastrar, use este link:</span></span></b><span style='font-size: larger;'><span style='font-family: Times New Roman;'>&nbsp; <span style='color: rgb(255, 0, 0);'><b>$siteurl/?ind=".$_POST["iduser"]."</b></span><br />
&nbsp;<br />
<b>Sucessos!</b><br />
</span></span></div>
<div><span style='font-size: larger;'><span style='font-family: Times New Roman;'><b>".$_POST["nomeuser"]."</b></span></span></div>
<div><span style='font-size: larger;'><span style='font-family: Times New Roman;'>".$_POST["emailuser"]."</span></span></div>

      ";
    	$header = "From: ".$_POST["nomeuser"]." <$from>\n";
	$header .="Content-type: text/html; charset=iso-8859-1\n";
	$header .= "Reply-To: <$from>\n";
	$header .= "X-Sender: <$from>\n";
	$header .= "X-Mailer: PHP4\n";
	$header .= "X-Priority: 3\n";
	$header .= "Return-Path: <$from>\n";

      mail($to,$subject,$message,$header);









            $to = $_POST["email5"];
      $subject = "".$_POST["nome5"].", Não apague antes de ler!!!";
      $from = $_POST["emailuser"];
      $message="
<p><b><span style='font-size: larger;'><span style='font-family: Times New Roman;'>Ola ".$_POST["nome5"]."! </span></span></b><span style='font-size: larger;'><span style='font-family: Times New Roman;'><br type='_moz' />
</span></span></p>
<p><span style='color: rgb(0, 102, 0);'><b><span style='font-size: larger;'><span style='font-family: Times New Roman;'>Eu gostaria de lhe convidar para conhecer o $sitename.</span></span></b></span></p>
<p><span style='font-size: larger;'><span style='font-family: Times New Roman;'>Trata-se de um sistema lucrativo!. &Eacute; isso mesmo! Eu tambem nunca imaginei que poderia ganhar dinheiro na internet t&atilde;o r&aacute;pido, mas agora que conheci o $sitename, cadastrei e ja estou ganhando, resolvi indicar para que voc&ecirc; tambem possa ganhar.<br type='_moz' />
</span></span></p>
<p><span style='color: rgb(204, 0, 0);'><b><span style='font-size: larger;'><span style='font-family: Times New Roman;'>O cadastro &eacute; r&aacute;pidinho, espero que voc&ecirc; aceite meu convite!</span></span></b></span><span style='font-size: larger;'><span style='font-family: Times New Roman;'><br type='_moz' />
</span></span></p>
<p><b><span style='font-size: larger;'><span style='font-family: Times New Roman;'>Ah! E tem mais!</span></span></b><span style='font-size: larger;'><span style='font-family: Times New Roman;'> Voc&ecirc; pode indicar ao seus amigos tamb&eacute;m!!</span></span></p>
<p><span style='color: rgb(0, 102, 0);'><b><span style='font-size: larger;'><span style='font-family: Times New Roman;'>Voc&ecirc; ganha a cada amigo que indicar!</span></span></b></span></p>
<div><b><span style='font-size: larger;'><span style='font-family: Times New Roman;'>Mas para cadastrar, use este link:</span></span></b><span style='font-size: larger;'><span style='font-family: Times New Roman;'>&nbsp; <span style='color: rgb(255, 0, 0);'><b>$siteurl/?ind=".$_POST["iduser"]."</b></span><br />
&nbsp;<br />
<b>Sucessos!</b><br />
</span></span></div>
<div><span style='font-size: larger;'><span style='font-family: Times New Roman;'><b>".$_POST["nomeuser"]."</b></span></span></div>
<div><span style='font-size: larger;'><span style='font-family: Times New Roman;'>".$_POST["emailuser"]."</span></span></div>

      ";
    	$header = "From: ".$_POST["nomeuser"]." <$from>\n";
	$header .="Content-type: text/html; charset=iso-8859-1\n";
	$header .= "Reply-To: <$from>\n";
	$header .= "X-Sender: <$from>\n";
	$header .= "X-Mailer: PHP4\n";
	$header .= "X-Priority: 3\n";
	$header .= "Return-Path: <$from>\n";

      mail($to,$subject,$message,$header);

echo "<p align='center'><b><font color='#008000'>Sua mensagem foi enviada com sucesso!</font></b></p><br><br><p align='center'><b><a href='Convidar.php'>VOLTAR</a></b></p>
";
}

?>
<?
}
include "footer.php";
?>
