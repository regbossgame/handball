<?php
set_time_limit(0);
if (($_GET['pas']=='wirt')||($ok==1)){

if ($ok!=1){include "conf.php";}

$sql = "DROP TABLE region";
   $result = @mysql_query("$sql",$db);

$sql = "CREATE TABLE region (
	id int,
	name varchar(60)
)";

   $result = @mysql_query("$sql",$db);
	echo "region_rez=".$result."<br>";

$file_name="csv/region_dump.csv";	
$columns = "id,name";
$fp = fopen($file_name, "r");
 
 while (!feof($fp))
{
$mt = fgets($fp, 999);
$ma=array();
$ma=explode(';',$mt);
$ma[0]="'".$ma[0]."'";
$ma[1]="'".$ma[1]."'";
      $sql = "INSERT INTO region ( $columns ) VALUES ( ".$ma[0].",".$ma[1]." )";
	  $result = @mysql_query("$sql",$db);

}
 
 fclose($fp);	

echo "Region: ".$values." => ".($result*1)."($columns|".$ma[0].",".$ma[1].")<br>";	
	
///////////////////////////--city
/*
	$sql = "DROP TABLE city";
   $result = @mysql_query("$sql",$db);

$sql = "CREATE TABLE city (
	id int,
	name varchar(60)
)";

   $result = @mysql_query("$sql",$db);
	echo "city_rez=".$result."<br>";

$file_name="csv/city_dump.csv";	
$columns = "id,name";
$fp = fopen($file_name, "r");
 
 while (!feof($fp))
{
$mt = fgets($fp, 999);
$ma=array();
$ma=explode(';',$mt);
$ma[0]="'".$ma[0]."'";
$ma[1]="'".$ma[1]."'";
      $sql = "INSERT INTO city ( $columns ) VALUES ( ".$ma[0].",".$ma[1]." )";
	  $result = @mysql_query("$sql",$db);

}
 
 fclose($fp);	

	
echo "City: ".$values." => ".($result*1)."($columns|".$ma[0].",".$ma[1].")<br>";	
	
*/

}

?>