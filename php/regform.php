<meta charset="utf-8">
<?php include_once("db_connect.php"); 
//var_dump($_POST);

//isset($_POST['nik'])  
//unset($pass); - удаление 
//empty($_POST['nik']) 
$mynik = $_POST['nik'];
$email = $_POST['e_mail']; 
$pass = $_POST['password'];
$repass =$_POST['f_password'];
$email=$_POST['e_mail'];

$name_f=$_POST['name_f'];
$name_i=$_POST['name_i'];
$name_o=$_POST['name_o'];

$day=$_POST['day'];
$month=$_POST['month'];
$year=$_POST['year'];

$dater="$year.$month.$day"; 
//echo "<br>$dater<br>";

$sex=$_POST['sex'];
$stat=$_POST['state'];
$edu=$_POST['edu'];

$fupload=$_POST['file'];

$mynik = trim($mynik);
$pass = trim($pass);

$mynik = stripcslashes($mynik);
$pass = stripcslashes($pass);

$mynik = htmlspecialchars($mynik);
$pass = htmlspecialchars($pass);



$put = "./images/avatars";
$img = "sample.jpg";

//Проверяем указан ли путь к изображению
if (empty($fupload)) {
	$avatars = $put.'/'.$img;
}
else {
	//$filename = $_FILES['file']['name'];
	//$source = $_FILES['file']['tmp_name'];	
	//$target = $put.$filename;
	//move_uploaded_file($source, $target);//загрузка оригинала в папку $path_to_100
	$avatars = $put.'/'.$fupload;
    //print_r($_FILES); 
}

//echo $pass[5];
//заполнены ли все 4 поля?
if (empty($mynik) || empty($email) || empty($pass) || empty($repass)) {
	echo "<br>Заполните поля,обязательные для ввода (отмечены красным)!<br>";	
}
else {
		//Проверяем на дубли
		$query = "SELECT `login` FROM `users` WHERE `login`= '$mynik'";
		$res = mysql_query($query);

		if ($row = mysql_fetch_array($res)) {
    		echo "Такое имя уже занято. Введите другое<br>";
    	}
		else {
			//Проверяем совпадение ввода паролей
			if ($pass !== $repass) {
				echo "<span style='color:#cc0000;'><br>Пароли не совпадают!</span>";
			} 
				//Проверяем количество символов в пароле
				 else {
           			 if (strlen($pass) < 6) {
            	    echo "Количество символов в пароле меньше 6 символов."; 
          	      		}
						else {

$md5 = md5($pass);
$md5 = $md5."asdff"; //лучше сгенерированный пароль вместо севастополя 
$md5 = strrev($md5);

//репасс 
$repass = md5($repass);
$repass = $repass."asdff"; //"соль"
$repass = strrev($repass);


							
						$err = mysql_query("INSERT INTO users (login,password,email,name_f,name_i,name_o,dater,sex,stat,edu,avatars) VALUES ('$mynik','$md5','$email','$name_f','$name_i','$name_o','$dater','$sex','$stat','$edu','$avatars')");
						//$err = mysql_query("INSERT INTO users (login,password) VALUES ('$mynik','$pass')");
						if ($err == true) {
						//echo "Имя свободно";
						//echo "Пароли совпадают";	
						echo "<span style='color:#006600'>Регистрация завершена. Данные успешно записаны в БД</span>";	
						}		
			}
		}
	}      
}


?>