<? include ("header.php"); ?>
<h2>Confirmar Pagamento</h2>
      <div class="item first">

<? include ("config.php");
$mime_list = array(   "html"=>"text/html",
                     "htm"=>"text/html",
         "txt"=>"text/plain",
         "rtf"=>"text/enriched",
         "csv"=>"text/tab-separated-values",
         "css"=>"text/css",
         "gif"=>"image/gif",
      "doc"=>"application/msword",
      "jpeg"=>"image/jpeg",
      "jpg"=>"image/jpeg",
      "jpe"=>"image/jpeg",
      "exe"=>"application/octet-stream",
      "mid"=>"audio/midi",
      "midi"=>"audio/midi",
      "mov"=>"video/quicktime",
      "movie"=>"video/x-sgi-movie",
      "mp3"=>"audio/mpeg",
      "mpeg"=>"video/mpeg",
      "mpg"=>"video/mpeg",
      "mpga"=>"video/mpeg",
      "png"=>"image/png",
      "pps"=>"application/mspowerpoint",
      "ppt"=>"application/mspowerpoint",
      "ppz"=>"application/mspowerpoint",
      "qt"=>"video/quicktime",
      "ra"=>"audio/x-realaudio",
      "rgb"=>"image/x-rgb",
      "tif"=>"image/tiff",
      "tiff"=>"image/tiff",
      "wav"=>"audio/x-wav",
      "swf"=>"application/x-shockwave-flash",
      "zip"=>"application/zip",
      );


$ABORT = FALSE;

$boundary = "XYZ-" . date(dmyhms) . "-ZYX";

$message = "--$boundary\n";
$message .= "Content-Transfer-Encoding: 8bits\n";
$message .= "Content-Type: text/html; charset=\"ISO-8859-1\"\n\n";
$message .= "Enviado em ". date("d/m/Y"). "<P>Confira os dados de Pagamento:<P>

Nome: " .$_POST['nome']. "<BR>
Email cadastrado: " .$_POST['email']. "<BR>
Email Pagseguro: " .$_POST['pag']. "<BR>
Forma de Pagamento: " .$_POST['Forma_de_Pagamento']. "<BR>
Data do Pagamento: " .$_POST['data']. "<BR>
Hora: " .$_POST['hora']. "<BR>
Email Pagseguro: " .$_POST['pag']. "<BR>
Codigo Pagseguro: " .$_POST['codigo']. "<BR>

<b>Dados</b>:<BR>"
   .nl2br($_POST['msg']). "<P>";
$message .= "\n";

$attachments[1] = $anexo;

foreach ($attachments as $key => $full_path) {
if ($full_path !='') {
     if (file_exists($full_path)){
           if ($fp = fopen($full_path,"rb")) {
  if ((filesize($full_path)/1024) > "3000"){
                   echo "O arquivo que você tentou anexar, possui mais que 3MB. Por favor, tente um arquivo menor.";
                   exit;
}
                   $filename = array_pop(explode(chr(92),$full_path));
                   $contents = fread($fp,filesize($full_path));
                   $encoded = base64_encode($contents);
                   $encoded_split = chunk_split($encoded);
                   fclose($fp);
                   $message .= "--$boundary\n";
                   $message .= "Content-Type: $anexo_type\n";
                   $message .= "Content-Disposition: attachment; filename=\"$anexo_name\" \n";
                   $message .= "Content-Transfer-Encoding: base64\n\n";
                   $message .= "$encoded_split\n";
           }
           else {
           echo "Impossível abrir o arquivo$key: $filename";
           $ABORT = TRUE;
           }
     }
     else {
     echo "O arquivo$key não existe: $filename";
     $ABORT = TRUE;
     }

}
}
$assunto  = "Comfirmação de Pagamento $sitename";
$message .= "--$boundary--\r\n";


$headers  = "MIME-Version: 1.0\r\n";
$headers .= "From: $sitename <$webmasteremail>\r\n";
$headers .= "Content-type: multipart/mixed; boundary=\"$boundary\" charset=iso-8859-1\r\n";
$mensagem = mail($_POST['temail'], $assunto, $message, $headers);

if ($mensagem) {

  print "
<p style='text-align: center;'><span style='color: rgb(204, 0, 0);'><b>Confirma&ccedil;&atilde;o Pagamento enviada com sucesso!</b></span></p>
<p style='text-align: center;'>No prazo m&aacute;ximo 48hs &uacute;teis, exceto s&aacute;bados, domingos e feriados (dias &Uacute;teis) <b>SUA CONFIRMA&Ccedil;&Atilde;O DE PAGAMENTO SER&Aacute; ANALISADA E CONFIRMADA</b> Junto &aacute; institui&ccedil;&atilde;o Financeira, n&atilde;o se preocupe, ser&aacute; por ordem de Confirma&ccedil;&atilde;o. N&atilde;o fa&ccedil;a DUAS confirma&ccedil;&otilde;es Pois ir&aacute; Cancelar a confirma&ccedil;&atilde;o anterior.</p>
<p style='text-align: center;'>&nbsp;</p>
<p style='text-align: center;'>&nbsp;</p>
<p style='text-align: center;'>&nbsp;</p>
  ";
  
} else {
  print "O envio da mensagem falhou!";
}


?>
<? include ("footer.php"); ?>
