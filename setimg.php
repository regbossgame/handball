<?

include "conf.php";
include "fire.php";
if ($ok==1){

$id=$_GET['id'];
$im=$_GET['im'];
//$adm=$_GET['adm'];



$sql="SELECT * FROM tov WHERE id LIKE '$id'";


	$result = @mysql_query("$sql",$db);
	$k=@mysql_num_rows($result);
	$i=0;
	$fotos=@mysql_result($result, $i,"fotos");
//	echo "<a name='id".$id0."'></a>";
//$fts=array();
$fts=explode('*',$fotos);

	//for($i=0;$i<count($fts);$i++){
		$im=$fts[$im];//1111111111111111
	//}



$rt="";
	for($i=0;$i<count($fts);$i++){
		if ($im==$fts[$i]){$rt=$fts[$i];}
	}

	for($i=0;$i<count($fts);$i++){
		if ($im!=$fts[$i]){$rt.="*".$fts[$i];}
	}
	
$fotos=$rt;

				
$sql = "UPDATE tov SET fotos='$fotos' WHERE id LIKE '$id'";
$result = @mysql_query("$sql",$db);


//echo "<META HTTP-EQUIV=Refresh CONTENT='0; URL=".$_SERVER['HTTP_REFERER']."#id$id'/>";

	$ref=$_SERVER['HTTP_REFERER'];
	header("LOCATION: ".$ref."#id$id");  
}
	?>