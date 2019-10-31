<?

include "conf.php";
include "fire.php";
if ($ok==1){

$id=$_POST['id'];
if ($id=="new"){$id="-331210";}
if ($_POST['sub2']!=""){$id="-331210";};

$name=$_POST['name'];
$txt=$_POST['txt'];


$txt=str_replace("'","\'",$txt);

	$sql="SELECT id FROM koma WHERE id LIKE '$id'";
    $result = @mysql_query($sql,$db);
    $k=@mysql_num_rows($result);

	if ($k==0){
	include "genid3.php";
	
//	if (($_POST[$np[count($np)-1]]*1)==0){
//	}
	
	$tt="";
	$rr="";
	for($i=0;$i<count($np);$i++){
	$tt.=$np[$i].",";
	$rr.="'".$_POST[$np[$i]]."',";
	}
	
	$treg=time();
	$sql = "INSERT INTO koma (id,name,treg,".$tt."txt) VALUES('$id22','$name','$treg',".$rr."'$txt')";
	$result = @mysql_query($sql,$db);

	}else{
	
	
	$tt="";
	for($i=0;$i<count($np);$i++){
		$tt.=$np[$i]."='".$_POST[$np[$i]]."', ";
	}
		$id22=$id;
		$sql = "UPDATE koma SET name='$name', ".$tt."txt='$txt' WHERE id LIKE '$id'";
		$result = @mysql_query("$sql",$db);
	}

if ($_FILES['userfile']['name']!="")	{
	
$fn="upload/".$id22;
	if (file_exists($fn.".jpg")){unlink($fn.".jpg");}
	
	
$file=$_FILES['userfile']['name'];
$file3=$file;

//echo $file;
$file=end(explode(".", $file));
$fileZ=$file;
$fileZ=strtolower($fileZ);

	$file=$id22.".".$file;
$uploaddir = "upload/";	
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploaddir . $file)) {

///////////////111111111111111111111111
$finka0=$file;
$updir0=$uploaddir;
$foto=$updir0 . $file;
include "image.php";
////23333333333333333333333

$file2=$file;
$file=$uploaddir.$file;
}
}
	
//$ref=$_SERVER['HTTP_REFERER'];
$ref="komanda.php?id=".$id;
if ($id=="-331210"){$ref="komanda.php?id=".$id22;}

//header("LOCATION: ".$ref);
echo "<META HTTP-EQUIV=Refresh CONTENT='0; URL=".$ref."'/>";
}

?>