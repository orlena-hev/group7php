<?php session_start(); 
include_once("db_connect.php"); 
//var_dump($_POST);
//<meta charset="utf-8">

$login = $_POST['login'];
$pas = $_POST['pas'];
$md5 = md5($pas);

if (empty($login) || empty($pas)) {
}
else {
      //Проверяем есть ли такой Логин в таблице users
      //$query = "SELECT `login`, `password` FROM `users` WHERE `login`= 'ivanov' AND `password` = '3366'";
      $query = "SELECT * FROM `users` WHERE `login`= '$login' AND `password` = '$md5'";
      $res = mysql_query($query);
        if ($row = mysql_fetch_assoc($res)) {
            echo "<br><span style='color:#006600'>Добро пожаловать на сайт!</span><br>"; 
            //echo "Логин: ".$row['login']."<br>\n";
            //echo "Пароль: ".$row['password']."<br>\n";
            //echo "роль: ".$row['role']."<br>\n";
            $_SESSION['login'] = $row['login'];
            $_SESSION['pass'] = $row['password'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['role'] = $row['role'];
        }
        else {
            echo "<br>Проверьте правильность логина и пароля. Или зарегистрируйтесь.<br>";
            echo "$md5";
        }      
}
?>