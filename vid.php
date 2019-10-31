<?

echo "<div class=\"tov3\">

<div class=\"top3\"></div>

<div class=\"zag3\">

<h1><img src='res/top1/accept.png' width=15px/> Видео ".$tyk."</h1>

</div>

<div class=\"cont3\" style=\"padding:5px;\">\n";

$id0="";

if ($_GET['id']!=""){
	$id0=$_GET['id'];
	$sql="SELECT * FROM video WHERE id LIKE '$id0'";
	$result = @mysql_query($sql,$db);
	
	$i=0;
	$name= @mysql_result($result, $i, "name");
	$mat = @mysql_result($result, $i, "txt");
	$treg = @mysql_result($result, $i, "treg");
	$opis = @mysql_result($result, $i, "opis");
	
	$opis=str_replace("\'","'",$opis);
	//$mat="<img src='res/pom.gif' width=640px height=480px/>";
	

$i=strpos($mat,"width=");
if ($i>0){

$j=$i+6;
$t="";
while ((substr($mat,$j,1)!=" ")&&(substr($mat,$j,1)!=">")&&($j<($i+30))){
$t.=substr($mat,$j,1);
$j++;
}

if (($j-$i)<20){$mat=str_replace("width=".$t,'width="646"',$mat);}
}

$i=strpos($mat,"height=");
if ($i>0){

$j=$i+7;
$t="";
while ((substr($mat,$j,1)!=" ")&&(substr($mat,$j,1)!=">")&&($j<($i+30))){
$t.=substr($mat,$j,1);
$j++;
}
//echo "|".$t."|";
if (($j-$i)<20){$mat=str_replace("height=".$t,'height="362"',$mat);}

}


///////////1111

$i=strpos($mat,"WIDTH=");
if ($i>0){

$j=$i+6;
$t="";
while ((substr($mat,$j,1)!=" ")&&(substr($mat,$j,1)!=">")&&($j<($i+30))){
$t.=substr($mat,$j,1);
$j++;
}
//echo "|".$t."|";
if (($j-$i)<20){$mat=str_replace("WIDTH=".$t,'WIDTH="646"',$mat);}
}

$i=strpos($mat,"HEIGHT=");
if ($i>0){

$j=$i+7;
$t="";
while ((substr($mat,$j,1)!=" ")&&(substr($mat,$j,1)!=">")&&($j<($i+30))){
$t.=substr($mat,$j,1);
$j++;
}
//echo "|".$t."|";
if (($j-$i)<20){$mat=str_replace("HEIGHT=".$t,'HEIGHT="362"',$mat);}

}
	
	
	
	echo "<center><h1>$name</h1>".$mat."<br><span style='font-size:7pt;'>".date('d.m.Y',$treg)."</span><br><div style='width:760px;'>$opis</div><br>\n";
	
	if ($enadm>0){echo "<br><span onmousedown=\"delka('video','$id0');\" style='color:#FF0000;cursor:pointer;'><b>УДАЛИТЬ</b></span><br><br><form action='edit1.php' method='POST'>\n
Название: <input type='text' value='$name' name='name' style='width:250px;background-color:#54FF54;'/><br>
<b>Код видео:</b> <textarea style='height:90px;width:750px;background-color:#FFFF54;' name='txt'>$mat</textarea><br>
Описание: <textarea style='height:350px;width:750px;' name='opis' id='txt1'>$opis</textarea>
<input type='hidden' name='id' value='".$id0."'/><br>
<br><input type='submit' name='sub1'style='width:100px;height:30px;' value='Сохранить'/>
<input type='submit' name='sub2' style='width:160px;height:30px;' value='Сохранить как новое'/><br><br></form>";}
	
	
	echo "<hr><br></center>\n";
	
	
	
	
}




$sql="SELECT * FROM video ORDER BY treg DESC";

if ($_GET['id']!=""){
	$id0=$_GET['id'];
	$sql="SELECT * FROM video WHERE id NOT LIKE '$id0' ORDER BY treg DESC";
}



        $result = @mysql_query($sql,$db);
        $k=@mysql_num_rows($result);
		
		if (($k==0)&&($id0=="")){echo "<center><h1>Нет новых видео</h1></center>\n";}
		
echo "<table border=0 width=765px>
<tr><td colspan=4></td>";
	
for($i=0;$i<$k;$i++){
	$id = @mysql_result($result, $i, "id");
	$name= @mysql_result($result, $i, "name");
	$mat = @mysql_result($result, $i, "txt");
	$treg = @mysql_result($result, $i, "treg");
	$opis = @mysql_result($result, $i, "opis");
	
	$wh="width=175px height=110px";
	include "prew.php";

	$mat=$t12;
	
	$mat=str_replace("width=","class='vida' width=",$mat);
	
if (($i%4)==0){echo "</tr><tr align='center'>\n";}
	
echo "<td width=191px valign='bottom' title='".strip_tags(obrez($opis,120))."'><a href='video.php?id=$id'><span style='font-size:9pt;'>$name</span> $mat <br><span style='font-size:7pt;'>".date('d.m.Y',$treg)."</span></a><br><br>";

if ($enadm>0){echo "<span onmousedown=\"delka('video','$id');\" style='font-size:9pt;color:#FF0000;cursor:pointer;'>[удалить]</span>";}

echo "</td>\n";	


	
	}
	
	
echo "</tr></table>\n";
if ($enadm>0){
//include "genid2.php";
	echo "<br><b><a href='video.php?id=new'>Создать Новое</a></b><br><br><hr><br>";
}
?>
<br>
<div style="text-align: center;"></div>
<div id="vk_comments" style="padding:3px;"></div>
<script type="text/javascript">
VK.Widgets.Comments("vk_comments", {limit: 15, width: "765", attach: "*"});
</script>
<?

	
echo "</div>

<div class=\"down3\"></div>

</div>";



?>

