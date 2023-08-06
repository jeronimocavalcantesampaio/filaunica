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
<h1>Adicionar Link Para Downloads</h1>
<p class='msg info'>Links úteis para os visitantes acessarem.</p>
<form action=colocar_link.php method=post>
<table cellspacing="0" cellpadding="0" border="0" width="100%">
    <tbody>
        <tr>
            <td><b>Nome do Arquivo</b></td>
        </tr>
        <tr>
            <td>&nbsp;<INPUT maxLength=100 name=titulo size=30></td>
        </tr>
        <tr>
            <td><b>Pequena descrição</b></td>
        </tr>
        <tr>
            <td>
             <textarea rows="5" cols="100%" name=descricao></textarea>

</td>
        </tr>
        <tr>
            <td><b>Link do Arquivo</b></td>
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
 $descricao = $_POST["descricao"];
 $link = $_POST["link"];
if($titulo==NULL|$link==NULL) {
echo "<h1>Adicionar Link Para Downloads</h1><p class='msg error'>Todos os Campos são obrigatórios!</p>
";
}else
{


 $cadastrando = "INSERT INTO arquivos (titulo, descricao, link) VALUES('$titulo','$descricao','$link')";
mysql_query($cadastrando) or die(mysql_error());







echo "
<h1>Adicionar Link Para Downloads</h1>
 <p class='msg done'>Link para Download adicionado com sucesso.</p>
";
}
}
?>
<? }
include "footer.php";
?>
