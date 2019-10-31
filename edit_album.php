<?

include "conf.php";
include "fire.php";
if ($ok==1){

$new=$_GET['new'];
$name=$_POST['name'];
$path=$_POST['path'];

//$tt=file_get_contents($path."/setting.ini");
if ($new=="1"){
	$path=$path."/".time()."_".rand(10000,99999);
	mkdir($path,0777);
}

file_put_contents($path."/setting.ini",$name);

	
$ref=$_SERVER['HTTP_REFERER'];

header("LOCATION: ".$ref);

}

?>