<?

include "conf.php";
include "fire.php";
if ($ok==1){

$id=$_POST['id'];
$txt=$_POST['txt1'];
$sub=$_POST['sub2'];

if (isset($_GET['id'])){$id=$_GET['id'];}

if ($sub!=""){$id=-1 ;}

$treg=time();

$txt=str_replace("'","\'",$txt);

 $sql = "UPDATE news SET txt='$txt', treg='".(time())."' WHERE id LIKE '$id'";
 $result = @mysql_query("$sql",$db);

 if ($id==-1){
 	$treg=time();

	include "genid.php";
	$id=$id22;
	$sql = "INSERT INTO news (id,treg,txt) VALUES('$id','$treg','$txt')";
	$result = @mysql_query($sql,$db);
}
 

header("LOCATION: news.php?id=".$id);

}
/*
function n12p($str) {
	return '
 
'.preg_replace("/[\r\n|\n|\r]+/", "
 
", $str).'
 
';
}
*/
?>