<?
$sPath = 'slides/'; 
$dDir = opendir($sPath); // открываем директорию, $dDir - дескриптор 
//$aFileList = array(); // массив в который будем записывать имена файлов 
$slides=array();
$i=0;
// цикл считывания директории 
while ($sFileName=readdir($dDir)) 
{ 
if ($sFileName!='.' && $sFileName!='..') 
{ 
$slides[]=$sPath.$sFileName;
} 
} 
closedir ($dDir); 

// подсчет количества файлов 
$kslides=count($slides); 
?>
	<div id="rotator">
		<?
		for($j5=0;$j5<$kslides;$j5++){
		echo "
		<div>
			<img src='".$slides[$j5]."' width=1100px; height=140px/>
		</div>\n";
		}
?>
	</div>	