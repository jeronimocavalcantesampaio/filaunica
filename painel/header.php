<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Administração Fila-Única</title>
<meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />
<link rel="stylesheet" media="screen,projection" type="text/css" href="css/reset.css" />
<link rel="stylesheet" media="screen,projection" type="text/css" href="css/main.css" />
<link rel="stylesheet" media="screen,projection" type="text/css" href="css/2col.css" title="2col" />
<link rel="alternate stylesheet" media="screen,projection" type="text/css" href="css/1col.css" title="1col" />
<!--[if lte IE 6]><link rel="stylesheet" media="screen,projection" type="text/css" href="css/main-ie6.css" /><![endif]-->
<link rel="stylesheet" media="screen,projection" type="text/css" href="css/style.css" />
<link rel="stylesheet" media="screen,projection" type="text/css" href="css/mystyle.css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/switcher.js"></script>
<script type="text/javascript" src="js/toggle.js"></script>
<script type="text/javascript" src="js/ui.core.js"></script>
<script type="text/javascript" src="js/ui.tabs.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$(".tabs > ul").tabs();
	});
	</script>
</head>
<body>
<div id="main">
  <!-- Tray -->
  <div id="tray" class="box">
    <p class="f-left box">
      <!-- Switcher -->
      <span class="f-left" id="switcher"> <a href="javascript:void(0);" rel="1col" class="styleswitch ico-col1" title="Display one column"><img src="design/switcher-1col.gif" alt="1 Column" /></a> <a href="javascript:void(0)" rel="2col" class="styleswitch ico-col2" title="Display two columns"><img src="design/switcher-2col.gif" alt="" /></a> </span> Seja Bem Vindo(a) <strong>Admin!</strong> </p>
    <p class="f-right">

    Data: <strong><a href="#"> <? $dataagora = date("d/m/Y"); echo "$dataagora"; ?></a></strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong><a href="sair.php" id="logout">Sair</a></strong></p>
  </div>
  <!--  /tray -->
  <hr class="noscreen" />
  <!-- Menu -->
  <div id="menu" class="box">
    <ul class="box f-right">
      <li><a href="../" target="_blank"><span><strong>Página Inicial do Site &raquo;</strong></span></a></li>
    </ul>
    <ul class="box">
      <li id="menu-active"><a href="home.php"><span>Início</span></a></li>
      <!-- Active -->
      <li><a href="ativos.php"><span>Membros Ativos</span></a></li>
      <li><a href="painel.php"><span>Membros Pendentes</span></a></li>
      <li><a href="Ganhadores.php"><span>Ganhadores</span></a></li>
      <li><a href="Emails.php"><span>Ver Emails</span></a></li>
      <li><a href="comissoes.php"><span>Comissões</span></a></li>
      <li><a href="admin.php?b=3"><span>Newsletter</span></a></li>
      <li><a href="EditarAdmin.php"><span>Configurações</span></a></li>
    </ul>
  </div>
  <!-- /header -->
  <hr class="noscreen" />
  <!-- Columns -->
  <div id="cols" class="box">
    <!-- Aside (Left Column) -->
    <div id="aside" class="box">
      <div class="padding box">
        <!-- Logo (Max. width = 200px) -->
        <p id="logo"><a href="http://www.marketing-brasil.com" target="_blank"><img src="http://www.anderlan.com.br/imagens_sites/logoMB.gif" alt="" /></a></p>
        <!-- Search -->

          <div id="search-options" style="display:none;">

          </div>

        </form>
        <!-- Create a new project -->
        <p id="btn-create" class="box"><a href="colocar_link2.php"><span>Add Link Lateral</span></a></p>
      </div>
      <!-- /padding -->
      <ul class="box">
        <li><a href="excluir_link2.php"><b>Remover Link Lateral</b></a></li>
        <li><a href="colocar_faq.php">FAQ - Add Pergunta</a></li>
        <li><a href="excluir_faq.php">FAQ - Remover Pergunta</a></li>
        <li><a href="pagina_comof.php">Página Como Funciona</a></li>
        <li><a href="pagina_home.php">Página INICIAL</a></li>
        <li><a href="pagina_pagar.php">Página Efetuar Pag.</a></li>
        <li><a href="pagina_vant.php">Página Vantagens.</a></li>
        <li><a href="pagina_pro.php">Página Produto.</a></li>
        <li><a href="pagina_to.php">Página Termos.</a></li>
        <li><a href="colocar_link.php">Add Downloads</a></li>
            <li><a href="excluir_link.php">Remover Downloads</a></li>
             <li><a href="colocar_link3.php">ADD Banners</a></li>
             <li><a href="excluir_link3.php">Remover Banners</a></li>
      </ul>
    </div>
    <!-- /aside -->
    <hr class="noscreen" />
    <!-- Content (Right Column) -->
    <div id="content" class="box">
