<?

if (($rod1=="")&&($rod2!="")){$rod1=$rod2;$rod2="";}
if (($rod1!="")&&($rod2=="")&&($rod3!="")){$rod2=$rod3;$rod3="";}
if (($rod2=="")&&($rod3!="")){$rod2=$rod3;$rod3="";}
if (($rod1=="")&&($rod2=="")&&($rod3!="")){$rod1=$rod3;$rod3="";}


if ($rod3!=""){$rod2.="-".$rod3;}

if ($rod1==""){$rod1="Разное";}

$rod=$rod1;

// раздел товара 1
$sql="SELECT id FROM cat WHERE name LIKE '".$rod."' AND rod LIKE '0' AND prod LIKE '0'";
$result = @mysql_query("$sql",$db);
$k=@mysql_num_rows($result);
if ($k<=0){
$cat0="cat";
include "genid.php";

$id1=$id22;
$id3=$id1;
$tit="Каталог / ".$rod1;
//if ($rod1!=""){$tit=$rod1." / ".$tit;}


      $sql = "INSERT INTO cat ( id,name,str,title,wirt) VALUES ( '$id1','$rod','".trans($rod)."','$tit','12' )";
	  $result = @mysql_query("$sql",$db);
	  if (($result*1)==0){$result="<font color='FF3333' style='background:#000000;'>0</font>";$lk.="cat1=".$id1."<br>";}
//echo "|tip-sql=$sql|r=".($result)."<br>";
//if (($result*1)==0){$inf="Не добавлен тип товара";$para="ID=".$id;include "info.php";}
}else{
$id1 = @mysql_result($result, 0, "id");
$id3=$id1;
$tit="Каталог / ".$rod1;
}


if ($rod2!=""){
$rod=$rod2;
//$arod=$rod;
$rod=str_replace($rod1,"",$rod2);
$arod=str_replace($rod1,$rod1."_",$rod2);
$rod2=$rod;
// раздел товара 2
$sql="SELECT id FROM cat WHERE name LIKE '".$rod."' AND rod LIKE '$id1' AND prod LIKE '0'";
$result = @mysql_query("$sql",$db);
$k=@mysql_num_rows($result);
if ($k<=0){
$cat0="cat";
include "genid.php";

$id2=$id22;
$id3=$id2;
$tit=$rod2;
if ($rod1!=""){$tit=$rod1." / ".$tit;}
$tit="Каталог / ".$tit;

      $sql = "INSERT INTO cat ( id,name,str,rod,title,wirt) VALUES ( '$id2','$rod','".trans($arod)."','$id1','$tit','12' )";
	  $result = @mysql_query("$sql",$db);
	  if (($result*1)==0){$result="<font color='FF3333' style='background:#000000;'>0</font>";$lk.="cat2=".$id2."<br>";}
//echo "|tip-sql=$sql|r=".($result)."<br>";
//if (($result*1)==0){$inf="Не добавлен тип товара";$para="ID=".$id;include "info.php";}
}else{
$id2 = @mysql_result($result, 0, "id");
$id3=$id2;
if ($rod1!=""){$tit=$rod1." / ".$tit;}
$tit="Каталог / ".$tit;

}

}


if ($rod3!=""){
$rod=$rod3;
// раздел товара 2
$sql="SELECT name FROM cat WHERE name LIKE '".$rod."' AND rod LIKE '$id2' AND prod LIKE '$id1'";
$result = @mysql_query("$sql",$db);
$k=@mysql_num_rows($result);
if ($k<=0){
$cat0="cat";
include "genid.php";

$id3=$id22;
$tit=$name;
if ($rod2!=""){$tit=$rod2." / ".$tit;}
if ($rod1!=""){$tit=$rod1." / ".$tit;}
$tit="Каталог / ".$tit;


      $sql = "INSERT INTO cat ( id,name,str,rod,prod,title,wirt) VALUES ( '$id3','$rod','".trans($rod)."','$id2','$id1','$tit','12' )";
	  $result = @mysql_query("$sql",$db);
 	  if (($result*1)==0){$result="<font color='FF3333' style='background:#000000;'>0</font>";$lk.="cat3=".$id3."|";}
//echo "|tip-sql=$sql|r=".($result)."<br>";
//if (($result*1)==0){$inf="Не добавлен тип товара";$para="ID=".$id;include "info.php";}
}
}



// товар
$sql="SELECT id FROM tov WHERE id LIKE '".$code."'";
$result = @mysql_query("$sql",$db);
$k=@mysql_num_rows($result);
if ($k<=0){
//$cat0="tov";
//include "genid.php";
$img="";
$in=$code.".jpg";
$diri="catalog/original/";
for($i=0;$i<15;$i++){
if (file_exists($diri.$in)){$img=$diri.$in;break;}
$in="0".$in;
}

$tit=$name;
if ($rod3!=""){$tit=$rod3." / ".$tit;}
if ($rod2!=""){$tit=$rod2." / ".$tit;}
if ($rod1!=""){$tit=$rod1." / ".$tit;}
$tit="Каталог / ".$tit;

      $sql = "INSERT INTO tov (id,name,str,catid,zen,zenz,fotos,title,kol,wirt) VALUES ('$code','$name','".trans($name)."','$id3','$zen','$zenz','$img','$tit','$kolo','12')";
	  $result = @mysql_query("$sql",$db);
	  	  if (($result*1)==0){$result="<font color='FF3333' style='background:#000000;'>0</font>";$lk.="tov=".$code."<br>";}
		  //if (strlen($tit)>128){$result="<font color='FF3333' style='background:#000000;'>0</font>";$lk.="tov=".$code."<br>";}
//echo "|tip-sql=$sql|r=".($result)."<br>";
//if (($result*1)==0){$inf="Не добавлен тип товара";$para="ID=".$id;include "info.php";}
}

//echo "<hr>";

?>