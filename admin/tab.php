<?php 
        //Выводим всех пользователей users
        $query = "SELECT * FROM `users` WHERE `id` > '0'";
        $resul = mysql_query($query);

        if($resul)
        {
             // Заголовок таблицы
            echo '<table>';   
            echo '<thead>';
            echo '<tr>
                <th scope="col" class="rounded-company"></th>
                <th scope="col" class="rounded">Логин</th>
                <th scope="col" class="rounded">Емаил</th>
                <th scope="col" class="rounded">Фамилия</th>
                <th scope="col" class="rounded">Имя</th>
                <th scope="col" class="rounded">Отчество</th>
                <th scope="col" class="rounded">Дата</th>
                <th scope="col" class="rounded">Пол</th>
                <th scope="col" class="rounded">Город</th>
                <th scope="col" class="rounded">Образование</th>
                <th scope="col" class="rounded">Edit</th>
                <th scope="col" class="rounded-q4">Delete</th>
                </tr>';
            echo '</thead>';        
            echo '<tbody>';     
            // Заполняем данными
            while($row = mysql_fetch_array($resul))
            {
                echo '<tr>
                <td>#</td>
                <td>'.$row['id'].'&nbsp;</td>
                <td>'.$row['login'].'&nbsp;</td>
                <td>'.$row['email'].'&nbsp;</td>
                <td>'.$row['name_f'].'&nbsp;</td>
                <td>'.$row['name_i'].'&nbsp;</td>
                <td>'.$row['name_o'].'&nbsp;</td>
                <td>'.$row['dater'].'&nbsp;</td>
                <td>'.$row['sex'].'&nbsp;</td>
                <td>'.$row['stat'].'&nbsp;</td>
                <td>'.$row['edu'].'&nbsp;</td>
                <td>Редактирование</td>
                <td>Удаление</td>
                </tr>';
            }   
        } 
            echo '</tbody>';
            echo '</table>';   
?> 