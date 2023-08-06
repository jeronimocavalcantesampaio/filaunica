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
<h1>Remover Downloads</h1>
<p class='msg info'>Aqui você pode remover os links para downloads.</p>
<table cellspacing="1" cellpadding="1" border="2" width="100%">
    <tbody>




    </tbody>
</table>
<table border="1" width="100%">


<?
$sql = mysql_query("SELECT * FROM arquivos ORDER BY id DESC");
$linhas = mysql_num_rows($sql);
if (!$sql){
echo "Nenhuma Pergunta Adicionada";
}
else {
while ($reg = mysql_fetch_array($sql)){
$titulo = $reg['titulo'];
$resposta = $reg['descricao'];
$link = $reg['link'];
$id = $reg['id'];

echo "
<tr>
            <td>
            <div><b>$titulo</b></div>
            <div>$resposta</div>
            </td>
            <td width='120' style='text-align: center;'>
<table width='100%'>
<tr>
  <td><form action=excluir_link.php method=post>
<INPUT type=hidden name=id value=$id>
<INPUT name=FormsButton1 type=submit class='input-submit'   value='Remover'>
</form></td>
  <td>
<form action=$link method=post>
<INPUT name=FormsButton1 type=submit class='input-submit'   value='Testar'>
</form>

  </td>
</tr>
</table>




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
$sqlex = "delete from arquivos where id='$id'";
      $resultex = mysql_query($sqlex);

echo "
<h1>Remover Downloads</h1>
 <p class='msg done'>Link removido com sucesso.</p>
";
}

?>
<? }
include "footer.php";
?>
