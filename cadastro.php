<?php
include "config.php";
include "header.php";
echo "<h2>Cadastro</h2><div class='item first'>";
if(!$_POST) {
?>
<script>
function envia(){

var a1 = "="
var a2 = "<"
var a3 = ">"

txt = document.verifica.linkimagempequena.value;
txt1 = document.verifica.linkdaimagem.value;
if (txt.indexOf(a1) != -1 || txt.indexOf(a2) != -1 || txt.indexOf(a3) != -1 || txt1.indexOf(a2) != -1 || txt1.indexOf(a3) != -1 || txt1.indexOf(a3) != -1){
alert("Atenção: Nosso sistema não código aceita HTML, Para inserir o banner, clique com o botão direito do mouse em cima da imagem do seu banner, clique em exibir imagem e pegue o link da imagem - exemplo: http://www.seusite.com/imagem/ban.gif");
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

<form action=cadastro.php method=post  onSubmit="return verificacao()" name="verifica">
<p align="center">Voc&ecirc; está sendo indicado por:
<?
if(!isset($_GET['ind'])){
echo "Ninguém";
}
include "config.php";
$id=$_GET[ind];
$sql = mysql_query("SELECT * FROM ativo WHERE ID='$id'");
$linhas = mysql_num_rows($sql);
if (!$sql){
echo "Ninguém";
}
else {
while ($reg = mysql_fetch_array($sql)){
$nome = $reg['nome'];
echo "$nome";
}
}
mysql_close;
?>
</p>
<table cellspacing="0" cellpadding="0" border="0" align="center" style="width: 600px; height: 121px;">
    <tbody>
        <tr>
            <td width="35%" style="text-align: right;"><b>Seu Nome Completo:</b></td>
            <td>&nbsp;<INPUT maxLength=75 name=nome size=23></td>
        </tr>
        <tr>
            <td style="text-align: right;"><b>Email Pagseguro:</b></td>
            <td>&nbsp;<INPUT maxLength=75 name=emailpagseguro size=23></td>
        </tr>
        <tr>
            <td style="text-align: right;"><b>Email para Contato:</b></td>
            <td>&nbsp;<INPUT maxLength=75 name=email size=23></td>
        </tr>
        <tr>
            <td style="text-align: right;"><b>Sexo:</b></td>
            <td>&nbsp;<INPUT maxLength=30 name=sexo size=23></td>
        </tr>
        <tr>
            <td style="text-align: right;"><b>Estado:</b></td>
            <td>&nbsp;<INPUT maxLength=75 name=estado size=23></td>
        </tr>
        <tr>
            <td style="text-align: right;"><b>Cidade:</b></td>
            <td>&nbsp;<INPUT maxLength=75 name=cidade size=23></td>
        </tr>
        <tr>
            <td style="text-align: right;"><b>Senha:</b></td>
            <td>&nbsp;<INPUT maxLength=55 type=password name=senha size=23></td>
        </tr>

        <tr>
            <td width="50%" style="text-align: right;"><b>Nome do Banco:</b></td>
            <td>&nbsp;<INPUT maxLength=35 name=titulolink size=23></td>
        </tr>
        <tr>
            <td style="text-align: right;"><b>Agencia:</b></td>
            <td>&nbsp;<INPUT maxLength=155 name=linkdolink size=23></td>
        </tr>

        <tr>
            <td width="50%" style="text-align: right;"><b>N° da Conta:</b></td>
            <td>&nbsp;<INPUT maxLength=255 name=linkdosite size=23></td>
        </tr>
        <tr>
            <td style="text-align: right;"><b>Tipo de conta:</b></td>
            <td>&nbsp;<INPUT maxLength=255 name=linkdaimagem size=23></td>
        </tr>
         <tr>
            <td width="50%" style="text-align: right;"><b>Titular:</b></td>
            <td>&nbsp;<INPUT maxLength=155 name=linksitepequeno size=23></td>
        </tr>
        
    </tbody>
</table>
<INPUT type="hidden" name="indicadopor" value="<? echo limpiar($_GET["ind"]); ?>">
<div style="text-align: center;">&nbsp;</div>
<div style="text-align: center;"><span style="font-size: small;"><b>Eu li e concordo com <a href="Termos.php"  target="_blank">Termos</a> do site.</b></span></div>
<div style="text-align: center;"><INPUT name=FormsButton1 type=submit value="CADASTRAR" onClick="return envia()"></div>
<p>&nbsp;</p> </form>





<?
}
else {
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
$saldo = "0.00";
$indicadodireto = "0";
$cliquelink = "0";
$cliquebannerp = "0";
$cliquebanner = "0";
$vis_link = "0";
$vis_bannerp = "0";
$vis_banner = "0";
 $cidade = $_POST["cidade"];

if($nome==NULL|$sexo==NULL|$estado==NULL|$emailpagseguro==NULL|$email==NULL|$senha==NULL|$cidade==NULL) {
echo "<p align='center'><font color='#FF0000'><b>Todos os campos são obrigatórios</b></font></p>
<p align='center'><a href='cadastro.php'>Voltar</a></p>
";
}else
{
$datacadastro = date("d/m/Y");


 $cadastrando = "INSERT INTO pendente (nome, sexo, estado, emailpagseguro, email, titulolink, linkdolink, linkdosite, linkdaimagem, linksitepequeno, linkimagempequena, senha, indicadopor, saldo, indicadodireto, cliquelink, cliquebannerp, cliquebanner, vis_link, vis_bannerp, vis_banner, cidade, datacadastro) VALUES('$nome','$sexo','$estado','$emailpagseguro','$email','$titulolink','$linkdolink','$linkdosite','$linkdaimagem','$linksitepequeno','$linkimagempequena','$senha','$indicadopor','$saldo','$indicadodireto','$cliquelink','$cliquebannerp','$cliquebanner','$vis_link','$vis_bannerp','$vis_banner','$cidade','$datacadastro')";
mysql_query($cadastrando) or die(mysql_error());



$data_venc = date("d/m/Y", time() + (5 * 86400));
$to = $email;
      $subject = "$nome, Seja Bem Vindo(a)!";
      $from = "$webmasteremail";
      $message="
<p><font size='2' face='verdana,geneva' color='#000000'><strong><font color='#993300'>$nome</font>, Seja Bem-Vindo(a) ao $sitename</strong></font></p>
<p align='justify'><font size='2' face='verdana,geneva'>Parab&eacute;ns por cadastrar-se em nosso sistema!</font></p>
<p><font size='2' face='verdana,geneva'>Com satisfa&ccedil;&atilde;o, lhe damos nossas boas vindas ao $sitename! </font></p>
<p align='justify'><font size='2' face='verdana,geneva'>Nosso sistema foi idealizado com o prop&oacute;sito de fazer voc&ecirc; ganhar dinheiro na maneira mais r&aacute;pida!</font></p>
<p align='justify'><font size='2' face='verdana,geneva'>N&atilde;o perca mais tempo! Ative seu cadastro e venha para o time de empreendedores da Web!</font></p>
<font size='2' face='verdana,geneva'>Para se ativar, basta efetuar o pagamento! </font>
<p><font size='2' face='verdana,geneva'>N&atilde;o deixe de participar desta verdadeira revolu&ccedil;&atilde;o no marketing brasileiro! Venha fazer parte de uma equipe de campe&otilde;es!</font></p>
<p><b><font size='2' face='verdana,geneva'>Ative-se!</font></b></p>
<p><font size='2' face='verdana,geneva'>Atenciosamente,</font><br />
<strong><font size='2' face='verdana,geneva'>$sitename<br />
</font></strong><font size='2' face='verdana,geneva'>$siteurl</font></p>
";
    	$header = "From: $sitename <$from>\n";
	$header .="Content-type: text/html; charset=iso-8859-1\n";
	$header .= "Reply-To: <$from>\n";
	$header .= "X-Sender: <$from>\n";
	$header .= "X-Mailer: PHP4\n";
	$header .= "X-Priority: 3\n";
	$header .= "Return-Path: <$from>\n";

      mail($to,$subject,$message,$header);




echo "
<p>&nbsp;</p>
<p style='text-align: center;'><span style='color: rgb(0, 102, 0);'><span style='font-size: large;'><b>PARAB&Eacute;NS PELA DECIS&Atilde;O $nome!</b></span></span></p>
<div style='text-align: center;'><span style='font-size: medium;'>Seu cadastro foi efetuado com sucesso! <br />
</span></div>
<div style='text-align: center;'><span style='font-size: medium;'>Para ativar sua conta, efetue o pagamento.</span></div>
<div style='text-align: center;'><span style='font-size: medium;'>
 <form action='pagar.php' method='post'>
<p align='center'><INPUT type=submit  value='Efetuar Pagamento'></p>
</form>


</span></div>
<div style='text-align: center;'>&nbsp;</div>
<p style='text-align: center;'><span style='color: rgb(51, 153, 102);'><span style='color: rgb(255, 0, 0);'><span style='font-size: larger;'>Adicione o email $webmasteremail em seus contatos para receber o email de ATIVA&Ccedil;&Atilde;O de sua Conta !</span></span></span></p>
";
}
}
include "footer.php";
?>

