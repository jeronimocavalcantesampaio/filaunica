<?php
// configure seu banco de dados
$dbhost="localhost";
$dbname="mermil_filauni";
$dbuser="mermil_filauni";
$dbpass="filauni";

//não edite daqui para baixo
  $dbconnect=mysql_connect($dbhost,$dbuser,$dbpass);
  mysql_select_db($dbname);

$rs=mysql_query("select * from adminsettings");
if(mysql_num_rows($rs)>0) {
$arr=mysql_fetch_array($rs);
$sitename=$arr[0];
$siteurl=$arr[1];
$webmasteremail=$arr[2];
$adminpass=$arr[3];

$alertpay=$arr[4];

$fee=$arr[7];

$levels=$arr[8];

$level1=$arr[9];
$level2=$arr[10];
$level3=$arr[11];
$level4=$arr[12];
$level5=$arr[13];
$level6=$arr[14];
$level7=$arr[15];
$level8=$arr[16];
$level9=$arr[17];
$level10=$arr[18];

$forcedmatrix=$arr[19];
$membershipperiod=$arr[20];
$signupbonus=$arr[21];
}
?>

