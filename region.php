<?
$sql8="SELECT name FROM region";
$result8 = @mysql_query("$sql8",$db);
$k8=@mysql_num_rows($result8);
// onchange=\"makeRequest22('getgor.php?type='+this.value,'1');\"
echo "<select name='par2' style='width:150px;' onchange='this.title=this.value;' title='".$_SESSION['par2']."'>\n";
for($i8=0;$i8<$k8;$i8++){
$name8=rtrim(@mysql_result($result8, $i8,"name"));
//$id8=@mysql_result($result8, $i8,"id");
$tt="";
if ($_SESSION['par2']==$name8){$tt=" selected";}
	echo "<option value='".$name8."'$tt>".$name8."</option>\n";
	
}

echo "</select>\n";
	
?>