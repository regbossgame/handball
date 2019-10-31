<?
include "cook_life.php";
include "conf.php";

include "fire.php";
//$ok=1;
if ($ok==1){

for ($i=0;$i<=7;$i++){
	$_SESSION['par'.$i]=$_POST['par'.$i];
}
$tt3="";
if (($_SESSION['par7']!=$_SESSION['ff'])||($_SESSION['par7']=="")){$tt3.="Неверный код с картинки!";}
if (($_SESSION['par0']=="")||(strpos($_SESSION['par0'],'@')==false)){$tt3.="Введите e-mail!";}
if ($_SESSION['par1']==""){$tt3.="Введите имя!";}

if ($_SESSION['dos']!="1"){
if ($_SESSION['par3']==""){$tt3.="Введите город доставки!";}
if ($_SESSION['par4']==""){$tt3.="Введите адрес доставки!";}
}

$_SESSION['err']=$tt3;

if ($tt3==""){HEADER('LOCATION: rbk.php');}else{HEADER('LOCATION: bin.php');}
}
?>