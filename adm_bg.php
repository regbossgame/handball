<?
include "cook_life.php";

include "conf.php";

include "fire.php";
if ($ok==1){


if ((isset($_SESSION["log"]))&&($_SESSION['adm']>0)){

echo "<a href='admin.php'>� �������</a>\n";

	echo "<h2>��� (���������)</h2>\n";

echo "<form enctype='multipart/form-data' action='upload_bg.php' method='post'>
<input type='hidden' name='MAX_FILE_SIZE' value='9990000'>
<font class='txtc'>���������<br>����������:</font>
<br><input name='userfile' type='file'\">
<input type='submit' value='���������'>
</form>\n
<img src='res/bg1.jpg' width=100% height=100%/>";


// ������� ���������� ������ 
//$kslides=count($slides); 
}else{echo "�� �����!";}
}

include "delka.php";
?>