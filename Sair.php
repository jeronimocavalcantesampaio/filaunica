<?
  session_start();
  session_register("id_session");
  session_register("password_session");
  session_register("name_session");


middle();

function middle()
{

?>
<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=index.php'>
<? 
  $_SESSION["id_session"]="";
  $_SESSION["name_session"]="";
  $_SESSION["password_session"]="";
session_unregister('admin_session');
session_unregister('id_session');
session_destroy(); 
?>

<?   return 1;
}

?>
