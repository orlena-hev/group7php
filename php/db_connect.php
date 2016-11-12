<?php
$db = mysql_connect("localhost","group7","php"); // or die ("Нет подключения к серверу!");
//$db = mysql_connect('127.0.0.1:801','root',''); // or die ("Нет подключения к серверу!");

if (mysqli_connect_errno()) {
   echo "не подключились к серверу MySQL: " . mysqli_connect_error();
 	}
else {
  //echo "подключились";
}

mysql_select_db("phpstart",$db); // or die ("Невозможно выбрать БД");
//mysql_query("SET NAMES utf8") or die ("Не установлена кодировка");
?>