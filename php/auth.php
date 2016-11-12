<?php //session_start(); 
include_once("db_connect.php"); 

//мини проверка на подбор паролей
$ip = getenv("HTTP_X_FORWARDED_FOR");

if (empty($ip) || $ip == 'unknown') {
  $ip = getenv("REMOTE_ADDR"); //извлекаем айпи
  echo $ip;
  $usercol = mysql_query("SELECT col from ip where ip ='$ip'",$db);
  $userip= mysql_fetch_array($usercol);
  if ($userip['col'] > 2) {
  //если больше двух неудачных попыток ввода, то выводим сообщение
  //подождите 3 минуты
  exit ("подождите 3 минуты и повторите вход");
  }
} 


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
            //если пользователь с введенным логином и паролем не существует то делаем запись
            $select = mysql_query("SELECT * from ip WHERE ip = '$ip'");
            $user_row = mysql_fetch_array($select);
            //проверяем есть ли такой пользователь с таким ip
            if ($ip == $user_row['ip']) {
              //прибавляем одну попытку неудачного входа
              $col = $user_row['col'] + 1; 
              mysql_query("UPDATE ip SET col='$col',date=NOW() WHERE ip ='$ip'");
            }
              else { //записываем нового пользователя
              mysql_query("INSERT ip (ip,date,col) VALUES ('$ip',NOW(),'1')");
            }
        }      
}
?>