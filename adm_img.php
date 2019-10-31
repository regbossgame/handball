<?
include "cook_life.php";

include "conf.php";

include "fire.php";
if ($ok==1){


if ((isset($_SESSION["log"]))&&($_SESSION['adm']>0)){

echo "<a href='admin.php'>в админку</a>\n";

$modif=$_GET['bd'];
if ($_GET['bd']=='imgs'){
	echo "<h2>Общие картинки сайта</h2>\n";
}

if ($_GET['bd']=='slides'){
	echo "<h2>Галерея сайта</h2>\n";
}



echo "<form enctype='multipart/form-data' action='upload1.php' method='post'>
<input type='hidden' name='MAX_FILE_SIZE' value='9990000'>
<input type='hidden' name='mod' value='".$modif."'>
<font class='txtc'>Загрузить<br>фотографию:</font>
<br><input name='userfile' type='file'\">
<input type='submit' value='Загрузить'>
</form>\n";

echo "<form action='powerimas.php' method='POST'>\n";

	$sPath = $modif.'/'; 
	$dDir = opendir($sPath); // открываем директорию, $dDir - дескриптор 
	//$aFileList = array(); // массив в который будем записывать имена файлов 
	$i=0;
	// цикл считывания директории 
	while ($sFileName=readdir($dDir)) 
	{ 
	if ($sFileName!='.' && $sFileName!='..') 
	{ 
	$i++;
	//$slid[]=$sFileName;
	if ($_GET['bd']!='slides'){echo "<div style='float:left;border:1px solid;'><br>";}else{echo "<div style='border:1px solid;'><br>";}
	echo "выбрать<input type='checkbox' name='ima_".$i."' value='".$modif."/".$sFileName."'/>
	<input type='text' onclick='this.select();' value='".$modif."/".$sFileName."' style='width:320px;'/><br><a href='#' onclick=\"delka('".$modif."/".$sFileName."');\" style='position:absolute;background:#FFFFFF;'>[удалить]</a>
	<img src=\"".$modif."/".$sFileName."?rnd=".rand(100000,9999999)."\" width=";
	if ($_GET['bd']=='slides'){echo "350";}else{echo "280";}
	echo "px border=1/></div>\n";
	} 
	} 
	closedir ($dDir); 

echo "<input type='hidden' name='cou' value='".$i."'/>
<div style='float:left;'><hr><input type='submit' value='Поменять выбранные местами' name='sub0'/><br></div>
<br>
</form>";
	
// подсчет количества файлов 
//$kslides=count($slides); 
}else{echo "Не вошёл!";}
}

include "delka.php";
?>