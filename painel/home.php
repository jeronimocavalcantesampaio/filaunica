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
<p class="msg info">O N�mero a ser seguido atualmente �  <b><?
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
?></b>. (Este n�mero � apenas um controle para voc� ver quando precisa pagar mais um membro)</p>
<p class="msg info">Este n�mero mostrado acima, � apenas uma informa��o em qual posi��o o sistema esta, para saber quando precisa pagar um membro, voc� dever� controlar em uma planilha em seu computador, pois isso depender� de quantas em quantas ativa��es voc� efetuar� um pagamento!</p>


<? }
 include "footer.php";
?>

