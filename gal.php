<?

$album=$_GET['album'];

if ($album!=""){

echo "<div class=\"tov3\">

<div class=\"top3\"></div>

<div class=\"zag3\">

<h1><img src='res/top1/accept.png' width=15px/> Галерея клуба «ФАКЕЛ»</h1>

</div>

<div class=\"cont3\" style=\"padding:5px;\">\n";
?>
<a href='galery.php'>К другим альбомам</a><br>

<?
 if ($enadm>0){
 $modif=$sPath."/".$album;
 echo "<form enctype='multipart/form-data' action='upload1.php' method='post'>
<input type='hidden' name='MAX_FILE_SIZE' value='9990000'>
<input type='hidden' name='mod' value='".$modif."'>
<font class='txtc'>Загрузить<br>фотографию:</font>
<br><input name='userfile' type='file'\">
<input type='submit' value='Загрузить'>
</form>\n<br><br>";
 }
?>

<div style='padding:1px;margin:1px;'>
  	<div class="set">
 
<?
$slides=getfiles($sPath."/".$album);
$kslides=count($slides);
if ($kslides>0){
for($i=0;$i<$kslides;$i++){
		 echo "<a href=\"".$sPath."/".$album."/".$slides[$i]."\" rel=\"lightbox[plants]\"><img src=\"".$sPath."/".$album."/".$slides[$i]."\" width=250px height=180px \" /></a>\n"; 
		 if ($enadm>0){echo "<-<a href='#' onmousedown=\"delka2('".$album."','".$slides[$i]."');\">[удалить]</a> . . . . . .";}

}

}
?>

 
  
  	</div>
  </div>
<a href='galery.php'>К другим альбомам</a><br>

<div style="text-align: center;"></div>
<div id="vk_comments" style="padding:3px;"></div>
<script type="text/javascript">
VK.Widgets.Comments("vk_comments", {limit: 15, width: "765", attach: "*"});
</script>

<?

echo "</div>

<div class=\"down3\"></div>

</div>";
}else{
echo "<div class=\"tov3\">

<div class=\"top3\"></div>

<div class=\"zag3\">

<h1><img src='res/top1/accept.png' width=15px/> Галерея клуба «ФАКЕЛ» / Альбомы</h1>

</div>

<div class=\"cont3\" style=\"padding:5px;\"><br>\n";

echo "<table border=0 width=765px>
<tr><td colspan=4></td>";
$i=-1;
$dir = opendir($sPath);
while($file = readdir($dir)) {
   if (is_dir($sPath.'/'.$file) && $file != '.' && $file != '..') {
   $i++;
if (($i%4)==0){echo "</tr><tr align='center'>\n";} 
	$name=getaln($sPath."/".$file);
	$tt2="";
	if ($enadm>0){$tt2="<form action='edit_album.php' method='POST'><input type='text' value='".$name."' name='name'/><input type='hidden' value='".$sPath."/".$file."' name='path'/><br><input type='submit' name='sub1' value='Сохранить'/></form>";$name="";}

	echo "<td valign=bottom>$tt2<a href='galery.php?album=$file'><b style='font-size:10pt;'>".$name."</b><br><img src='".getfirst($sPath."/".$file)."' border=1 class='vida' width=175px height=120px/><br><br><br>";
	if ($enadm>0){echo "<a href='#' onmousedown=\"delka3('".$sPath."/".$file."');\">[удалить]</a><br>";}
	   echo "</td>\n";
	   
   }
}

echo "</tr></table>\n";


if ($enadm>0){echo "Создать новый: <form action='edit_album.php?new=1' method='POST'><input type='text' value='".$name."' name='name'/><input type='hidden' value='".$sPath."' name='path'/><br><input type='submit' name='sub1' value='Сохранить'/></form>";}


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
}
?>