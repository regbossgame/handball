<?
$id=$_GET['vidid'];

$sql="SELECT name,stat FROM talk WHERE id LIKE '$id'";
$result = @mysql_query("$sql",$db);
$k=@mysql_num_rows($result);
if ($k>0){
	$stat=@mysql_result($result, 0,"stat");
	$name=@mysql_result($result, 0,"name");

	echo "<center><h3>$name, это первое видео!</h3>";
	echo '<iframe width="780" height="434" src="http://www.youtube.com/embed/Sv9lmKBoLIU?feature=player_embedded" frameborder="0" allowfullscreen></iframe>';
	echo "</center>";
}else{echo "—сылка устарела!";}
?>