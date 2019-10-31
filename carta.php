<?
$ids=$_GET['name'];


$sql="SELECT * FROM tov WHERE str LIKE '$ids'";
$result = @mysql_query("$sql",$db);

$i=0;

	$id1=@mysql_result($result, $i,"id");
	$fotos=@mysql_result($result, $i,"fotos");
	$name=@mysql_result($result, $i,"name");
	$tit=@mysql_result($result, $i,"title");
	
	$catid=@mysql_result($result, $i,"catid");
	
	$zen=@mysql_result($result, $i,"zen");
	
	$zenz=@mysql_result($result, $i,"zenz");
	$str=@mysql_result($result, $i,"str");
	$kolo=@mysql_result($result, $i,"kol");
$zen0=$zen;
$zenz0=$zenz;
include "zen.php";
$zen=$zen0;
$zenz=$zenz0;

	
	$fts=array();
	
	if ($fotos<>''){
	$fts=explode("*",$fotos);
	$img=$fts[0];
	
	}else{$img="catalog/nofoto.jpg";}

echo "<div class=\"tov3\">
<div class=\"top3\"></div>
<div class=\"zag3\">
<h1 title='".$tit."'><img src='res/top1/accept.png' width=15px/> $name</h1>
</div>
<div class=\"cont3\">";

$vkor="";//"<div class='vkor'>Заказать<input type='text' style='width:33px;' value='1' maxlength=4 id='inp_".$id1."'/><div class='kor2' onclick=\"fires('".$id1."',0);makeRequest22('add_kor.php?id=".$id1."&kol='+document.getElementById('inp_".$id1."').value,'0');\"></div></div><br><br>";

echo "<table border=0 width=775px height=400px><tr style='vertical-align:top;'><td width=400px><img src='".$img."' border=1 width=400px id='galko1' style='margin:10px;border-color:#dbeaf2;'/>
</td><td>";
//<h3>Код объекта: $id1</h3><br> 
$fn6="catalog/txt/".$str."_cat.txt";
$fn5="catalog/txt/".$id1."_tov.txt";
if (file_exists($fn5)){$te5=file_get_contents($fn5);}
if (file_exists($fn6)){$te4=file_get_contents($fn6);}

if (($enadm==0)&&($te5=="")){$te5=$te4;}//else{$te5=file_put_contents($fn6,"");}

if ($enadm==0){echo $te5;}else{
echo "<form action=edit_opis.php method='POST'>
<input type='hidden' name='fn1' value='$fn6'/>
<hr>
<h3>Описание</h3>
<textarea name='txt1' style='width:300px;height:300px;'>$te4</textarea>
<input type='submit' value='Сохранить'/>
</form>";


}$tx0=file_get_contents("txt/Informatsiya-o-dostavke_str.php");echo $tx0;if ($kolo<=0){$kolo="<br><font color='#DD5555' size=2>На данный момент, нет в наличии.</font>";$vkor="";}else{$kolo="";}echo $kolo;
//echo "<br>цена: <span class='zen'>$zen</span> руб. $vkorecho "</td></tr></table>";


	if ($enadm>=1){
	$modif="fotos";
	echo "<br><br><div onmousedown=\"delka2('img','".$id1."','0');\" style='cursor:pointer;'><font size=2 color='#AA1212'>удалить картинку</font></div>";
echo "<form enctype='multipart/form-data' action='upload1.php' method='post'>
<input type='hidden' name='MAX_FILE_SIZE' value='9990000'>
<input type='hidden' name='mod' value='".$modif."'>
<input type='hidden' name='id' value='".$id1."'>
<font class='txtc'>Загрузить<br>фотографию:</font>
<br><input name='userfile' type='file'\">
<input type='submit' value='Загрузить'>
</form>\n";

}

	if (count($fts)>1){
	echo "\n";
	echo "<div style='width:400px;'>\n";
	$j9=count($fts);
//	$fts[$j9]=array();
	$fts[$j9]=$fts[0];
	 
	for ($j=1;$j<$j9+1;$j++){
		//$fts[$j]=array();
		$fts[$j]=explode('>',$fts[$j]);
		$modf="img/m2/";
		$xer="gal('".$fts[$j][0]."',$j);";
		$modf="";
		
		if ($enadm>=1){
		$xer="self.location='setimg.php?id=$id1&im=".$j."'";
		if ($j==$j9){$xer="";}
		}

		//echo "<td>";
	if ($enadm>=1){
		if ($j!=$j9){
			echo "<span onmousedown=\"delka2('img','".$id1."','".$j."');\" style='cursor:pointer;'><font size=2 color='#AA1212'>удалить-></font></span>";
		}else{
			//echo "<div><font size=2>.</font></div>";
		}
	}
		
		echo "<img src='".$fts[$j][0]."' alt='".$fts[$j][1]."' title='".$fts[$j][1]."' height=80px width=106px border=1 onmousedown=\"".$xer."\" style='cursor:pointer;' onmouseout=hd2(this); onmouseover=sh2(this);>";
	//if ($adminka==41){
	//}
	echo "\n";
	}
	
	echo "</div>\n";
	

	}


echo "</div>
<div class=\"down3\"></div>
</div>";
/*
<br>
	
echo "<div class='tov2'>
<div class='top2'></div>
<div class='cont2'>";

echo "<a href='cart.php?str=$str'><div style='height:60px;'><h3>".$name."</h3></div><img src='".$img."' width=160px height=160px/></a><br><span class='zen'>$zen</span>руб.";

echo "</div>
<div class='down2'></div>
</div>";
*/

if ($_SESSION['tov_'.$id1]==""){
$_SESSION['tov_'.$id1]="1";

$sql2 = "UPDATE tov SET statp=statp+1 WHERE id LIKE '$id1'";
$result2 = @mysql_query("$sql2",$db);//echo $result2*1;

}$sql="SELECT fotos,name,zen,str,zenz,id,kol FROM tov WHERE catid LIKE '$catid' AND (zen>0 OR zenz>0) AND (id NOT LIKE '$id1') AND (kol<>0) ORDER BY statp,stat DESC LIMIT 4";$result = @mysql_query("$sql",$db);$k=@mysql_num_rows($result);//$kolo="1";

if ($k>0){echo "<div class=\"tov3\">
<div class=\"top3\"></div>
<div class=\"zag3\">
<h1 title='".$tit."'><img src='res/top1/accept.png' width=15px/> Покупают так же</h1>
</div>
<div class=\"cont3\"><br>";



include "price.php";



echo "\n<div style='height:300px;width:1px;'></div>\n</div>
<div class=\"down3\"></div>
</div>";
}
//echo "<h1>|".$cat."</h1>";

//echo $k;
?>