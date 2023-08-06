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
$sqlz = "SELECT * FROM pendente WHERE id='$id'";
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
$sqlz = "SELECT * FROM pendente WHERE id='$id'";
      $resultz = mysql_query($sqlz);
      $myrowz = mysql_fetch_array($resultz);
$membro=$myrowz["id"];
      $sqlex = "delete from pendente where id='$membro'";
      $resultex = mysql_query($sqlex);
echo "<h1>Membros Pendentes</h1><p class='msg done'>Membro Excluido Com Sucesso!</p>"; exit();
}

?>

<? }
include "footer.php";
?>

