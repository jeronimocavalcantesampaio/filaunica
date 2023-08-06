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
<h1>Controle</h1>
<p class="msg info">O Número a ser seguido atualmente é  <b><?
include "config.php";

$sql = mysql_query("SELECT * FROM ativo ORDER BY posicao DESC LIMIT 1");
$linhas = mysql_num_rows($sql);
if (!$sql){
echo "Nenhum Membro";
}
else {
while ($reg = mysql_fetch_array($sql)){
$numero11 = $reg['posicao'];

echo "$numero11";
}
}
mysql_close;
?></b>. (Este número é apenas um controle para você ver quando precisa pagar mais um membro)</p>
<p class="msg info">Este número mostrado acima, é apenas uma informação em qual posição o sistema esta, para saber quando precisa pagar um membro, você deverá controlar em uma planilha em seu computador, pois isso dependerá de quantas em quantas ativações você efetuará um pagamento!</p>


<? }
 include "footer.php";
?>

