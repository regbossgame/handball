<?

if ($str!='start.php'){
if ($name67==""){$name67=$tif2[0];}

echo "<div class=\"tov3\">

<div class=\"top3\"></div>

<div class=\"zag3\">

<h1><img src='res/top1/accept.png' width=15px/> $name67</h1>

</div>

<div class=\"cont3\">\n";
}

$fnam=$_SERVER['REQUEST_URI'];
$tt=$fnam;

include "nama.php";
$tif=$fnam;
$fnam2="txt/".$fnam."_".$modif.".php";
$tt2=$str;//end(explode("=", $tt));

	if (file_exists($fnam2)){
	$trez=file_get_contents($fnam2);
}else{
//$trez="<h1>F=<font color='#BF7777'>".$fnam."</font></h1>";
$trez="<h1>Нет страницы: <font color='#BF7777'>".$tt2."</font></h1>";

if (($modif=="str")&&($enadm==0)){
$trez.="<h1>Страница не существует либо была удалена! Попробуйте <a target='_blank' id='openka' href='http://yandex.ru/yandsearch?text=".$tt2."+site:".$hostname."'><u> ПОИСК</u></a></h1>";
//<META HTTP-EQUIV=Refresh CONTENT='12; URL=http://kran-stroy.ru'/>";
//<script>setTimeout(\"document.getElementById('openka').click();\",1000);</script>";

}

}
//$fnam=str_replace("/", "_", $fnam);



if ($enadm==0){

$npl1="#ВИДЕО#";
if (strpos("^".$trez,$npl1)>0){
include "setvidos.php";
$tt=file_get_contents("vidos.php");
$trez=str_replace($npl1,$tt,$trez);
}

//$trez=str_replace("<img src=", "<img onmousedown=\"open_foto(this,0);\" style=\"cursor:se-resize;\" onmousemove=\"zoom_img(this);\" onmouseout=\"no_res_img();\" src=", $trez);
echo "<div>".$trez."</div>";
echo "<input type='hidden' value='1' id='tita'/>";
}else{
//echo "<div style='width:100%;height:100%;'>
echo "<form action='edit0.php' method='POST'>\n";
if ($modif=="str"){
$tif="txt/".$tif."";
$tif3=$tif."_config.php";
	if (file_exists($tif3)){
	$tif22=file_get_contents($tif3);
}else{$tif22="\n\n";}

$tif2=explode("\n",$tif22);
$tif2[0] = rtrim($tif2[0]);
$tif2[1] = rtrim($tif2[1]);
$tif2[2] = rtrim($tif2[2]);


if ($tif2[0]==""){$tif2[0]=$tmen[$str];}
if ($tif2[1]==""){$tif2[1]=$kmen[$str];}
if ($tif2[2]==""){$tif2[2]=$dmen[$str];}



echo "<input type='hidden' value='$tif3' name='tif'/>";
echo "<br>Title:<input type='text' value='$tif2[0]' name='title' id='tita' onchange='tita2();' style='width:600px;'/><br>";

echo "<br><textarea style='height:400px;width:780px;' name='txt1' id='txt1'>$trez</textarea><br><input type='hidden' name='file' value='".$fnam2."'>";

echo "Keywords:<input type='text' value='$tif2[1]' id='keywords' name='keywords' style='width:700px;'/><br>";
echo "Discriptor:<input type='text' value='$tif2[2]' id='discriptor' name='discriptor' style='width:700px;' title='Описание страницы'/><br>";




}
echo "<input type='submit' value='Сохранить'>
</form>";
//</div>";
}

if ($str!='start.php'){

echo "</div>

<div class=\"down3\"></div>

</div>";
}
//if ($str=="Galereya"){include "gal.php";}

?>
<br>