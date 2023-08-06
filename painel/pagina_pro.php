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
<h1>Página Produto</h1>
<p class='msg info'>Aqui você pode Editar o conteúdo da Produto. <b>Pode usar código HTML</b></p>
<table cellspacing="1" cellpadding="1" border="2" width="100%">
    <tbody>




    </tbody>
</table>

<?
$sql = mysql_query("SELECT * FROM produto ORDER BY id");
$linhas = mysql_num_rows($sql);
if (!$sql){
echo " ";
}
else {
while ($reg = mysql_fetch_array($sql)){
$conteudo = $reg['conteudo'];
$id = $reg['id'];
echo "
<form action=pagina_pro.php method=post>
<textarea rows='10' cols='100%' name=conteudo>$conteudo</textarea>
<input type='hidden' name=id value='$id'>
<p align='center'><INPUT name=FormsButton1 type=submit class='input-submit'   value='Salvar'></p>
</form>

";
}
}
mysql_close;
?>

<?
}
else {
 $conteudo1 = $_POST["conteudo"];
 $id = $_POST["id"];
$queryb = "UPDATE produto SET conteudo='$conteudo1' WHERE id='$id'";
mysql_query($queryb) or die(mysql_error());

echo "
<h1>Página Produto</h1>
 <p class='msg done'>Página Editada com Sucesso.</p>
";
}

?>
<? }
include "footer.php";
?>
