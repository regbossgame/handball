<?

echo "<div class=\"tov3\">

<div class=\"top3\"></div>

<div class=\"zag3\">

<h1><img src='res/top1/accept.png' width=15px/> $tyk</h1>

</div>

<div class=\"cont3\" style=\"padding:5px;\">\n";

$id0="";

if ($_GET['id']!=""){
	$id0=$_GET['id'];
	//$id=$id0;
	$sql="SELECT * FROM koma WHERE id LIKE '$id0'";
	$result = @mysql_query($sql,$db);
	
	$i=0;
	$name= @mysql_result($result, $i, "name");
	$txt = @mysql_result($result, $i, "txt");
	$tt="<ul>";
	$tt2=$tt."<li>Имя: <input type='text' value='".$name."' name='name' style='width:270px;'/></li>\n";

	

	for($i5=0;$i5<count($np);$i5++){
		$par[$i5]=@mysql_result($result, $i, $np[$i5]);

if (($i5==(count($np)-1))&&($par[$i5]==0)){
		$sql2="SELECT por FROM koma ORDER BY por DESC LIMIT 1";
		$result2 = @mysql_query($sql2,$db);
	
	
	$t5= @mysql_result($result2, 0, "por");
	$par[$i5]=round($t5/10)*10+10;
	//$par[$i5]=$np[$i5];
	}
		
		if (($par[$i5]!="0")&&($par[$i5]!="")||($enadm>0)){
		if ($i5<(count($np)-1)){$tt.="<li>".$nr[$i5].": <b>".$par[$i5]."</b></li>";}
		$tt2.="<li>".$nr[$i5].": <input type='text' value='".$par[$i5]."' name='".$np[$i5]."' style='width:240px;'/></li>\n";
		}
	}
	$tt.="</ul>";
	$tt2.="</ul>";

	
	
	$txt=str_replace("\'","'",$txt);

	
	
	$fn="upload/".$id0;
	$img="res/nofoto.jpg";
	if (file_exists($fn.".jpg")){$img=$fn.".jpg";}
	if (file_exists($fn.".JPG")){$img=$fn.".JPG";}
	
	if ($enadm>0){echo "<br><span onmousedown=\"delka('koma','$id0');\" style='color:#FF0000;cursor:pointer;'><b>УДАЛИТЬ</b></span><form action='edit2.php' enctype='multipart/form-data' method='POST'>";
	$tt=$tt2;
	$txt="<input type='hidden' name='MAX_FILE_SIZE' value='9990000'>
	<font class='txtc'>Загрузить<br>фотографию:</font>
	<br><input name='userfile' type='file'\">
	<textarea style='height:350px;width:750px;' name='txt' id='txt1'>$txt</textarea>";}
	
	echo "<div style='padding:1px;margin:1px;'>
  	<div class='set'>";
	
	echo "<p style='text-align:justify;'>\n";
	
	echo "<a href='$img' rel=\"lightbox[plants]\"><img src='$img' width=400px border=1 style='float:left;margin:5px;border:1px slild $000000'></a>".$tt."<br>".$txt;
	
	echo "</p>\n";
	
	echo "</div></div>";
	
	if ($enadm>0){echo "<input type='hidden' name='id' value='".$id0."'/><br><br><input type='submit' name='sub1'style='width:100px;height:30px;' value='Сохранить'/>
	<input type='submit' name='sub2' style='width:160px;height:30px;' value='Сохранить как новое'/><br><br></form>";}
	
	/*
	
	echo "<center><h1>$name</h1>".$mat."<br><span style='font-size:7pt;'>".date('d.m.Y',$treg)."</span><br><div style='width:760px;'>$opis</div><br>\n";
	
	if ($enadm>0){echo "<br><span onmousedown=\"delka('koma','$id0');\" style='color:#FF0000;cursor:pointer;'><b>УДАЛИТЬ</b></span><br><br><form action='edit1.php' method='POST'>\n
Название: <input type='text' value='$name' name='name' style='width:250px;background-color:#54FF54;'/><br>
<b>Код видео:</b> <textarea style='height:90px;width:750px;background-color:#FFFF54;' name='txt'>$mat</textarea><br>
Описание: <textarea style='height:350px;width:750px;' name='opis' id='txt1'>$opis</textarea>
<input type='hidden' name='id' value='".$id0."'/><br>
<br><input type='submit' name='sub1'style='width:100px;height:30px;' value='Сохранить'/>
<input type='submit' name='sub2' style='width:160px;height:30px;' value='Сохранить как новое'/><br><br></form>";}
	
	
	echo "<hr><br></center>\n";
	*/
	
	
	
}




$sql="SELECT * FROM koma ORDER BY treg ASC";

if ($_GET['id']!=""){
	$id0=$_GET['id'];
	$sql="SELECT * FROM koma WHERE id NOT LIKE '$id0' ORDER BY por ASC";
}



        $result = @mysql_query($sql,$db);
        $k=@mysql_num_rows($result);
		
		if (($k==0)&&($id0=="")){echo "<center><h1>Нет новых видео</h1></center>\n";}
		
echo "<table border=0 width=765px>";
if ($id0!=""){echo "<tr><td colspan=3><br><br><hr>Команда:<br></td></tr>";}
echo "<tr><td colspan=3></td>";
	
for($i=0;$i<$k;$i++){
	$id = @mysql_result($result, $i, "id");
	$name= @mysql_result($result, $i, "name");
	$txt = @mysql_result($result, $i, "txt");

		$tt="";
		for($i5=0;$i5<2;$i5++){
		$par[$i5]=@mysql_result($result, $i, $np[$i5]);
		if (($par[$i5]!="0")&&($par[$i5]!="")){
		$tt.="".$par[$i5]."</br>";
		}
	}
	
	
	$fn="upload/".$id;
	$img="res/nofoto.jpg";
	if (file_exists($fn.".jpg")){$img=$fn.".jpg";}
	if (file_exists($fn.".JPG")){$img=$fn.".JPG";}
	
	
	$mat="<img src='$img' width=220px border=1 style='margin:1px;'>";
	
if (($i%3)==0){echo "</tr><tr align='center' valign='top' height=300px>\n";}
	
echo "<td title='".strip_tags(obrez($opis,120))."'><a href='komanda.php?id=$id'><span style='font-size:9pt;'>$name</span> $mat <br><span style='font-size:8pt;'>".$tt."</span></a><br>";

if ($enadm>0){echo "<span onmousedown=\"delka('koma','$id');\" style='font-size:9pt;color:#FF0000;cursor:pointer;'>[удалить]</span>";}

echo "<br></td>\n";	


	
	}
	
	
echo "</tr></table>\n";
if ($enadm>0){
//include "genid2.php";
	echo "<br><b><a href='komanda.php?id=new'>Создать Новое</a></b><br><br><hr><br>";
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

