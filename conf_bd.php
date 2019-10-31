<?
$ipt = (!empty($_SERVER['REMOTE_ADDR'])) ? $_SERVER['REMOTE_ADDR'] : ((!empty($_ENV['REMOTE_ADDR'])) ? $_ENV['REMOTE_ADDR'] : getenv('REMOTE_ADDR')); 

if (($_SESSION['adm_en']=="1")&&($_SESSION['adm']>0)){$enadm=1;}

$admuser=strtolower("admin");
$admpas=strtolower("331210");


// BASE
include "conf_bdpas.php";

include "bd.php";

// firewall
///--------------------

$adminmail="wirtbox@mail.ru";

//bashni-emkosti.ru
$hostname0="handball-taganrog.ru";

$hostname="http://".$hostname0;
$hostname2="http://www.".$hostname0;
$hostname3="http://127.0.0.1";
$hostname4="http://localhost";

$type="up_men";
include "reader.php";

//$type="down_men";
//include "reader.php";

//$type="vote";
//include "reader.php";


$spacs=array();
$specs[0]="vid.php";
$specs[1]="gal.php";
$specs[2]="koma.php";
$specs[3]="start.php";
$specs[4]="login.php";
$specs[5]="mess.php";
$specs[6]="newso.php";



$np=array();
$np[0]="dolz";
$np[1]="amplua";
$np[2]="born";
$np[3]="rost";
$np[4]="ves";
$np[5]="por";


$nr=array();
$nr[0]="Должность";
$nr[1]="Амплуа";
$nr[2]="Родился";
$nr[3]="Рост";
$nr[4]="Вес";
$nr[5]="Сортировка";

//$type="left_men";
//include "reader.php";

//$type="users";
//include "reader.php";

function getfiles($sPath){
//$sPath = 'slides/'; 
$dDir = opendir($sPath); // открываем директорию, $dDir - дескриптор 
//$aFileList = array(); // массив в который будем записывать имена файлов 
$slides=array();

// цикл считывания директории 
while ($sFileName=readdir($dDir)) 
{ 
if ($sFileName!='.' && $sFileName!='..' && strpos($sFileName,".jpg")>0) 
{ 
$slides[]=$sFileName;
} 
} 
closedir ($dDir); 

// подсчет количества файлов 
//$kslides=count($slides);

//include "java.php";
return $slides;
}

function getfirst($sPath){
//$sPath = 'slides/'; 
$sFileName="";
$dDir = opendir($sPath); // открываем директорию, $dDir - дескриптор 
//$aFileList = array(); // массив в который будем записывать имена файлов 

// цикл считывания директории 
while ($sFileName=readdir($dDir)) 
{ 
if ($sFileName!='.' && $sFileName!='..' && strpos($sFileName,".jpg")>0) 
{ 
break;
} 
} 

closedir ($dDir); 

if ($sFileName==""){$sPath="res";$sFileName="nofoto.jpg";}

return ($sPath."/".$sFileName);

}

function getaln($sPath){
//$sPath = 'slides/'; 
$sPath=file_get_contents($sPath."/setting.ini");
$sPath=explode("\n",$sPath);
$sPath=rtrim($sPath[0]);

return $sPath;

}
?>