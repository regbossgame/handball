<?
include "cook_life.php";
header("Content-Type: text/html;charset=windows-1251");

if (isset($_SERVER['HTTP_REFERER'])){$_SESSION['pref']=$_SERVER['HTTP_REFERER'];}else{$_SESSION['pref']=$_SERVER['REQUEST_URI'];}

//$ehtml=0;

//$fts=array();

//$kpos=-1;
//if (isset($_SESSION["pos"])){$kpos=$_SESSION["pos"];}

if ($_SESSION['seso']==""){$_SESSION['seso']=time().'_'.rand(1000000,9999999);}
$seso=$_SESSION['seso'];


include "conf.php";

if ($_SESSION['log']!=""){
$sql="SELECT * FROM users WHERE log LIKE '".$_SESSION['log']."'";
        $result = @mysql_query($sql,$db);
        $k=@mysql_num_rows($result);

	
if ($k>0){//2

//$logged_user = @mysql_result($result, 0, "log");
//$log = @mysql_result($result, 0, "log");
$adm = @mysql_result($result, 0, "adm");
$act = @mysql_result($result, 0, "act");
$treg = @mysql_result($result, 0, "treg");


//$_SESSION["log"]=$log;
$_SESSION['treg']=$treg;
$_SESSION['act']=$act;
$_SESSION['adm']=$adm;

for($i=1;$i<=6;$i++){
	$_SESSION['par'.$i] = @mysql_result($result, 0, "par".$i);
}
}
}

$fnam=$_SERVER['REQUEST_URI'];
$modif="str";
include "nama.php";
$tif=$fnam;
//$fnam="txt/".$fnam.".php";

$tif="txt/".$tif."";

//echo "<br><br><br><br><br><br><br>".$tif;
$tif3=$tif."_config.php";

//echo "|".$tif3."|";

	if (file_exists($tif3)){
	$tif22=file_get_contents($tif3);
}else{$tif22="\n\n";}



$tif2=explode("\n",$tif22);
$tif2[0] = rtrim($tif2[0]);
$tif2[1] = rtrim($tif2[1]);
$tif2[2] = rtrim($tif2[2]);

//if ($str=="start.php"){
		//$tit="Добро пожаловать! Главная страница.";
		//$tif2[0] = $tit;
//}


///

//$kmen[2]="карточка";
//$tmen[2]="Карточка изделия";
//$dmen[2]="карточка изделия";



if ($tif2[0]==""){$tif2[0]=$tmen[$str];}
if ($tif2[1]==""){$tif2[1]=$kmen[$str];}
if ($tif2[2]==""){$tif2[2]=$dmen[$str];}

if ($tmen[$str]==""){$tmen[$str]=$tif2[0];}
if ($kmen[$str]==""){$kmen[$str]=$tif2[1];}
if ($dmen[$str]==""){$dmen[$str]=$tif2[2];}

$tyk="";
$sPath="slides";

$id7=$_GET['album'];
if (($str=="gal.php")&&($id7!="")){

$tt=getaln($sPath."/".$id7);
$tif2[0]="Альбом: ".$tt;//";//[".date('d.m.Y', $treg)."] ".obrez(strip_tags($id7),120);
$tyk=$tt;
}else{if ($tyk==""){$tyk="";}}


$id7=$_GET['id'];
if (($str=="koma.php")&&($id7!="")){

	$sql="SELECT name FROM koma WHERE id LIKE '$id7'";
	$result = @mysql_query("$sql",$db);
	//$k=@mysql_num_rows($result);
	$id7=@mysql_result($result, 0,"name");
	//$treg=@mysql_result($result, 0,"treg");
	
$tif2[0]="Карточка: $id7";//[".date('d.m.Y', $treg)."] ".obrez(strip_tags($id7),120);
$tyk="".$id7."";
}else{if ($tyk==""){$tyk="Команда";}}


