<?

$type="vote";
$i3=rand(0,count($conf[$type])-1);
$i6=0;
//echo "<h1>".count($conf[$type])."|$i3</h1>";
/*
for($i2=0;$i2<100;$i2++){
	$_SESSION['opr_'.$i2]="";
}
	
	$_SESSION['opros']="";
*/

if ($_SESSION['opros']!=""){$i6=1000;$i3=$_SESSION['opros'];}


while (($_SESSION['opr_'.$i3]!="")&&($i6<50)){
	$i3=rand(0,count($conf[$type])-1);
	$i6++;
}

//echo "<h1>$i3</h1>";

$_SESSION['opros']="";

if ($_SESSION['opr_'.$i3]==""){

echo "<div style='text-align:center;'>
<form action='set_vote.php' method='POST'>\n";
echo "<h2>".$conf[$type][$i3]['name']."</h2>\n";


echo "<p><ul style='text-align:left;'>\n";
for($j3=1;$j3<=10;$j3++){
if ($conf[$type][$i3]['str'.$j3]!=''){echo "<li><input type='radio' name='str' value='".$j3."'/> ".$conf[$type][$i3]['str'.$j3]."</li>\n";};
}
echo "</ul></p>\n";

echo "<input type='submit'/ value='Отправить' class='subm2' style='margin:5px;'>
<input type='hidden' name='opr' value='".$i3."'/></form>
<br><a href=''>Другой...</a>
</div>";
}else{

echo "<div style='text-align:left;margin:5px;'>\n";
echo "<h2>Результат: ".$conf[$type][$i3]['name']."</h2>\n";

$ko1=0;
for($j3=1;$j3<=10;$j3++){
	$ko1+=($conf[$type][$i3]['kol'.$j3]*1);
}
if ($ko1==0){$ko1=1;}

echo "<p>";
for($j3=1;$j3<=10;$j3++){
	if ($conf[$type][$i3]['str'.$j3]!=''){
	$r6=round((($conf[$type][$i3]['kol'.$j3]*1)/$ko1)*100,2);
	echo "<div class='opli' style='width:".round(($r6/100)*260)."px;'></div><div class='opul'>".$conf[$type][$i3]['str'.$j3]." = <b>".$r6."</b> %</div><br>\n";
	}
}
echo "</p>Всего голосовало: <b>$ko1</b><br><a href=''>Другой...</a></div>";

}
?>