<?
include "conf.php";

include "fire.php";

function removeDirRec($dir) 
{ 
if ($objs = glob($dir."/*")) { 
foreach($objs as $obj) { 
is_dir($obj) ? removeDirRec($obj) : unlink($obj); 
} 
} 
rmdir($dir); 
} 

if ($ok==1){
	//if (file_exists($_GET['name'])){}
/*
$slides=getfiles($sPath);
$kslides=count($slides);
if ($kslides>0){
for($i=0;$i<$kslides;$i++){
	unlink($sPath."/".$slides[$i]);
}
}	
	*/
$sPath=$_GET['path'];
removeDirRec($sPath);
	
	}

	$ref=$_SERVER['HTTP_REFERER'];
	header("LOCATION: ".$ref);  

?>