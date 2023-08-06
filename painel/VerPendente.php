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
$id=$_GET[membro];
$sql = mysql_query("SELECT * FROM pendente where id=$id");
$linhas = mysql_num_rows($sql);
if (!$sql){
echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=index.php'>";
}
else {
while ($reg = mysql_fetch_array($sql)){

?>
<script language="JavaScript">
function verificacao() {
if(document.verifica.nome.value=="" || document.verifica.estado.value=="" || document.verifica.cidade.value==""  || document.verifica.sexo.value==""   || document.verifica.email.value=="" || document.verifica.emailpagseguro.value==""  || document.verifica.linkdosite.value=="" || document.verifica.linkdolink.value=="" || document.verifica.linksitepequeno.value=="") {
window.alert("Preencha todos os campos")
return false;
}
}
</script>
<script language="JavaScript">
function verificacao() {
if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.verifica.email.value))) {
window.alert("Digite um EMAIL válido!!!")
return false;
}
}
</script>
  <script language="JavaScript">
function abrir(URL) {

  var width = 600;
  var height = 600;

  var left = 99;
  var top = 99;

  window.open(URL,'janela', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=yes, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');

}
</script>

<form action="Editando.php?membro=<? echo $reg["id"]; ?>&status=pendente" method=post  onSubmit="return verificacao()" name="verifica">

<h1>Editar Membro</h1>

<table cellspacing="0" cellpadding="0" border="0" align="center" style="width: 100%;">
    <tbody>
        <tr>
            <td width="25%" style="text-align: right;"><b>Nome Completo:</b></td>
            <td>&nbsp;<INPUT maxLength=75 name=nome size=23 value="<? echo $reg["nome"]; ?>"></td>
        </tr>
        <tr>
            <td style="text-align: right;"><b>Email Pagseguro:</b></td>
            <td>&nbsp;<INPUT maxLength=75 name=emailpagseguro size=23 value="<? echo $reg["emailpagseguro"]; ?>"></td>
        </tr>
        <tr>
            <td style="text-align: right;"><b>Email para Contato:</b></td>
            <td>&nbsp;<INPUT maxLength=75 name=email size=23 value="<? echo $reg["email"]; ?>"></td>
        </tr>
        <tr>
            <td style="text-align: right;"><b>Sexo:</b></td>
            <td>&nbsp;<INPUT maxLength=30 name=sexo size=23 value="<? echo $reg["sexo"]; ?>"></td>
        </tr>
        <tr>
            <td style="text-align: right;"><b>Estado:</b></td>
            <td>&nbsp;<INPUT maxLength=75 name=estado size=23 value="<? echo $reg["estado"]; ?>"></td>
        </tr>
        <tr>
            <td style="text-align: right;"><b>Cidade:</b></td>
            <td>&nbsp;<INPUT maxLength=75 name=cidade size=23 value="<? echo $reg["cidade"]; ?>"></td>
        </tr>
        <tr>
            <td style="text-align: right;"><b>Senha:</b></td>
            <td>&nbsp;<INPUT maxLength=55 type=text name=senha size=23 value="<? echo $reg["senha"]; ?>"></td>
        </tr>
        <tr>
            <td width="50%" style="text-align: right;"><b>Banco:</b></td>
            <td>&nbsp;<INPUT maxLength=35 name=titulolink size=23 value="<? echo $reg["titulolink"]; ?>"></td>
        </tr>
        <tr>
            <td style="text-align: right;"><b>Agencia:</b></td>
            <td>&nbsp;<INPUT maxLength=155 name=linkdolink size=23 value="<? echo $reg["linkdolink"]; ?>"></td>
        </tr>
        <tr>
            <td width="50%" style="text-align: right;"><b>N° da Conta:</b></td>
            <td>&nbsp;<INPUT maxLength=155 name=linkdosite size=23 value="<? echo $reg["linkdosite"]; ?>"></td>
        </tr>
        <tr>
            <td style="text-align: right;"><b>Tipo de Conta</b></td>
            <td>&nbsp;<INPUT maxLength=255 name=linkdaimagem size=23 value="<? echo $reg["linkdaimagem"]; ?>"></td>
        </tr>

        <tr>
            <td width="50%" style="text-align: right;"><b>Titular:</b></td>
            <td>&nbsp;<INPUT maxLength=255 name=linksitepequeno size=23 value="<? echo $reg["linksitepequeno"]; ?>"></td>
        </tr>
    </tbody>
</table>
<p class="msg info">Este membro foi indicado pelo ID <input type="text" name="indicadopor" size="20" value="<? echo $reg["indicadopor"]; ?>"></p>

<div style="text-align: center;"><INPUT name=FormsButton1 type=submit class="input-submit"  value="Editar"></div>
<p>&nbsp;</p> </form>
<? }} ?>


<? }
include "footer.php";
?>


