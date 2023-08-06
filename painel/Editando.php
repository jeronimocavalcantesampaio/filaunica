<?php
session_start();
session_register("admin_session");
session_register("totalusercount_session");
session_register("usercount_session");
include "config.php";

function top()
{

echo("<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=index.php'>");
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

$id=$_GET[membro];
$tabela=$_GET[status];
$nome = $_POST["nome"];
 $sexo = $_POST["sexo"];
 $estado = $_POST["estado"];
 $emailpagseguro = $_POST["emailpagseguro"];
 $email = $_POST["email"];
$titulolink = $_POST["titulolink"];
$linkdolink = $_POST["linkdolink"];
$linkdosite = $_POST["linkdosite"];
$linkdaimagem = $_POST["linkdaimagem"];
$linksitepequeno = $_POST["linksitepequeno"];
$linkimagempequena = $_POST["linkimagempequena"];
 $senha = $_POST["senha"];
$indicadopor = $_POST["indicadopor"];
 $cidade = $_POST["cidade"];






include "config.php";
$queryb = "UPDATE $tabela SET nome='$nome', sexo='$sexo', estado='$estado', emailpagseguro='$emailpagseguro', email='$email', titulolink='$titulolink', linkdolink='$linkdolink', linkdosite='$linkdosite', linkdaimagem='$linkdaimagem', linksitepequeno='$linksitepequeno', linkimagempequena='$linkimagempequena', senha='$senha', indicadopor='$indicadopor', cidade='$cidade' WHERE id='$id'";
mysql_query($queryb) or die(mysql_error());

echo "
<h1>Editar Membro</h1>
<p class='msg done'>O Membro $nome Foi Editado Com Sucesso!</p>
";

?>


<? }
 include "footer.php";
?>

