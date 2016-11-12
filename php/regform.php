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

$mynik = trim($mynik);
$pass = trim($pass);

$mynik = stripcslashes($mynik);
$pass = stripcslashes($pass);

$mynik = htmlspecialchars($mynik);
$pass = htmlspecialchars($pass);

//$fupload=$_FILES['file']['name'];

$fupload=$_POST['file']; 
echo $fupload;

$put = "avatars/";
$img = "sample.jpg";
$none = "avatars/sample.jpg";

//Проверяем указан ли путь к изображению
if (!empty($_FILES)) {
	$filename = $_FILES['file']['name'];
	$source = $_FILES['file']['tmp_name'];	
	$target = $put.$filename;
	move_uploaded_file($source, $target); //загрузка оригинала в папку $path_to_100
	$avatars = $put.$fupload;
}
else {
	$avatars = $none;	
}



/*
$put = "avatars/";
$img = "sample.jpg";


if (!empty($_POST['fupload'])) //проверяем, отправил ли пользователь изображение
{
$fupload=$_POST['fupload']; 
$fupload = trim($fupload); 
  if ($fupload =='' or empty($fupload)) {
                     unset($fupload);// если переменная $fupload пуста, то удаляем ее
					 }
}

if (!isset($fupload) or empty($fupload) or $fupload =='')
{
//если переменной не существует (пользователь не отправил изображение),то присваиваем ему заранее приготовленную картинку с надписью "нет аватара"
$avatars = "avatars/sample.jpg"; 
}
else {
	$filename = $_FILES['fupload']['name'];
	$source = $_FILES['fupload']['tmp_name'];	
	$target = $path_to_100.$filename;
	move_uploaded_file($source, $target);//загрузка оригинала в папку $path_to_100
}
*/

/*
else 
{
//иначе - загружаем изображение пользователя
$path_to_100 = 'avatars/';//папка, куда будет загружаться начальная картинка и ее сжатая копия

	
if(preg_match('/[.](JPG)|(jpg)|(gif)|(GIF)|(png)|(PNG)$/',$_FILES['file']['name']))//проверка формата исходного изображения
	 {	
	 	 	
		$filename = $_FILES['file']['name'];
		$source = $_FILES['file']['tmp_name'];	
		$target = $path_to_100.$filename;
		move_uploaded_file($source, $target);//загрузка оригинала в папку $path_to_100

	if(preg_match('/[.](GIF)|(gif)$/', $filename)) {
	$im = imagecreatefromgif($path_to_100.$filename) ; //если оригинал был в формате gif, то создаем изображение в этом же формате. Необходимо для последующего сжатия
	}
	if(preg_match('/[.](PNG)|(png)$/', $filename)) {
	$im = imagecreatefrompng($path_to_100.$filename) ;//если оригинал был в формате png, то создаем изображение в этом же формате. Необходимо для последующего сжатия
	}
	
	if(preg_match('/[.](JPG)|(jpg)|(jpeg)|(JPEG)$/', $filename)) {
		$im = imagecreatefromjpeg($path_to_100.$filename); //если оригинал был в формате jpg, то создаем изображение в этом же формате. Необходимо для последующего сжатия
	}
	
//СОЗДАНИЕ КВАДРАТНОГО ИЗОБРАЖЕНИЯ И ЕГО ПОСЛЕДУЮЩЕЕ СЖАТИЕ ВЗЯТО С САЙТА www.codenet.ru

// Создание квадрата 90x90
// dest - результирующее изображение 
// w - ширина изображения 
// ratio - коэффициент пропорциональности 

$w = 100;  // квадратная 100x100. Можно поставить и другой размер.

// создаём исходное изображение на основе 
// исходного файла и определяем его размеры 
$w_src = imagesx($im); //вычисляем ширину
$h_src = imagesy($im); //вычисляем высоту изображения

         // создаём пустую квадратную картинку 
         // важно именно truecolor!, иначе будем иметь 8-битный результат 
         $dest = imagecreatetruecolor($w,$w); 

         // вырезаем квадратную серединку по x, если фото горизонтальное 
         if ($w_src>$h_src) 
         imagecopyresampled($dest, $im, 0, 0,
                          round((max($w_src,$h_src)-min($w_src,$h_src))/2),
                          0, $w, $w, min($w_src,$h_src), min($w_src,$h_src)); 

         // вырезаем квадратную верхушку по y, 
         // если фото вертикальное (хотя можно тоже серединку) 
         if ($w_src<$h_src) 
         imagecopyresampled($dest, $im, 0, 0, 0, 0, $w, $w,
                          min($w_src,$h_src), min($w_src,$h_src)); 

         // квадратная картинка масштабируется без вырезок 
         if ($w_src==$h_src) 
         imagecopyresampled($dest, $im, 0, 0, 0, 0, $w, $w, $w_src, $w_src); 
		 

$date=time(); //вычисляем время в настоящий момент.
imagejpeg($dest, $path_to_100.$date.".jpg");//сохраняем изображение формата jpg в нужную папку, именем будет текущее время. Сделано, чтобы у аватаров не было одинаковых имен.

$avatars = $path_to_100.$date.".jpg";//заносим в переменную путь до аватара.

$delfull = $path_to_100.$filename; 
unlink ($delfull);//удаляем оригинал загруженного изображения, он нам больше не нужен. Задачей было - получить миниатюру.
}
else 
         {
		 //в случае несоответствия формата, выдаем соответствующее сообщение
         exit ("Аватар должен быть в формате <strong>JPG,GIF или PNG</strong>");
	     }
//конец процесса загрузки и присвоения переменной $avatar адреса загруженной авы
}
*/

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