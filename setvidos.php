<?
$sql4="SELECT txt,id,name FROM video ORDER BY treg DESC LIMIT 1";
$result4 = @mysql_query($sql4,$db);
$i4=0;
$mat = @mysql_result($result4, $i4, "txt");
$id4 = @mysql_result($result4, $i4, "id");
$name4 = @mysql_result($result4, $i4, "name");

//echo $mat."1111";

$wh="width=200px height=150px";
include "prew.php";
	
	$mat4=$t12;
	
	//$mat=str_replace("width=","style='float: right; margin: 5px 10px;' width=",$mat);


//echo $mat;
$mat="<div style='float: right; margin: 5px 10px;'><a href='video.php?id=$id4'><b>Смотреть новое видео</b> $mat4<br><div style='font-size:7pt;color:#FFFFFF;width:202px;background:#000000;'>$name4</div></a></div>";
file_put_contents("vidos.php",$mat);

?>