<?
include "cook_life.php";

include "conf.php";

include "fire.php";
if ($ok==1){

if ((isset($_SESSION["log"]))&&($_SESSION['adm']>0)){
if ($_GET['id']!=""){echo "<a href='adm_zak.php'>������</a> | ";}
echo "<a href='admin.php'>� �������</a> | <a href='$hostname'>�� ����</a>\n";
echo "<h1>������</h1>";

echo "<strong>�������:<br> 1 -> ������ 50�<br> 2 -> ���������<br> 3 -> ������<br> (-1) -> � ���������<br> (-7) -> ������� </strong><br> \n";

echo "<table border=1 cellpadding=10 cellspacing=0>\n";

if ($_GET['desc']=='DESC'){$desc='ASC';}else{$desc="DESC";}

echo "<tr><td><a href='adm_zak.php?sort=id&desc=".$desc."'>� ������</a></td><td><a href='adm_zak.php?sort=log&desc=".$desc."'>E-mail</a></td><td><a href='adm_zak.php?sort=kol&desc=".$desc."'>���-��</a></td><td><a href='adm_zak.php?sort=zenz&desc=".$desc."'>���� �������</a></td><td><a href='adm_zak.php?sort=zen&desc=".$desc."'>���� �������</a></td><td><a href='adm_zak.php?sort=zent&desc=".$desc."'>���� ����</a></td><td>����� (�� ����)</td><td><a href='adm_zak.php?sort=treg&desc=".$desc."'>����</a></td><td><a href='adm_zak.php?sort=stat&desc=".$desc."'>������</a></td></tr>\n";


$sort=" ORDER BY treg DESC";
if ($_GET['sort']!=""){$sort=" ORDER BY ".$_GET['sort']." ".$_GET['desc'];}

if ($_GET['id']!=""){

echo "<a href='adm_zak.php'>����� � ������</a>";
$sql="SELECT * FROM zak WHERE id LIKE '".$_GET['id']."'";
$result = @mysql_query("$sql",$db);

$i=0;
	$id=@mysql_result($result, $i,"id");
	$log=@mysql_result($result, $i,"log");
	$kol=@mysql_result($result, $i,"kol");
	$zen=@mysql_result($result, $i,"zen");
	$zenz=@mysql_result($result, $i,"zenz");
	$zent=@mysql_result($result, $i,"zent");
	
	$msg=@mysql_result($result, $i,"msg");
	$pers=@mysql_result($result, $i,"pers");
	
	$treg=@mysql_result($result, $i,"treg");

	$stat=@mysql_result($result, $i,"stat");
	
	$check=@mysql_result($result, $i,"chek");
	
	$navar=$zent-$zen;
	
	echo "<tr align='center'><td><a href='adm_zak.php?id=$id'>".$id."</a></td><td>".$log."</td><td>".$kol."</td><td>".$zenz."</td><td>".$zen."</td><td>".$zent."</td><td>".$navar."</td><td>".date('d-m-Y H:i',$treg)."</td>
	<td>[".$stat."] | <a href='set_zak.php?id=".$id."&stat=1'>1</a> | <a href='set_zak.php?id=".$id."&stat=2'>2</a> | <a href='set_zak.php?id=".$id."&stat=3'>3</a> | <a href='set_zak.php?id=".$id."&stat=-1'>-1</a> | <a href='set_zak.php?id=".$id."&stat=-7'>-7</a></td></tr>\n";
	echo "<tr valign='top'><td colspan=5>".$msg."</td><td colspan=4>".$pers."</td></tr>\n";

	echo "<tr><td colspan=9><a href='print.php?bd=zak&id=".$id."' target='_balnk'>������</a><br><div style='border:1px solid;'>".$check."</div></td></tr>\n";
	
echo "</table>\n";


}else{

$sql="SELECT * FROM zak".$sort;
$result = @mysql_query("$sql",$db);
$k=@mysql_num_rows($result);

for ($i=0;$i<$k;$i++){
	$id=@mysql_result($result, $i,"id");
	$log=@mysql_result($result, $i,"log");
	$kol=@mysql_result($result, $i,"kol");
	$zen=@mysql_result($result, $i,"zen");
	$zenz=@mysql_result($result, $i,"zenz");
	$zent=@mysql_result($result, $i,"zent");
	$treg=@mysql_result($result, $i,"treg");

	$stat=@mysql_result($result, $i,"stat");
	
	$navar=$zent-$zen;
	
	echo "<tr align='center'><td><a href='adm_zak.php?id=$id'>".$id."</a></td><td>".$log."</td><td>".$kol."</td><td>".$zenz."</td><td>".$zen."</td><td>".$zent."</td><td>".$navar."</td><td>".date('d-m-Y H:i',$treg)."</td>
	<td>[".$stat."] | <a href='set_zak.php?id=".$id."&stat=1'>1</a> | <a href='set_zak.php?id=".$id."&stat=2'>2</a> | <a href='set_zak.php?id=".$id."&stat=3'>3</a> | <a href='set_zak.php?id=".$id."&stat=-1'>-1</a> | <a href='set_zak.php?id=".$id."&stat=-7'>-7</a></td></tr>\n";

}
echo "</table>\n";


}
}else{echo "�� �����!";}
}

//include "delka.php";

?>