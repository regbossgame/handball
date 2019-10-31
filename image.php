 <?

$font = Array("res/font3.ttf");	//Путь к шрифту


switch (strtoupper($fileZ)){
case "JPG":
$src = imagecreateFromJPEG($updir0.$finka0);
break;
case "JPEG":
$src = imagecreateFromJPEG($updir0.$finka0);
break;
case "PNG";
$src = imagecreateFromPNG($updir0.$finka0);
break;
case "GIF";
$src = imagecreateFromGIF($updir0.$finka0);
break;
//case "BMP";
//$src = imagecreatefromwbmp($updir0.$finka0);
//break;

default: $src = imagecreateFromJPEG($updir0.$finka0);
}

imageinterlace($src, 1);
$wid = imageSX($src);
$hei = imageSY($src);

$kf=$wid/$hei;



//$let2='ООО "Кран строй"';
//	$let2=iconv('Windows-1251', 'UTF-8', $let2."");


$w=1900;
$limx=$w;
$h=$w/$kf;
$limh=$h;
$limx=1745;$limh=981;$w=$wid;$h=$hei;
if ($wid>$limx){$w=$limx;$h=$w/$kf;}
if ($h>$limh){$w=$w*($limh/$h);$h=$h*($limh/$h);}

if ($hei>$limh){$h=$limh;$w=$h*$kf;}
if ($w>$limx){$w=$w*($limx/$w);$h=$h*($limx/$w);}


if (($w>=$wid)||($h>=$hei)){
$w=$wid;
$h=$hei;
}

	$src2 = imagecreatetruecolor($w,$h);
	imageCopyResized($src2, $src, 0, 0, 0, 0, $w, $h, $wid, $hei);	
	
	
$color = imagecolorallocatealpha($src2,90,90,110,90);
$color2 = imagecolorallocatealpha($src2,190,190,240,80);

/*
$let1="ГК Факел";//$comp_name;
	$let1=iconv('Windows-1251', 'UTF-8', $let1."");

imagettftext($src2,15,0,3,16,$color,$font[0],$let1);
imagettftext($src2,15,0,4,17,$color2,$font[0],$let1);
*/

imageinterlace($src2, 1);

/*$desta = imagecreatetruecolor($limx, $limh);
imagecopy($desta, $src2, 0, 0, ($w-178)/2, ($h-108)/2, $limx, $limh);

imageinterlace($desta, 1);
*/
if (file_exists($foto)){unlink($foto);}
$foto=str_replace (".".$fileZ, ".jpg", $foto);

//imagejpeg($desta,$foto);
imagejpeg($src2,$foto,95);

//echo "|".$foto."|";
//header ("Content-type: image/JPEG"); 

//imageGIF($src2,"img/m".$i."/".$finka0);
//ImageFill($image, 1, 1, $blue);
//ImageGIF($image);
//$srce=$src2;
//ImageDestroy($src2);


//header ("Content-type: image/JPEG"); 		//выводим готовую картинку
//header ("Content-type: image/GIF"); 		//выводим готовую картинку
//header ("Content-type: image/PNG"); 		//выводим готовую картинку

//imagegif($src2);
//imagejpeg($src2); //+
//imagegif($logo_img); //+
//echo "|".$db."|";
?>