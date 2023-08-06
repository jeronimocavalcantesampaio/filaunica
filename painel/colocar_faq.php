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
<h1>Adicionar FAQ</h1>
<p class='msg info'>Aqui você pode adicionar perguntas e respostas na página faq.</p>
<form action=colocar_faq.php method=post>
<table cellspacing="0" cellpadding="0" border="0" width="100%">
    <tbody>
        <tr>
            <td><b>Digite abaixo uma pergunta:</b></td>
        </tr>
        <tr>
            <td>&nbsp;<INPUT maxLength=500 name=titulo size=100%></td>
        </tr>
        <tr>
            <td><b>Digite abaixo a resposta:</b></td>
        </tr>
        <tr>
            <td>
             <textarea rows="4" cols="100%" name=resposta ></textarea>

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
 $resposta = $_POST["resposta"];

if($titulo==NULL|$resposta==NULL) {
echo "<h1>Adicionar FAQ</h1><p class='msg error'>Todos os Campos são obrigatórios!</p>
";
}else
{


 $cadastrando = "INSERT INTO faq (titulo, resposta) VALUES('$titulo','$resposta')";
mysql_query($cadastrando) or die(mysql_error());







echo "
<h1>Adicionar FAQ</h1>
 <p class='msg done'>Pergunta e Resposta adicionada com sucesso.</p>
";
}
}
?>
<? }
include "footer.php";
?>
