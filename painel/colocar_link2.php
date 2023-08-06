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
<h1>Adicionar Link Lateral</h1>
<p class='msg info'>Links úteis para os visitantes acessarem.</p>
<form action=colocar_link2.php method=post>
<table cellspacing="0" cellpadding="0" border="0" width="100%">
    <tbody>
        <tr>
            <td><b>Nome do Link (Até 30 caracteres)</b></td>
        </tr>
        <tr>
            <td>&nbsp;<INPUT maxLength=30 name=titulo size=30></td>
        </tr>
        <tr>
            <td><b>Digite o Link do site (com http://)</b></td>
        </tr>
        <tr>
            <td>
             <INPUT maxLength=500 name=link size=100%>

</td>
        </tr>
    </tbody>
</table>
<p align="center"><INPUT name=FormsButton1 type=submit class="input-submit"   value="Adicionar"></p>

</form>

<?
}
else {
 $titulo = $_POST["titulo"];
 $link = $_POST["link"];

if($titulo==NULL|$link==NULL) {
echo "<h1>Adicionar Link Lateral</h1><p class='msg error'>Todos os Campos são obrigatórios!</p>
";
}else
{


 $cadastrando = "INSERT INTO links (titulo, link) VALUES('$titulo','$link')";
mysql_query($cadastrando) or die(mysql_error());







echo "
<h1>Adicionar Link Lateral</h1>
 <p class='msg done'>Link adicionado com sucesso.</p>
";
}
}
?>
<? }
include "footer.php";
?>
