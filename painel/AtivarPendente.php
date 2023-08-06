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


<?

include "config.php";
$id=$_GET[membro];
$sql = mysql_query("select * from pendente where id=$id");
$linhas = mysql_num_rows($sql);
if (!$sql){
echo "Nenhum Membro";
}
else {
while ($reg = mysql_fetch_array($sql)){
$id=$_GET[membro];
$nome = $reg['nome'];
$sexo = $reg['sexo'];
$estado = $reg['estado'];
$emailpagseguro = $reg['emailpagseguro'];
$email = $reg['email'];
$titulolink = $reg['titulolink'];
$linkdolink = $reg['linkdolink'];
$linkdosite = $reg['linkdosite'];
$linkdaimagem = $reg['linkdaimagem'];
$linksitepequeno = $reg['linksitepequeno'];
$linkimagempequena = $reg['linkimagempequena'];
$senha = $reg['senha'];
$indicadopor = $reg['indicadopor'];
$saldo = $reg['saldo'];
$indicadodireto = $reg['indicadodireto'];
$cliquelink = $reg['cliquelink'];
$cliquebannerp = $reg['cliquebannerp'];
$cliquebanner = $reg['cliquebanner'];
$vis_link = $reg['vis_link'];
$vis_bannerp = $reg['vis_bannerp'];
$vis_banner = $reg['vis_banner'];
$cidade = $reg['cidade'];
$datacadastro = $reg['datacadastro'];



 $cadastrando = "INSERT INTO ativo (id, nome, sexo, estado, emailpagseguro, email, titulolink, linkdolink, linkdosite, linkdaimagem, linksitepequeno, linkimagempequena, senha, indicadopor, saldo, indicadodireto, cliquelink, cliquebannerp, cliquebanner, vis_link, vis_bannerp, vis_banner, cidade, datacadastro) VALUES('$id','$nome','$sexo','$estado','$emailpagseguro','$email','$titulolink','$linkdolink','$linkdosite','$linkdaimagem','$linksitepequeno','$linkimagempequena','$senha','$indicadopor','$saldo','$indicadodireto','$cliquelink','$cliquebannerp','$cliquebanner','$vis_link','$vis_bannerp','$vis_banner','$cidade','$datacadastro')";
mysql_query($cadastrando) or die(mysql_error());

$message = "
<p><font size='2' face='verdana,geneva' style='font-weight: bold;'>Prezado(a) <font color='#cc0000'>$nome</font></font></p>
<p><font size='2' face='verdana,geneva'>Nosso sistema acaba de identificar o pagamento da sua ades&atilde;o! <br />
</font></p>
<p><font size='2' face='verdana,geneva'>Agora sua conta est&aacute; <b>Ativa</b> e voc&ecirc; entrou na fila-&uacute;nica de ganhos!</font></p>
<div><span style='font-family: Verdana;'>Seus Dados de Acesso:</span></div>
<div>&nbsp;</div>
<div><span style='font-family: Verdana;'>
<b>ID:  $id</b>
</span></div>
<div><span style='font-family: Verdana;'><b>SENHA: $senha</b></span></div>
<div><span style='font-family: Verdana;'><br type='_moz' />
</span></div>
<div><span style='font-family: Verdana;'><b>Seu link de indica&ccedil;&atilde;o &eacute; $siteurl/?ind=$id</b><br type='_moz' />
</span></div>
<div><span style='font-family: Verdana;'>Em nosso sistema voc&ecirc; tamb&eacute;m ganha R$ $signupbonus por indicado direto!</span></div>
<div>&nbsp;</div>
<p><font size='2' face='Verdana, Arial, Helvetica, sans-serif'>Parab&eacute;ns, Obrigado e comece agora mesmo a INDICAR o sistema e ganhar conosco ! Permanecemos &aacute; disposi&ccedil;&atilde;o para qualquer d&uacute;vida.</font><font size='2' face='verdana,geneva'><font size='2'><font color='#000000'> </font></font> </font></p>
<p><font size='2' color='#000000'><strong>Atenciosamente, </strong><br />
<strong>$sitename</strong></font><br />
$siteurl</p>
";

      // SENDING MAIL ***********************************> //
      $to = $email;
      $subject = "Sua Conta Foi Ativada!";
      $from = "$webmasteremail";
    	$header = "From: $sitename <$from>\n";
	$header .="Content-type: text/html; charset=iso-8859-1\n";
	$header .= "Reply-To: <$from>\n";
	$header .= "X-Sender: <$from>\n";
	$header .= "X-Mailer: PHP4\n";
	$header .= "X-Priority: 3\n";
	$header .= "Return-Path: <$from>\n";
      mail($to,$subject,$message,$header);



$sqlz = "SELECT * FROM ativo WHERE id='$indicadopor'";
      $resultz = mysql_query($sqlz);
      $myrowz = mysql_fetch_array($resultz);
$numero=$myrowz["saldo"];
      $sqlex = "UPDATE ativo SET saldo='$numero'+$signupbonus WHERE id='$indicadopor'";
      $resultex = mysql_query($sqlex);

 $sqlex = "delete from pendente where id='$id'";
      $resultex = mysql_query($sqlex);


echo "
<h1>Membros Pendentes</h1>
<p class='msg done'>O membro $nome foi ativado!</p>
<p class='msg done'>O patrocinador deste membro ganhou R$ $signupbonus de comissão!</p>
<p class='msg info'>Se este membro não possuir um patrocinador, a comissão não foi gerada.</p>
";
}
}
mysql_close;
?>


<? }
 include "footer.php";
 ?>
