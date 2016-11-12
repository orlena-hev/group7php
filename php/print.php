<?php 

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
$avatar = "images/avatars/sample.jpg"; 
}
else 
{
//иначе - загружаем изображение пользователя
$path_to_100 = 'images/avatars/';//папка, куда будет загружаться начальная картинка и ее сжатая копия

if(preg_match('/[.](JPG)|(jpg)|(gif)|(GIF)|(png)|(PNG)$/',$_FILES['fupload']['name']))//проверка формата исходного изображения
	 {	
	 	 	
		$filename = $_FILES['fupload']['name'];
		$source = $_FILES['fupload']['tmp_name'];	
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

$avatar = $path_to_100.$date.".jpg";//заносим в переменную путь до аватара.

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
    print_r($_FILES); 
?>