<?

if ($ok!=1){include "conf.php";}

$sql="SELECT id,rod,prod FROM cat WHERE img LIKE '' ORDER BY name";
$result = @mysql_query("$sql",$db);
$k=@mysql_num_rows($result);

for($i=0;$i<$k;$i++){
	$id=@mysql_result($result, $i,"id");
	$rod1=@mysql_result($result, $i,"rod");
	$rod2=@mysql_result($result, $i,"prod");
	//$title=@mysql_result($result, $i,"title");

//echo $i."+".$catid."-";
// ORDER BY RAND() перед  lim
$sql2="SELECT fotos,name FROM tov WHERE (catid LIKE '$id' OR catid LIKE '$rod1' OR catid LIKE '$rod2') AND (fotos<>'') ORDER BY RAND() LIMIT 2";
$result2 = @mysql_query("$sql2",$db);
$k2=@mysql_num_rows($result2);
//echo $k2."|";
$fotos=@mysql_result($result2, 0,"fotos");
$name=@mysql_result($result2, 0,"name");
if ($k2>1){
$fotos2=@mysql_result($result2, 1,"fotos");
}else{$fotos2=$fotos;}
$fts=explode("*",$fotos);
$fts2=explode("*",$fotos2);


if ($k2>0){
$sql2 = "UPDATE cat SET img='".$fts[0]."' WHERE id LIKE '$id'";
$result2 = @mysql_query("$sql2",$db);

//echo "SQL=".$sql2."|r=".$result2."|$name<br>";

$sql2 = "UPDATE cat SET img='".$fts2[0]."' WHERE id LIKE '$rod1'";
$result2 = @mysql_query("$sql2",$db);

//echo "SQL=".$sql2."|r=".$result2."|$name<br><hr>";

}

//$sql2 = "UPDATE cat SET img='".$fotos."' WHERE id LIKE '$catid'";
//$result2 = @mysql_query("$sql2",$db);


/*
$sql="SELECT catid,fotos FROM tov WHERE fotos<>''";
$result = @mysql_query("$sql",$db);
$k=@mysql_num_rows($result);

for($i=0;$i<$k;$i++){
	$fotos=@mysql_result($result, $i,"fotos");
	$catid=@mysql_result($result, $i,"catid");

echo $i."+".$catid."-";
	
	
$sql2 = "UPDATE cat SET img='".$fotos."' WHERE id LIKE '$catid'";
$result2 = @mysql_query("$sql2",$db);

echo "SQL=".$sql2."|r=".$result2."<br>";
 
 */
 
	/*
$sql2="SELECT  FROM cat WHERE id LIKE '$catid'";
$result2 = @mysql_query("$sql2",$db);
$k2=@mysql_num_rows($result2);

for(%j=0;$j<$k2;$j++){
	$=@mysql_result($result, $i,"fotos");

}
	*/
	


}
/*

$sql2="ALTER TABLE tov CHANGE COLUMN zen vzen decimal(9,2) NOT NULL";
$result2 = @mysql_query("$sql2",$db);

$sql2="ALTER TABLE tov CHANGE COLUMN zenz zen decimal(9,2) NOT NULL";
$result2 = @mysql_query("$sql2",$db);

$sql2="ALTER TABLE tov CHANGE COLUMN vzen zenz decimal(9,2) NOT NULL";
$result2 = @mysql_query("$sql2",$db);
*/



?>