<?

include "conf.php";
include "fire.php";
if ($ok==1){

$id=$_POST['id'];
if ($id=="new"){$id="-331210";}
if ($_POST['sub2']!=""){$id="-331210";};

$name=$_POST['name'];
$txt=$_POST['txt'];
$opis=$_POST['opis'];

$opis=str_replace("'","\'",$opis);

	$sql="SELECT id FROM video WHERE id LIKE '$id'";
    $result = @mysql_query($sql,$db);
    $k=@mysql_num_rows($result);

	if ($k==0){
	include "genid2.php";
	
	$treg=time();
	$sql = "INSERT INTO video (id,name,treg,txt,opis) VALUES('$id22','$name','$treg','$txt','$opis')";
	$result = @mysql_query($sql,$db);

	}else{
		$sql = "UPDATE video SET name='$name', txt='$txt', opis='$opis' WHERE id LIKE '$id'";
		$result = @mysql_query("$sql",$db);
	}
	
//$ref=$_SERVER['HTTP_REFERER'];
$ref="video.php?id=".$id;
if ($id=="-331210"){$ref="video.php?id=".$id22;}

header("LOCATION: ".$ref);

}

?>