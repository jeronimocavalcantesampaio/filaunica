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
<h1>Adicionar Banners Para os Membros Divugarem o SISTEMA</h1>
<p class='msg warning'>No campo LINK DA IMAGEM, é somente o link onde esta imagem está hospedada, NÃO COLOQUE CÓDIGO HTML!!!</p>
<form action=colocar_link3.php method=post>
<table cellspacing="0" cellpadding="0" border="0" width="100%">
    <tbody>
        <tr>
            <td><b>Digite Abaixo o LINK DA IMAGEM</b></td>
        </tr>
        <tr>
            <td>&nbsp;<INPUT maxLength=500 name=link size=100%></td>
        </tr>
    </tbody>
</table>
<p align="center"><INPUT name=FormsButton1 type=submit class="input-submit"   value="Adicionar"></p>

</form>

<?
}
else {
 $link = $_POST["link"];

if($link==NULL) {
echo "<h1>Adicionar Banners</h1><p class='msg error'>Todos os Campos são obrigatórios!</p>
";
}else
{


 $cadastrando = "INSERT INTO banners (link) VALUES('$link')";
mysql_query($cadastrando) or die(mysql_error());







echo "
<h1>Adicionar Banners</h1>
 <p class='msg done'>Link de banner adicionado com sucesso.</p>
";
}
}
?>
<? }
include "footer.php";
?>
