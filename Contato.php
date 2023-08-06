<? include ("header.php"); ?>
 <h2>Contato</h2>
      <div class="item first">

<?php
include "config.php";
if(!$_POST) {
?>
<script language="JavaScript">
function verificacao() {
if(document.verifica.name.value=="" || document.verifica.email.value=="" || document.verifica.subject.value=="" || document.verifica.message.value=="") {
window.alert("Preencha todos os campos")
return false;
}
}
</script>

        <p>Use o formulário abaixo para entrar em contato. Sua mensagem será respondida assim que possível, dependendo da quantidade de mensagens recebidas em nosso suporte. </p>
        <!-- begin comments -->
        <div id="comments">
          <div id="respond">
           <form action=Contato.php method=post onSubmit="return verificacao()" name="verifica" id="commentform">
              <p>
                <input type="text" name="name" id="author" value="" size="22" tabindex="1" />
                <label for="author"><small>Digite Seu Nome</small></label>
              </p>
              <p>
                <input type="text" name="email" id="email" value="" size="22" tabindex="2" />
                <label for="email"><small>Seu Email Para Contato</small></label>
              </p>
              <p>
                <input type="text" name="subject" id="url" value="" size="22" tabindex="3" />
                <label for="url"><small>Assunto</small></label>
              </p>
              <p>
                <textarea name="message" id="comment" cols="70" rows="10" tabindex="4"></textarea>
              </p>
              <p>
                <button name="submit" type="submit" id="submit">Enviar</button>
              </p>
            </form>
          </div>
        </div>
        <!-- end comments -->


<?
}
else {
      $to = $webmasteremail;
      $subject = "Contato $sitename ";
      $from = "$webmasteremail";
      $message="<b>Esta mensagem veio do $sitename.</b><br><br>
Nome:".$_POST["name"]."<br>
Email:".$_POST["email"]."<br>
Assunto:".$_POST["subject"]."<br>
Mensagem:".$_POST["message"];
    	$header = "From: $sitename<$from>\n";
	$header .="Content-type: text/html; charset=iso-8859-1\n";
	$header .= "Reply-To: <$from>\n";
	$header .= "X-Sender: <$from>\n";
	$header .= "X-Mailer: PHP4\n";
	$header .= "X-Priority: 3\n";
	$header .= "Return-Path: <$from>\n";

      mail($to,$subject,$message,$header);
echo "
<p align='center'><b><font color='#008000'>Sua mensagem foi enviada com sucesso!</font></b></p>
<BR><BR><BR><BR><BR>";
}
?>

<?php
include "footer.php";
?>
