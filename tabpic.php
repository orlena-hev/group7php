<!DOCTYPE HTML>
<html>
 <head>
  <meta charset="utf-8">
  <title>Задание Таблица аватарки</title>
 </head>
 <body>
 <?php  
            $db = mysql_connect("localhost","group7","php"); 
            mysql_select_db("phpstart",$db); 
            //Выводим всех пользователей users
            $query = "SELECT * FROM `users` WHERE `id` > '0'";
            $resul = mysql_query($query);
            //echo($query);   
            $pic = $row['avatars'];         

            if($resul)
            {
            // Заголовок таблицы
             
            echo "<table table border='1'>";
            echo "<tr>
                <td>Номер</td>
                <td>Логин</td>
                <td>Фамилия</td>
                <td>Путь к картинке</td>
                <td>Аватарка</td>
                </tr>";

            // Заполняем данными
            while($row = mysql_fetch_array($resul))
                { 
                echo "<tr>
                <td>".$row['id']."&nbsp;</td>
                <td>".$row['login']."&nbsp;</td>
                <td>".$row['name_f']."&nbsp;</td>
                <td>".$row['avatars']."&nbsp;</td>
                <td><img src='/php/".$row['avatars']."' width='100' height='100'/></td>
                </tr>";
            }
            echo "</table>";
            }
?>
 </body>
</html>