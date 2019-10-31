<?
include "conf.php";

include "fire.php";
if ($ok==1){
	$path="slides/".$_GET['path']."/".$_GET['name'];
	if (file_exists($path)){unlink($path);}
}

	$ref=$_SERVER['HTTP_REFERER'];
	header("LOCATION: ".$ref);  

?>