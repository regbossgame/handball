<?
$sql22="SELECT name,str FROM cat WHERE id LIKE '$s0'";
$result22 = @mysql_query("$sql22",$db);
//$k=@mysql_num_rows($result);
$n0=@mysql_result($result22, 0,"name");
$str0=@mysql_result($result22, 0,"str");
if ($n0<>""){$n0="<a href='catalog.php?scat=$str0'>".$n0."</a> / ";}

?>