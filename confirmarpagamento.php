<? include ("header.php"); ?>
<script language="JavaScript">
function verificacao() {
if(document.form1.nome.value=="" || document.form1.email.value=="" || document.form1.codigo.value=="" || document.form1.Forma_de_Pagamento.value==""
 || document.form1.data.value=="" || document.form1.hora.value=="") {
window.alert("Preencha todos os campos")
return false;
}
}
</script>
<h2>Confirmar Pagamento</h2><div class="item first">

<form name="form1" method="post" enctype="multipart/form-data"  onSubmit="return verificacao()" action="enviado.php">
<p>&nbsp;</p>
<table cellspacing="0" cellpadding="0" border="0" style="width: 100%; height: 155px;">
    <tbody>
        <tr>
            <td valign="top" width="50%" style="text-align: right;"><b>Seu Nome:</b></td>
            <td>&nbsp;<input type="text" name="nome"></td>
        </tr>
        <tr>
            <td valign="top" style="text-align: right;"><b>Email Cadastrado:</b></td>
            <td>&nbsp;<input name="email" type="text" id="de"></td>
        </tr>
        <tr>
            <td valign="top" style="text-align: right;"><b>Email Pagseguro:</b></td>
            <td>&nbsp;<input name="pag" type="text" id="de"></td>
        </tr>
        <tr>
            <td valign="top" style="text-align: right;"><b>Forma de Pagamento:</b></td>
            <td>&nbsp;<input name="Forma_de_Pagamento" type="text" id="de"></td>
            </td>
        </tr>
        <tr>
            <td valign="top" style="text-align: right;"><b>Data do Pagamento:</b></td>
            <td>&nbsp;<input name="data" type="text" id="de"></td></td>
        </tr>
        <tr>
            <td valign="top" style="text-align: right;"><b>Hora:</b></td>
            <td>&nbsp;<input type="text" name="hora"></td>
        </tr>
        <tr>
            <td valign="top" style="text-align: right;"><b>Conprovante Scaneado:</b></td>
            <td>&nbsp;<input type="file" name="anexo"></td>
        </tr>
        <tr>
            <td valign="top" style="text-align: right;"><b>C&oacute;digo Pagseguro:</b></td>
            <td>&nbsp;<input type="text" name="codigo"></td>
        </tr>
        <tr>
            <td valign="top">
            <p style="text-align: right;"><b>Dados do Pagamento:</b></p>
            </td>
            <td><textarea name="msg" cols="50" rows="10"></textarea></td>
        </tr>
    </tbody>
</table>
<input type="hidden" value="<? echo $webmasteremail ?>" name="temail">

  <p align="center"><input type="submit" name="Submit" value="Enviar"> - <input name="reset" type="reset" id="reset" value="Limpar"></p>

</form>

<? include ("footer.php"); ?>

