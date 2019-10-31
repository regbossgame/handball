<?

include "conf.php";
include "fire.php";
if ($ok==1){

$txt1=$_POST['txt1'];
if ($txt1==""){$txt1=$_POST['txt10'];}
$txt2=$_POST['txt2'];

$fn1=$_POST['fn1'];
$fn2=$_POST['fn2'];

//$txt=str_replace("<img src=", "<img onmousedown=\"open_foto(this);\" style=\"cursor:pointer;\" src=", $txt);

//$txt=n12p($txt);
//$txt2=$txt;


$txt1=stripslashes($txt1);
$txt2=stripslashes($txt2);

//$file=mb_convert_encoding($file,"Windows-1251","UTF-8");

///$file=iconv('UTF-8', 'Windows-1251', $file);
//echo $fn1;
file_put_contents($fn1,$txt1);
if ($fn2!=""){file_put_contents($fn2,$txt2);}

//echo $txt."|".$file;
header("LOCATION: ".$_SERVER['HTTP_REFERER']);

//echo $file;
//echo "<META HTTP-EQUIV=Refresh CONTENT='2; URL=".$_SERVER['HTTP_REFERER']."'/>";
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