<?
include "cook_life.php";
include "conf.php";

include "fire.php";
if ($ok>0){
if ((isset($_SESSION["log"]))&&($_SESSION['adm']>0)){
$count=$_POST['cou'];
$j=0;
$err=0;
for($i=0;$i<=$count;$i++){

//echo $i."=>".$_POST['ima_'.$i]."<br>";

if (isset($_POST['ima_'.$i])){
$j++;
if ($j==1){$fn1=$_POST['ima_'.$i];}
if ($j==2){$fn2=$_POST['ima_'.$i];}
if ($j>=3){$err=1;}
}

}

if ($j<2){$err=1;}

if ($err==0){

$fna1=$fn1;
$fna2=$fn2;

rename($fna1,$fna1.".tmp");
rename($fna2,$fna1);
rename($fna1.".tmp",$fna2);

//$fna1="images/".$bd."/th/".$fn1;
//$fna2="images/".$bd."/th/".$fn2;

//rename($fna1,$fna1.".tmp");
//rename($fna2,$fna1);
//rename($fna1.".tmp",$fna2);


}else{echo "Неверное количество выбраных объектов на обмен местами!CODE=".$j;}


}else{HEADER("LOCATION: loginka.php");}
}else{echo "Xak Error!";}

//echo "<META HTTP-EQUIV=Refresh CONTENT='1; URL=".$HTTP_REFERER2."'/>";
HEADER("LOCATION: ".$HTTP_REFERER2);

//echo $fna1."<br>".$fna2;

?>