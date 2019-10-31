<?
include "cook_life.php";
include "conf.php";

include "fire.php";
//$ok=1;

if ($ok==1){

if ($_SESSION['seso']==""){$_SESSION['seso']=time().'_'.rand(1000000,9999999);}
$seso=$_SESSION['seso'];

$id=$_GET['id'];
$kol=$_GET['kol'];

$set=$_GET['set'];

$sql="SELECT id,zen,zenz,name,str,fotos FROM tov WHERE id LIKE '$id'";
$result = @mysql_query("$sql",$db);
$k=@mysql_num_rows($result);

if ($k>0){
$i=0;
$id1=@mysql_result($result, $i,"id");

//echo $id1."A";

$zen=@mysql_result($result, $i,"zen");
$zenz=@mysql_result($result, $i,"zenz");
$name=@mysql_result($result, $i,"name");
$str=@mysql_result($result, $i,"str");
$fotos=@mysql_result($result, $i,"fotos");

	$fts=array();
	if ($fotos<>''){
	$fts=explode("*",$fotos);
	$img=$fts[0];
	}else{$img="catalog/nofoto.jpg";}
	
$zen0=$zen;
$zenz0=$zenz;
include "zen.php";
$zent=$zent0;

$treg=time();

$sql="SELECT seso FROM kor WHERE seso LIKE '$seso' AND code LIKE '$id1'";
$result = @mysql_query("$sql",$db);
$k=@mysql_num_rows($result);

if ($k<=0){

include "genid2.php";

$sql = "INSERT INTO kor (id,seso,code,kol,name,str,zent,zen,zenz,fotos,stat,treg) VALUES('$id22','$seso','$id1','$kol','$name','$str','$zent','$zen','$zenz','$img','0','$treg')";
$result = @mysql_query($sql,$db);



}else{

if ($set!=1){
 $sql = "UPDATE kor SET kol=kol+".$kol.", treg='$treg' WHERE seso LIKE '$seso' AND code LIKE '$id1'";
 $result = @mysql_query("$sql",$db);
 }else{
 $sql = "UPDATE kor SET kol='".$kol."', treg='$treg' WHERE seso LIKE '$seso' AND code LIKE '$id1'";
 $result = @mysql_query("$sql",$db);
 //echo $result."|";
 
 }
}

 $sql = "DELETE FROM kor WHERE kol<=0";
 $result = @mysql_query("$sql",$db);


$sql="SELECT kol,zent FROM kor WHERE seso LIKE '$seso'";
$result = @mysql_query("$sql",$db);
$k=@mysql_num_rows($result);
$zent=0;
$kol=0;
for($i=0;$i<$k;$i++){
	$kol0=@mysql_result($result, $i,"kol");
	$kol+=$kol0;
	$zent+=@mysql_result($result, $i,"zent")*$kol0;
}

if ($set!=1){echo $id1.";".$kol.";".$zent;}else{
	$ref=$_SERVER['HTTP_REFERER'];
	header("LOCATION: ".$ref);  
	}

}else{echo "-;-;-;-;1";}
}else{echo "-;-;-;-;2";}
?>