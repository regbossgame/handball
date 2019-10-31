<?
set_time_limit(0);
include "conf.php";

$lk=$_GET['err'];

$id1=$_GET['id1'];
$id2=$_GET['id2'];
$id3=$_GET['id3'];
$m=1300;
$a=0;
$b=$m;

$file_name0="csv/price.csv";
echo date("Y-m-d H:m:i",time())."<br>";

IF ((file_exists($file_name0))&&($_GET['a']=="")){
$ok=1;
//include "dump.php";
/*
$sql = "DELETE FROM cat WHERE wirt LIKE '12'";
$result = @mysql_query("$sql",$db);
echo $result*1;

$sql = "DELETE FROM tov WHERE wirt LIKE '12'";
$result = @mysql_query("$sql",$db);
echo $result*1;*/

}

echo "<br>";

/*
if (!isset($_GET['m'])){

	$sql7="SELECT MAX(img_id) AS img_id FROM rad_cat_images";
        $result7 = @mysql_query($sql7,$db);
        $k7=@mysql_num_rows($result7);
		$idxa = @mysql_result($result7, 0, "img_id");

if ($idxa<1000){$idxa=1000;}

$idxa=round($idxa/10)*10;

$m=$idxa+10;
}else{
$m=$_GET['m'];
}
*/

if ($_GET['a']!=""){$a=$_GET['a'];}
if ($_GET['b']!=""){$b=$_GET['b'];}
		
$fp = fopen($file_name0, "r");
 
$columns = fgets($fp, 999);
$columns = rtrim($columns);

//echo $columns."<br>";
$ma=array();
 $kk=0;
 $ro=0;
 while (!feof($fp))
{
$mt = fgets($fp, 999);
$mt = rtrim($mt);

$kk++;
//echo $mt."|<br>";
if (($kk>=$a)&&($kk<=$b)){
$ro=1;

$rt="";
$ma=explode(';',$mt);
for($i=0;$i<($j-1);$i++){
$rt.="'".$ma[$i]."',";
}
$rt.="'".$ma[$j-1]."'";
//echo "<h3>".$ma[1]."</h3>";//$nal0=($ma[4]*1);
//if ((($ma[2]*1)>0)&&($nal0>0)){if ($ma[0]!=""){$kolo=1;//$ma[7];//7
$zen=100;//$ma[2];//2
$zenz=100;//$ma[2];//2
$code=$ma[0];//0

if (strpos("^".$zenz," ")>0){$zenz=str_replace(" ","",$zenz);}
if (strpos("^".$zen," ")>0){$zen=str_replace(" ","",$zen);}
if (strpos("^".$code," ")>0){$code=str_replace(" ","",$code);}


$zenz=rtrim($zenz);
$zen=rtrim($zen);
$code=rtrim($code);

//if (($zen==0)&&($zenz==0)){$lk.="Нет никакой цены! cod=".$code."<br>";}


$name=$ma[1];//1

if (($name[0]=='"')&&($name[strlen($name)-1]=='"')){$name[0]="^";$name[strlen($name)-1]="^";}
$name=str_replace('^','',$name);

if (strpos("^".$name,"'")>0){$name=str_replace("'",'"',$name);}


//if (($name[0]=='"')&&($name[strlen($name)-1]=='"')){$name[0]="^";$name[strlen($name1)-1]="^";}



$name=str_replace('""','"',$name);

$name=rtrim($name);




$rod1=$ma[2];//3
$rod2=$ma[3];//4
$rod3=$ma[4];//5

if (($rod1[0]=='"')&&($rod1[strlen($rod1)-1]=='"')){$rod1[0]="^";$rod1[strlen($rod1)-1]="^";}
if (($rod2[0]=='"')&&($rod2[strlen($rod2)-1]=='"')){$rod2[0]="^";$rod2[strlen($rod2)-1]="^";}
if (($rod3[0]=='"')&&($rod3[strlen($rod3)-1]=='"')){$rod3[0]="^";$rod3[strlen($rod3)-1]="^";}

if (strpos("^".$rod1,"'")>0){$rod1=str_replace("'",'"',$rod1);}
if (strpos("^".$rod2,"'")>0){$rod2=str_replace("'",'"',$rod2);}
if (strpos("^".$rod3,"'")>0){$rod3=str_replace("'",'"',$rod3);}

$rod1=str_replace('""','"',$rod1);
$rod2=str_replace('""','"',$rod2);
$rod3=str_replace('""','"',$rod3);

$rod1=str_replace('""','"',$rod1);
$rod2=str_replace('""','"',$rod2);
$rod3=str_replace('""','"',$rod3);

$rod1=str_replace('^','',$rod1);
$rod2=str_replace('^','',$rod2);
$rod3=str_replace('^','',$rod3);



$rod1=rtrim($rod1);
$rod2=rtrim($rod2);
$rod3=rtrim($rod3);

//echo "<b>".$kk."</b>(>)".$mt."=><br>";

/*
$sql="SELECT id FROM tov WHERE cat_id LIKE '$code'";
$result = @mysql_query("$sql",$db);
$k=@mysql_num_rows($result);
if ($k>0){
 $sql = "UPDATE red_catalog SET cat_cost='$zen', cat_buy_cost='$zenz', cat_name='$name' WHERE cat_id LIKE '$code'";
 $result = @mysql_query("$sql",$db);
echo "<br>!UPDATE!".($result*1)."!<br>";
}

$sql="SELECT cat_name FROM rad_catalog WHERE cat_name LIKE '$name'";
$result = @mysql_query("$sql",$db);
$k=@mysql_num_rows($result);
if ($k>0){echo "<font color='#BB0000'>".$kk.")$name | $code (Уже существует!)</font>";$inf="уже существует!";include "info.php";}else{
//echo "<font color='#00BB00'>".$sql."|".$k."</font><br>";
  include "dump.php";
}
//for($i=0;$i<=7;$i++){ 

//echo $ma[$i]."|";
//}
*/

include "imp.php";

//echo "<br>";


}



}

}
 
 fclose($fp);	

if ((strlen($lk)>3)){file_put_contents("tmp/err".$b.".html",$lk);echo "<h1><font color='#DD4444'>$lk</font></h1>";}
 if (($ro==1)&&($kk>=300)){echo "<META HTTP-EQUIV=Refresh CONTENT='1; URL=import.php?a=".($b+1)."&b=".($b+$m)."&err=".strlen($lk)."&id1=".$id1."&id2=".$id2."&id3=".$id3."'/>";}else{ $ok=1;
 include "obr.php";
 
 include "genlmen.php";
 
 echo "<h1>Конец</h1><META HTTP-EQUIV=Refresh CONTENT='2; URL=admin.php'/>";//<a href='import.php'>import заново</a>"; }

?>