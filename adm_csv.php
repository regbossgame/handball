<?
include "cook_life.php";

include "conf.php";

include "fire.php";
if ($ok==1){


if ((isset($_SESSION["log"]))&&($_SESSION['adm']>0)){

$modif="csv";
echo "<a href='admin.php'>� �������</a>\n";

$name2=$_GET['name'];

if ($name2==""){


	$sPath = $modif.'/'; 
	$dDir = opendir($sPath); // ��������� ����������, $dDir - ���������� 
	//$aFileList = array(); // ������ � ������� ����� ���������� ����� ������ 
	$i=0;
echo "<ul>\n";	
	// ���� ���������� ���������� 
	while ($sFileName=readdir($dDir)) 
	{ 
	if ($sFileName!='.' && $sFileName!='..' && (strpos($sFileName,'.csv')>0)) 
	{ 
	$i++;
echo "<li><a href='adm_csv.php?name=".$sFileName."'>".$sFileName."</a></li>";	
	} 
	} 
echo "</ul>\n";
	closedir ($dDir); 

// ������� ���������� ������ 
//$kslides=count($slides); 


/*
$modif="csv";
echo "<a href='admin.php'>� �������</a>\n";

echo "<h1>CSV</h1><form enctype='multipart/form-data' action='upload2.php' method='post'>
<input type='hidden' name='MAX_FILE_SIZE' value='9500000'>
<input type='hidden' name='mod' value='".$modif."'>
<font class='txtc'>���������<br>��������:</font>
<br><input name='userfile' type='file'\">
<input type='submit' value='���������'>
</form>";



	$sPath = $modif.'/'; 
	$dDir = opendir($sPath); // ��������� ����������, $dDir - ���������� 
	//$aFileList = array(); // ������ � ������� ����� ���������� ����� ������ 
	$i=0;
	// ���� ���������� ���������� 
	while ($sFileName=readdir($dDir)) 
	{ 
	if ($sFileName!='.' && $sFileName!='..') 
	{ 
	$i++;
	echo "<div>$i) <input type='text' onclick='this.select();' value='".$modif."/".$sFileName."' style='width:320px;'/><br>[<a href='#' onclick=\"delka('".$modif."/".$sFileName."');\">X</a>] - <a href='".$modif."/".$sFileName."' target='_blank'>'".$sFileName."'</a></div><br>\n";
	} 
	} 
	closedir ($dDir); 

// ������� ���������� ������ 
//$kslides=count($slides); 

*/
}else{

$txt=file_get_contents($modif."/".$name2);

echo "<form action=edit_opis.php method='POST'>
<input type='hidden' name='fn1' value='".$modif."/".$name2."'/>
<textarea name='txt10' style='width:99%;height:90%;border:1px solid;'>$txt</textarea>
<input type='submit' value='���������'/>

</form>";


}
}else{echo "�� �����!";}
}

include "delka.php";

?>