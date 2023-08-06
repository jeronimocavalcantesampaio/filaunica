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
if(!isset($_GET['membro'])){
echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=painel.php'>";exit();
}
if(!$_GET['membro']!=$_SESSION['string']){
echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=painel.php'>";exit();
}
include "config.php";
$id=$_GET[membro];
$sqlz = "SELECT * FROM ativo WHERE id='$id'";
      $resultz = mysql_query($sqlz);
      $myrowz = mysql_fetch_array($resultz);
$numero=$myrowz["id"];
if(!$numero['id']!=$_SESSION['string']){
echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=painel.php'>";exit();
}
else
{
include "config.php";
$id=$_GET[membro];
$sqlz = "SELECT * FROM ativo WHERE id='$id'";
      $resultz = mysql_query($sqlz);
      $myrowz = mysql_fetch_array($resultz);
$membro=$myrowz["id"];
$email=$myrowz["emailpagseguro"];
$nome=$myrowz["nome"];
$saldo=$myrowz["saldo"];
      $sqlex = "UPDATE ativo SET saldo='0.00' WHERE id='$membro'";
      $resultex = mysql_query($sqlex);
      
      
$message = "
<p><font size='2' face='verdana,geneva' style='font-weight: bold;'>Ol&aacute; <font color='#cc0000'>$nome !</font></font></p>
<p><font face='verdana,geneva'> </font></p>
<p><font size='2' face='verdana,geneva'>Um pagamento foi efetuado em sua conta pela nossa equipe, referente &agrave;s suas comiss&otilde;es.</font></p>
<p><font size='2' face='verdana,geneva'>O pagamento foi efetuado para o seu email Pagsguro ou Conta Banc&aacute;ria Cadastrada.<br />
</font><font size='2' face='verdana,geneva'> </font><font face='verdana,geneva'> </font></p>
<p><font size='2' face='verdana,geneva'><font size='2'><font color='#000000'>
<div><font size='2' color='#000000'><strong>Atenciosamente,    </strong><br />
<strong>$sitename</strong></font><br />
$siteurl</div>
</font></font></font></p>
";

      // SENDING MAIL ***********************************> //
      $to = $email;
      $subject = "Pagamento de Comissão!";
      $from = "$webmasteremail";
    	$header = "From: $sitename <$from>\n";
	$header .="Content-type: text/html; charset=iso-8859-1\n";
	$header .= "Reply-To: <$from>\n";
	$header .= "X-Sender: <$from>\n";
	$header .= "X-Mailer: PHP4\n";
	$header .= "X-Priority: 3\n";
	$header .= "Return-Path: <$from>\n";
      mail($to,$subject,$message,$header);
      
      
echo "
<p class='msg done'>O saldo do membro foi zerado com sucesso e enviado um aviso por email.</p>
"; exit();
}

?>

<? }
include "footer.php";
?>

