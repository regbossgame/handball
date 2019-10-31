<?
session_start();
$width = 110;				//Ширина изображения
$height = 50;				//Высота изображения
$font_size = 14;   			//Размер шрифта
$let_amount = 4;			//Количество символов, которые нужно набрать
$fon_let_amount = 120;		//Количество символов на фоне
$font = "res/font3.ttf";	//Путь к шрифту

//набор символов
$letters = array("1","2","3","4","5","6","7","8","9","2","5","7","4","4","4","2","5","4","7");
$letters2 = array("*",".","/","*","&","@","@","!","#","#","^","%","$","$",".",",",".",",",".",">","<","k","x","+","*","}{");

//цвета
$colors = array("41","78","82","63","54","30","15","37");	
 
$src = imagecreatetruecolor($width,$height);	//создаем изображение				
$fon = imagecolorallocate($src,255,255,255);	//создаем фон
imagefill($src,0,0,$fon);						//заливаем изображение фоном
 
for($i=0;$i < $fon_let_amount;$i++)			//добавляем на фон буковки
{
	//случайный цвет
   	$color = imagecolorallocatealpha($src,rand(100,185),rand(100,185),rand(90,125),rand(60,99));	
   	//случайный символ
   	$letter = $letters2[rand(0,sizeof($letters2)-1)];	
	//случайный размер								
   	$size = rand($font_size/2.1,$font_size*1.7);											
   	imagettftext($src,$size,rand(0,360),
	   	rand(-5,$width),
		rand(-5,$height),$color,$font,$letter);
}
 
for($i=0;$i < $let_amount;$i++)		//то же самое для основных букв
{
   $color = imagecolorallocatealpha($src,$colors[rand(0,sizeof($colors)-1)],
   		$colors[rand(0,sizeof($colors)-1)],
   		$colors[rand(0,sizeof($colors)-1)],rand(38,62)); 
   $letter = $letters[rand(0,sizeof($letters)-1)];
   $size = rand($font_size*2-2,$font_size*2+2);
   $x = ($i*1.6+1)*$font_size+rand(1,6)-8;		//даем каждому символу случайное смещение
   $y = (($height*2)/3) + rand(0,8);							
   $cod[] = $letter;   						//запоминаем код
   imagettftext($src,$size,rand(-7,8),$x,$y,$color,$font,$letter);
}
 
$cod = implode("",$cod);					//переводим код в строку
$_SESSION["ff"]=$cod;
header ("Content-type: image/png"); 		//выводим готовую картинку
imagepng($src); 
?>