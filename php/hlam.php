<?php            
            //Выводим всех пользователей users
            $query = "SELECT * FROM `users` WHERE `id` > '0' ORDER BY `name_f`";
            $resul = mysql_query($query);
            //echo($query);            

            if($resul)
            {
            // Заголовок таблицы
             
            echo "<table border=1>";
            echo "<tr>
                <td>Пустое поле</td>
                <td>Номер</td>
                <td>Логин</td>
                <td>Емаил</td>
                <td>Фамилия</td>
                <td>Имя</td>
                <td>Отчество</td>
                <td>Дата рождени</td>
                <td>Пол</td>
                <td>Город</td>
                <td>Образование</td>
                </tr>";
            // Заполняем данными
            while($row = mysql_fetch_array($resul))
            {
                echo "<tr>
                <td>#</td>
                <td>".$row['id']."&nbsp;</td>
                <td>".$row['login']."&nbsp;</td>
                <td>".$row['email']."&nbsp;</td>
                <td>".$row['name_f']."&nbsp;</td>
                <td>".$row['name_i']."&nbsp;</td>
                <td>".$row['name_o']."&nbsp;</td>
                <td>".$row['dater']."&nbsp;</td>
                <td>".$row['sex']."&nbsp;</td>
                <td>".$row['stat']."&nbsp;</td>
                <td>".$row['edu']."&nbsp;</td>
                </tr>";
            }
            echo "</table>";
            }



//<?php
//$avatars = $_POST['avatars'];
//if empty ($avatars)

<form name="upload" action="#" method="POST" ENCTYPE="multipart/form-data">
 Выберите изображение: <input type="Добавить изображение" name="avatars">
 <input type="submit" name="upload" value="upload">
</form>

?>        


   
 