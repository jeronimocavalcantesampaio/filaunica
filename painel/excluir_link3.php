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
include "config.php";
if(!$_POST) {
?>
<h1>Remover Banners</h1>
<p class='msg info'>Aqui você pode remover os banners.</p>
<table cellspacing="1" cellpadding="1" border="2" width="100%">
    <tbody>




    </tbody>
</table>
<table border="2" width="100%">


<?
$sql = mysql_query("SELECT * FROM banners ORDER BY id DESC");
$linhas = mysql_num_rows($sql);
if (!$sql){
echo " ";
}
else {
while ($reg = mysql_fetch_array($sql)){
$link = $reg['link'];
$id = $reg['id'];

echo "
<tr>
            <td>
            <div><b><img src='$link' border='0'> </b></div>

            </td>
            <td width='120' style='text-align: center;'>
<form action=excluir_link3.php method=post>
<INPUT type=hidden name=id value=$id>
<INPUT name=FormsButton1 type=submit class='input-submit'   value='Remover'>
</form>



            </td>
        </tr>
";
}
}
mysql_close;
?>

</table>

<?
}
else {
 $id = $_POST["id"];
$sqlex = "delete from banners where id='$id'";
      $resultex = mysql_query($sqlex);

echo "
<h1>Remover Banners</h1>
 <p class='msg done'>Banner removido com sucesso.</p>
";
}

?>
<? }
include "footer.php";
?>