$id7=$_GET['id'];
if (($str=="vid.php")&&($id7!="")){

	$sql="SELECT name FROM video WHERE id LIKE '$id7'";
	$result = @mysql_query("$sql",$db);
	//$k=@mysql_num_rows($result);
	$id7=@mysql_result($result, 0,"name");
	//$treg=@mysql_result($result, 0,"treg");
	
$tif2[0]="Видео: $id7";//[".date('d.m.Y', $treg)."] ".obrez(strip_tags($id7),120);
$tyk="«".$id7."»";
}else{
if ($tyk==""){$tyk="галерея";}
}



$id7=$_GET['id'];
if (($str=="newso.php")&&($id7!="")){

	$sql="SELECT txt,treg FROM news WHERE id LIKE '$id7'";
	$result = @mysql_query("$sql",$db);
	//$k=@mysql_num_rows($result);
	$id7=@mysql_result($result, 0,"txt");
	$treg=@mysql_result($result, 0,"treg");
	
$tif2[0]="Новость: [".date('d.m.Y', $treg)."] ".obrez(strip_tags($id7),120);
$tyk=$treg;
}





echo "<html>
<head>
<title>".$tif2[0]." - ".$comp_name."".$comp_end;
//if (($str!=1)&&($str!=2)&&($str!=8)){echo " - ".$comp_end;}
echo "</title>\n";

echo "\n<meta http-equiv=content-type content=\"text/html; charset=windows-1251\">\n";

if ($tif2[1]!=""){echo "<meta name=\"keywords\" content=\"".$tif2[1]."\">\n";}
if ($tif2[2]!=""){echo "<meta name=\"description\" content=\"".$tif2[2]."\">\n";}


echo "<link rel=\"icon\" href=\"/favicon.ico\" type=\"image/x-icon\">
<link rel=\"shortcut icon\" href=\"/favicon.ico\" type=\"image/x-icon\">
<link href=\"style.css\" rel=\"stylesheet\" type=\"text/css\" media=\"screen\" />\n";

if (($str=="gal.php")||(($str=="koma.php")&&($_GET['id']!=""))){
	echo "<link rel=\"stylesheet\" href=\"css/lightbox.css\" type=\"text/css\" media=\"screen\" />
	<script src=\"js/jquery-1.10.2.min.js\"></script>
	<script src=\"js/lightbox-2.6.min.js\"></script>\n";
}
$tr=($str=="Kommentarii")||($str=="start.php")||($str=="Vkontakte")||($str=="vid.php")||($str=="gal.php")||($str=="koma.php");
if ($tr==true){echo "<script type=\"text/javascript\" src=\"//vk.com/js/api/openapi.js?100\"></script>";}



echo "\n</head>
<body>";// style=\"background: url('res/bg".$i99.".jpg') #65b9ff fixed no-repeat;\">\n";

echo "<!--s_links--><!--check code--><!--/s_links-->\n";
// background='res/water1.gif'
//style='background-image:url(res/bg1.jpg);background-attachment: fixed;'

//if ($str=="Galereya"){


//if (($str=="Kommentarii")||($str=="vid.php")||($str=="gal.php")){
if ($tr==true){
echo "<script type=\"text/javascript\">
  VK.init({apiId: 3860252, onlyWidgets: true});
</script>";

}

?>



<!-- Yandex.Metrika counter -->
<script type="text/javascript">
(function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter22218022 = new Ya.Metrika({id:22218022,
                    webvisor:true,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true});
        } catch(e) { }
    });

    var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

    if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f, false);
    } else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/22218022" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

<!-- Rating@Mail.ru counter -->
<script type="text/javascript">//<![CDATA[
var _tmr = _tmr || [];
_tmr.push({id: "2397358", type: "pageView", start: (new Date()).getTime()});
(function (d, w) {
   var ts = d.createElement("script"); ts.type = "text/javascript"; ts.async = true;
   ts.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//top-fwz1.mail.ru/js/code.js";
   var f = function () {var s = d.getElementsByTagName("script")[0]; s.parentNode.insertBefore(ts, s);};
   if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); }
})(document, window);
//]]></script><noscript><div style="position:absolute;left:-10000px;">
<img src="//top-fwz1.mail.ru/counter?id=2397358;js=na" style="border:0;" height="1" width="1" alt="Рейтинг@Mail.ru" />
</div></noscript>
<!-- //Rating@Mail.ru counter -->
