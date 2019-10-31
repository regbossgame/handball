<?

include "conf.php";
include "fire.php";
if ($ok==1){


$id0=$_GET['id'];
$bd=$_GET['bd'];


$sql = "DELETE FROM $bd WHERE id LIKE '$id0'";
$result = @mysql_query("$sql",$db);

if ($bd=="koma"){
$fn="upload/".$id0;
	if (file_exists($fn.".jpg")){unlink($fn.".jpg");}
}


$ref=$_SERVER['HTTP_REFERER'];
$i=strpos($ref,"?");
if ($i>0){$ref=substr($ref,0,$i);}

//echo $ref;
header("LOCATION: ".$ref);  

}
?>