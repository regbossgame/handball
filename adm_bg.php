<?
include "cook_life.php";

include "conf.php";

include "fire.php";
if ($ok==1){


if ((isset($_SESSION["log"]))&&($_SESSION['adm']>0)){

echo "<a href='admin.php'>в админку</a>\n";

	echo "<h2>Фон (Бэкграунд)</h2>\n";

echo "<form enctype='multipart/form-data' action='upload_bg.php' method='post'>
<input type='hidden' name='MAX_FILE_SIZE' value='9990000'>
<font class='txtc'>Загрузить<br>фотографию:</font>
<br><input name='userfile' type='file'\">
<input type='submit' value='Загрузить'>
</form>\n
<img src='res/bg1.jpg' width=100% height=100%/>";


// подсчет количества файлов 
//$kslides=count($slides); 
}else{echo "Не вошёл!";}
}

include "delka.php";
?>