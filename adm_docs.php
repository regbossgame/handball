<?
include "cook_life.php";

include "conf.php";

include "fire.php";
if ($ok==1){


if ((isset($_SESSION["log"]))&&($_SESSION['adm']>0)){
$modif="docs";
echo "<a href='admin.php'>в админку</a>\n";

echo "<h1>Документы</h1><form enctype='multipart/form-data' action='upload2.php' method='post'>
<input type='hidden' name='MAX_FILE_SIZE' value='9500000'>
<input type='hidden' name='mod' value='".$modif."'>
<font class='txtc'>Загрузить<br>документ:</font>
<br><input name='userfile' type='file'\">
<input type='submit' value='Загрузить'>
</form>";



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
	echo "<div>$i) <input type='text' onclick='this.select();' value='".$modif."/".$sFileName."' style='width:320px;'/><br>[<a href='#' onclick=\"delka('".$modif."/".$sFileName."');\">X</a>] - <a href='".$modif."/".$sFileName."' target='_blank'>'".$sFileName."'</a></div><br>\n";
	} 
	} 
	closedir ($dDir); 

// подсчет количества файлов 
//$kslides=count($slides); 
}else{echo "Не вошёл!";}
}

include "delka.php";

?>