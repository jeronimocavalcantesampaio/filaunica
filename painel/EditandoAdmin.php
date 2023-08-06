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
<h1>Configurações</h1>
<?
$site1 = $_POST["sitename"];
$siteurl22 = $_POST["siteurl"];
$Email = $_POST["Email"];
$Password = $_POST["Password"];
$Alertpay = $_POST["Alertpay"];
$signupbonus2 = $_POST["signupbonus"];
$duration2 = $_POST["duration2"];


include "config.php";
$queryb = "UPDATE adminsettings SET sitename='$site1', siteurl='$siteurl22', Email='$Email', Password='$Password', Alertpay='$Alertpay', signupbonus='$signupbonus2', duration='$duration2'";
mysql_query($queryb) or die(mysql_error());

echo "
<p class='msg done'>Dados Editado Com Sucesso!</p>";

?>




<? }
include "footer.php";
 ?>

