<?
$sPath = 'slides/'; 
$dDir = opendir($sPath); // ��������� ����������, $dDir - ���������� 
//$aFileList = array(); // ������ � ������� ����� ���������� ����� ������ 
$slides=array();
$i=0;
// ���� ���������� ���������� 
while ($sFileName=readdir($dDir)) 
{ 
if ($sFileName!='.' && $sFileName!='..') 
{ 
$slides[]=$sPath.$sFileName;
} 
} 
closedir ($dDir); 

// ������� ���������� ������ 
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