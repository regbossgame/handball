<?
set_time_limit(0);
include "conf.php";

$ok=1;

$sql2="SELECT id FROM tov WHERE fotos LIKE ''";
$result2 = @mysql_query("$sql2",$db);
$k2=@mysql_num_rows($result2);
for($i2=0;$i2<$k2;$i2++){
$id2=@mysql_result($result2, $id2,"id");

$img="";
$in=$id2.".jpg";
$diri="catalog/original/";
for($i=0;$i<15;$i++){
//echo $diri.$in."|";
if (file_exists($diri.$in)){$img=$diri.$in;break;}
$in="0".$in;
}



if ($img!=""){
$sql3 = "UPDATE tov SET fotos='$img' WHERE id LIKE '$id2'";
$result3 = @mysql_query("$sql3",$db);
//echo $sql3."=>".$result3."<br>\n";
}


}

include "obr.php";


$ref="adm1.php";//$_SERVER['HTTP_REFERER'];
	///$ref=str_replace("#id", "", $ref);
	//header("LOCATION: ".$ref);
	if (($result3*1)!=0){echo "<h3>Успешно загружено для объекта №".$_GET['num']."</h3>";}else{echo "<h3>!!! НЕ загружено для объекта №".$_GET['num']." !!!</h3>";}
	echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=".$ref."'/>";


?>