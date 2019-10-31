<?
include "cook_life.php";
include "conf.php";

include "fire.php";
//$ok=1;

if ($ok==1){
$i3=$_POST['opr'];
$j3=$_POST['str'];
$type="vote";
//$_SESSION['opr'.$i3.'_str'.$j3]="";

if (($_SESSION['opr_'.$i3]=="")&&($i3!="")&&(($j3*1)!=0)){
if ($conf[$type][$i3]['id']!=""){
$_SESSION['opr_'.$i3]=$j3;
$_SESSION['opros']=$i3;

$conf[$type][$i3]['kol'.$j3]*=1;
$conf[$type][$i3]['kol'.$j3]+=1;

$per="id;name;str1;str2;str3;str4;str5;str6;str7;str8;str9;str10;kol1;kol2;kol3;kol4;kol5;kol6;kol7;kol8;kol9;kol10";
$per.="\n";
for($i1=0;$i1<count($conf[$type]);$i1++){
$per.=$conf[$type][$i1]['id'].";".$conf[$type][$i1]['name'].";";

for($j1=1;$j1<=10;$j1++){
	$per.=$conf[$type][$i1]['str'.$j1].";";
}

for($j1=1;$j1<=10;$j1++){
	$per.=$conf[$type][$i1]['kol'.$j1].";";
}

$per.="\n";

}

file_put_contents("csv/".$type.".csv",$per);

}
}

$ref=$_SERVER['HTTP_REFERER'];
	header("LOCATION: ".$ref."");  

}else{echo "Но, но, но!";}
?>