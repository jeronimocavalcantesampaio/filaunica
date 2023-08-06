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
$sql = mysql_query("select * from ativo where id=$id");
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

 $sqlex = "delete from ativo where id='$id'";
      $resultex = mysql_query($sqlex);

 $cadastrando = "INSERT INTO ativo (id, nome, sexo, estado, emailpagseguro, email, titulolink, linkdolink, linkdosite, linkdaimagem, linksitepequeno, linkimagempequena, senha, indicadopor, saldo, indicadodireto, cliquelink, cliquebannerp, cliquebanner, vis_link, vis_bannerp, vis_banner, cidade, datacadastro) VALUES('$id','$nome','$sexo','$estado','$emailpagseguro','$email','$titulolink','$linkdolink','$linkdosite','$linkdaimagem','$linksitepequeno','$linkimagempequena','$senha','$indicadopor','$saldo','$indicadodireto','$cliquelink','$cliquebannerp','$cliquebanner','$vis_link','$vis_bannerp','$vis_banner','$cidade','$datacadastro')";
mysql_query($cadastrando) or die(mysql_error());

$query1 = "INSERT INTO ganhadores (nome,cidade,estado,email) VALUES('$nome','$cidade','$estado','$email')";
mysql_query($query1) or die(mysql_error());


$message = "
<p><font size='2' face='verdana,geneva' style='font-weight: bold;'>Prezado(a) <font color='#cc0000'>$nome</font></font></p>
<p><font face='verdana,geneva'> </font></p>
<p><font size='2' face='verdana,geneva'>Um pagamento no valor de <strong>R$ $membershipperiod</strong> foi efetuado em sua conta pela nossa equipe, referente &agrave;s suas comiss&otilde;es.<br />
</font></p>
<p><font size='2' face='verdana,geneva'><b>Obs</b>: O valor citado acima pode haver descontos para a reentrada automática na fila-única.</font></p>
<p><font size='2' face='verdana,geneva'>Sua conta foi para o final da fila! Continue divulgando para chegar sua vez novamente!</font></p>
<p><font size='2' face='verdana,geneva'> </font></p>
<p><font face='verdana,geneva'> </font></p>
<p><font size='2'><font face='verdana,geneva'>Permanecemos &agrave; disposi&ccedil;&atilde;o.</font></font></p>
<p><font size='2' face='verdana,geneva'><font size='2'><font color='#000000'>
<p><font size='2' color='#000000'><strong>Atenciosamente,    </strong><br />
<br />
<strong>$sitename</strong></font><br />
$siteurl</p>
</font></font></font></p>

";

      // SENDING MAIL ***********************************> //
      $to = $email;
      $subject = "Você Recebeu!";
      $from = "$webmasteremail";
    	$header = "From: $sitename<$from>\n";
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




echo "
<h1>Fim da Fila</h1>
<p class='msg done'>O membro $nome foi para o fim da fila!.</p>
<p class='msg info'>O patrocinador deste membro ganhou R$ $signupbonus de comissão.</p>

";
}
}
mysql_close;
?>

<? }
include "footer.php";
?>
