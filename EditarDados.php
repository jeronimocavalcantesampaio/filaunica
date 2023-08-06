<?php
  session_start();
  session_register("id_session");
  session_register("password_session");
  include "header.php";

  $id=$_SESSION["id_session"];
  $password=$_SESSION["password_session"];
if ($id=="" && $password=="")
{

?>
<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=MinhaConta.php'>
<? }
  else
{

if(!$_POST)
{
?>
<? include ("menu.php"); ?>
<?
include "config.php";
$id=$_SESSION["id_session"];
$sql = mysql_query("SELECT * FROM ativo where id=$id");
$linhas = mysql_num_rows($sql);
if (!$sql){
echo "Nenhum Dados";
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

<p style="text-align: center;"><span style="color: rgb(204, 0, 0);"><b><span style="font-size: medium;">Editar meus Dados</span></b></span></p>
<form action="EditarDados.php" method=post  onSubmit="return verificacao()" name="verifica">


<table cellspacing="0" cellpadding="0" border="0" align="center" style="width: 100%;">
    <tbody>
        <tr>
            <td width="35%" style="text-align: right;"><b>Nome Completo:</b></td>
            <td>&nbsp;<INPUT maxLength=75 name=nome size=23 value="<? echo $reg["nome"]; ?>"></td>
        </tr>
        <tr>
            <td style="text-align: right;"><b>Email Pagseguro:</b></td>
            <td>&nbsp;<INPUT maxLength=75 name=emailpagseguro size=23 value="<? echo $reg["emailpagseguro"]; ?>"></td>
        </tr>
        <tr>
            <td style="text-align: right;"><b>Email para Contato:</b></td>
            <td>&nbsp;<? echo $reg["email"]; ?><INPUT maxLength=75  type="hidden" name=email size=23 value="<? echo $reg["email"]; ?>"></td>
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
            <td style="text-align: right;"><b>Agencia::</b></td>
            <td>&nbsp;<INPUT maxLength=155 name=linkdolink size=23 value="<? echo $reg["linkdolink"]; ?>"></td>
        </tr>

        <tr>
            <td width="50%" style="text-align: right;"><b>N° da Conta:</b></td>
            <td>&nbsp;<INPUT maxLength=255 name=linkdosite size=23 value="<? echo $reg["linkdosite"]; ?>"></td>
        </tr>
        <tr>
            <td style="text-align: right;"><b>Tipo de conta:</b></td>
            <td>&nbsp;<INPUT maxLength=255 name=linkdaimagem size=23 value="<? echo $reg["linkdaimagem"]; ?>"></td>
        </tr>
                <tr>
            <td width="50%" style="text-align: right;"><b>Titular:</b></td>
            <td>&nbsp;<INPUT maxLength=155 name=linksitepequeno size=23 value="<? echo $reg["linksitepequeno"]; ?>"></td>
        </tr>

    </tbody>
</table>
<p align="center"><INPUT name=FormsButton1 class="input-submit" type=submit value="Salvar"></p>

</form>




<?
}
}
mysql_close;
?>

<? }
else
{
$id=$_SESSION["id_session"];
$nome = $_POST["nome"];
 $sexo = $_POST["sexo"];
 $estado = $_POST["estado"];
 $emailpagseguro = $_POST["emailpagseguro"];
 $email = $_POST["email"];
$titulolink = $_POST["titulolink"];
$linkdolink = $_POST["linkdolink"];
$linkdosite = $_POST["linkdosite"];
$linkdaimagem = $_POST["linkdaimagem"];
$linksitepequeno = $_POST["linksitepequeno"];
$linkimagempequena = $_POST["linkimagempequena"];
 $senha = $_POST["senha"];
$indicadopor = $_POST["indicadopor"];
 $cidade = $_POST["cidade"];






include "config.php";
$queryb = "UPDATE ativo SET nome='$nome', sexo='$sexo', estado='$estado', emailpagseguro='$emailpagseguro', email='$email', titulolink='$titulolink', linkdolink='$linkdolink', linkdosite='$linkdosite', linkdaimagem='$linkdaimagem', linksitepequeno='$linksitepequeno', linkimagempequena='$linkimagempequena', senha='$senha', indicadopor='$indicadopor', cidade='$cidade' WHERE id='$id'";
mysql_query($queryb) or die(mysql_error());

include "menu.php";
echo "
<script>alert('Dados editado com Sucesso!')</script>
<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=Sair.php'>";

};
?>
<br><br>

<?
}
?>

<? include "footer.php"; ?>
