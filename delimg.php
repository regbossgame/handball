<?
include "conf.php";

include "fire.php";
if ($ok==1){
	if (file_exists($_GET['name'])){unlink($_GET['name']);}
}

	$ref=$_SERVER['HTTP_REFERER'];
	header("LOCATION: ".$ref);  

?>