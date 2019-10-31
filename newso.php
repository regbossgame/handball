<?
$tt7="Новости";
if ($_GET['id']!=""){
//$sql="SELECT treg FROM news WHERE id LIKE '".$_GET['id']."'";
//$result = @mysql_query("$sql",$db);

$tt7="Новость от ".date('d.m.Y', $tyk);}
echo "<div class=\"tov3\">
<div class=\"top3\"></div>
<div class=\"zag3\">
<h1><img src='res/top1/accept.png' width=15px/> $tt7</h1>
</div>
<div class=\"cont3\">";

//echo "<table class='bintab' border=1 cellpadding=10 cellspacing=0>\n";
echo "<ul>\n";

//if ($_GET['desc']=='DESC'){$desc='ASC';}else{$desc="DESC";}

//if ($_GET['id']==""){echo "<tr><td class='tdb'><a href='history.php?sort=id&desc=".$desc."'>№ заказа</a></td><td class='tdb'><a href='history.php?sort=log&desc=".$desc."'>E-mail</a></td><td class='tdb'><a href='history.php?sort=kol&desc=".$desc."'>Кол-во</a></td><td class='tdb'><a href='history.php?sort=zent&desc=".$desc."'>Цена руб.</a></td><td class='tdb'><a href='history.php?sort=treg&desc=".$desc."'>Дата</a></td><td class='tdb'><a href='history.php?sort=stat&desc=".$desc."'>Статус</a></td></tr>\n";}

if ($_GET['lim']==""){$lim=" LIMIT 100";}else{$lim="";}

$sort=" ORDER BY treg DESC".$lim;
if ($_GET['sort']!=""){$sort=" ORDER BY ".$_GET['sort']." ".$_GET['desc'].$lim;}

if ($_GET['id']!=""){


$sql="SELECT * FROM news WHERE id LIKE '".$_GET['id']."'";
$result = @mysql_query("$sql",$db);

$i=0;
	$id=@mysql_result($result, $i,"id");
	$treg=@mysql_result($result, $i,"treg");
	$txt=@mysql_result($result, $i,"txt");
	
	$txt=str_replace("\'","'",$txt);

if ($enadm==0){echo $txt;}else{
echo "<form action='edit_news.php' method='POST'>\n";
echo "<textarea style='height:400px;width:780px;' name='txt1' id='txt1'>$txt</textarea>\n";
echo "<input type='hidden' name='id' value='$id'/>\n";

echo "<br><input type='submit' name='sub1' value='Сохранить'/>\n";
echo "<input type='submit' name='sub2' value='Сохранить как новое'/>\n
<a href='#' onmousedown=\"delka('news','$id');\">[удалить]</a>";

echo "</form>";

}

	
	//echo "<tr><td colspan=9><a href='print.php?bd=zak&id=".$id."' target='_balnk'>ПЕЧАТЬ</a><br><div style='border:1px solid;'>".$check."</div></td></tr>\n";
	
//echo "</table>\n";

echo "<p><a href='news.php'>назад к списку</a></p>";

}else{

$sql="SELECT * FROM news".$sort;
$result = @mysql_query("$sql",$db);
$k=@mysql_num_rows($result);

for ($i=0;$i<$k;$i++){
	$id=@mysql_result($result, $i,"id");
	$treg=@mysql_result($result, $i,"treg");
	$txt=@mysql_result($result, $i,"txt");
	
	$txt=str_replace("\'","'",$txt);
	
//echo "<div style='width:450px;'>$txt</div>";	
echo "<li>";
if ($enadm!=0){echo "<a href='#' onmousedown=\"delka('news','$id');\">[удалить]</a>";}

$txt=strip_tags($txt);
echo "<a href='news.php?id=$id' title='Читать новость целиком'>[".date('d.m.Y', $treg)."] ".obrez($txt,90)."</a></li>\n";	

}


if ($enadm!=0){echo "<br><a href='edit_news.php?id=-1'>Создать новость</a>";}

//echo "<tr><td colspan='6'><p><a href='history.php?sort=".$_GET['sort']."&desc=".$_GET['desc']."&lim=1'>показать весь список</a></p><br></td></tr>";
//echo "</table>\n";



}

echo "</ul>";




echo "</div>
<div class=\"down3\"></div>
</div>";