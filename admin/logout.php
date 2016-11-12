<?php
session_start();
if (empty($_SESSION['login']) or empty($_SESSION['pass'])) 
{
 var_dump($_SESSION['login']);
 exit("<html><head><meta http-equiv='Refresh' content='0; URL=../index.php'></head></html>");
}
   
unset($_SESSION['login']);
unset($_SESSION['pass']);
unset($_SESSION['role']);

echo '<meta http-equiv="refresh" content="0;URL=http://phpstart.com:90/">';
?>