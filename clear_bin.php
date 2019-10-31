<?
include "cook_life.php";
include "conf.php";

include "fire.php";
//$ok=1;
if ($ok==1){

if ($_SESSION['seso']==""){$_SESSION['seso']=time().'_'.rand(1000000,9999999);}
$seso=$_SESSION['seso'];

	$sql = "DELETE FROM kor WHERE seso LIKE '$seso'";
	$result = @mysql_query("$sql",$db);


}else{echo "ќпа!";}

header("LOCATION: ".$_SERVER['HTTP_REFERER']);
?>