<? include "config.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="cs" lang="cs">
<head>
<title><? echo $sitename ?></title>
<meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="./css/default.css" media="screen" />
<!--[if IE 6]><link rel="stylesheet" type="text/css" href="css/msie.css" /><![endif]-->
<link rel="stylesheet" type="text/css" href="./css/print.css" media="print" />
</head>
<body>

<?php include('funciones.php');
$elref=limpiar($_GET["ind"]);
?>
<ul class="noscreen">
  <li><a href="#content"> </a></li>
  <li><a href="#mainMenu"> </a></li>
</ul>
<hr class="hidden" />
<div id="view">
  <div id="head">
    <h1 id="logotype"><? echo $sitename ?></h1>
    <form action="MinhaConta.php" method="post" id="searchForm">
      <fieldset>
      <legend class="hidden">Minha Conta</legend>
<input type="submit" value="Minha Conta" class="submit" />
      </fieldset>
    </form>
  </div>
  <hr class="hidden" />
  <div id="content">

    <div id="contentBlock">

<?
include "config.php";
$pat=$_GET[ind];
$sqlx9x = mysql_query("SELECT * FROM ativo WHERE id=$pat");
if (!$sqlx9x){
echo "";
}
else {
while ($regx9x = mysql_fetch_array($sqlx9x)){
$nomexxx = $regx9x['nome'];

echo "<div align='center'><b><i>Página Pessoal do Membro $nomexxx</i></b></div>";
}
}
mysql_close;
?>

