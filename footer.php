<? include "config.php"; ?>

  <script language="JavaScript">
function abrir(URL) {

  var width = 600;
  var height = 600;

  var left = 99;
  var top = 99;

  window.open(URL,'janela', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=yes, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');

}
</script>

      </div>
      <div class="item">

        <div class="in">
       </div>
      </div>
      <div class="item last">


        <div class="in">
        </div>
      </div>
    </div>
    <hr class="hidden" />
    <div id="rightBlock">
      <div class="box submenu">
        <h3 class="subheader">Opções</h3>
        <div class="in">
          <ul>
            <li><a href="pagar.php?ind=<? echo limpiar($_GET["ind"]); ?>">Efetuar Pagamento</a></li>
            <li><a href="confirmarpagamento.php?ind=<? echo limpiar($_GET["ind"]); ?>">Confirmar Pagamento</a></li>
             <li><a href="vantagens.php?ind=<? echo limpiar($_GET["ind"]); ?>">Mais Vantagens</a></li>
             <li><a href="Termos.php?ind=<? echo limpiar($_GET["ind"]); ?>">Termos do Site</a></li>
            <li><strong>Oportunidades</strong></li>

<?
include "config.php";

$sqlx9 = mysql_query("SELECT * FROM links ORDER BY id DESC");
$linhasx9 = mysql_num_rows($sqlx9);
if (!$sqlx9){
echo "Nenhum Conteudo";
}
else {
while ($regx9 = mysql_fetch_array($sqlx9)){
$titulo = $regx9['titulo'];
$link = $regx9['link'];

echo "<li><a href='$link' target='_blank'>$titulo</a></li>";
}
}
mysql_close;
?>



<li><strong>Últimos Cadastros</strong></li>

 <li>  <table border="1" width="100%">
<tr>
  <td>
 <MARQUEE  onmouseover="this.stop()" onmouseout="this.start()" scrollAmount=2 direction=up width=100% height=100>
<?
include "config.php";

$sqlk = mysql_query("SELECT * FROM pendente ORDER BY id DESC LIMIT 15");
$linhask = mysql_num_rows($sqlk);
if (!$sqlk){
echo "Nenhum Membro";
}
else {
while ($regk = mysql_fetch_array($sqlk)){
$nome = $regk['nome'];
$estado = $regk['estado'];

echo "
$nome / <b>$estado</b> <br>
";
}
}
mysql_close;
?>
<MARQUEE>
</td>
</tr>
</table>





<li><strong>Últimos Ganhadores</strong></li>

 <li>  <table border="1" width="100%">
<tr>
  <td>
 <MARQUEE  onmouseover="this.stop()" onmouseout="this.start()" scrollAmount=2 direction=up width=100% height=100>
<?
include "config.php";

$sqlw = mysql_query("SELECT * FROM ganhadores ORDER BY id DESC LIMIT 5");
$linhasw = mysql_num_rows($sqlw);
if (!$sqlw){
echo "Nenhum Membro";
}
else {
while ($regw = mysql_fetch_array($sqlw)){
$nome = $regw['nome'];
$estado = $regw['estado'];

echo "
$nome / <b>$estado</b>
";
}
}
mysql_close;
?>
<MARQUEE>
</td>
</tr>
</table>








          </ul>
        </div>
      </div>
      <div class="box contact">


      </div>
      <div class="box rss">

      </div>
    </div>
  </div>
  <hr class="hidden noprint" />
  <div id="menu">
    <ul id="mainMenu">

      <li><a href="index.php?ind=<? echo limpiar($_GET["ind"]); ?>">Home</a></li>
      <li><a href="como_funciona.php?ind=<? echo limpiar($_GET["ind"]); ?>">Como Funciona</a></li>
      <li><a href="produto.php?ind=<? echo limpiar($_GET["ind"]); ?>">Produto</a></li>
      <li><a href="Duvidas.php?ind=<? echo limpiar($_GET["ind"]); ?>">FAQ</a></li>
      <li><a href="cadastro.php?ind=<? echo limpiar($_GET["ind"]); ?>">Cadastro</a></li>
       <li><a href="Contato.php?ind=<? echo limpiar($_GET["ind"]); ?>">Contato</a></li>

    </ul>

  </div>
  <hr class="hidden noprint" />
  <div id="foot">
    <ul class="support">

      <li class="hotmix"></li>

    </ul>

    <p  align="center">&nbsp;Copyright <? echo $sitename ?> - Todos os Direitos Reservados</p>
    <p  align="center">Desenvolvido por <a href="http://www.mercadomil.com.br/" target="_blank">mercado mil</a></p>
  </div>
</div>
</body>
</html>
