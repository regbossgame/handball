<?

for($i=0;$i<$k;$i++){
	$id1=@mysql_result($result, $i,"id");
	$fotos=@mysql_result($result, $i,"fotos");
	$name=@mysql_result($result, $i,"name");
	$zen=@mysql_result($result, $i,"zen");
	
	$zenz=@mysql_result($result, $i,"zenz");
	$str=@mysql_result($result, $i,"str");

	$kolo=@mysql_result($result, $i,"kol");
	
$zen0=$zen;
$zenz0=$zenz;
include "zen.php";
$zen=$zen0;
$zenz=$zenz0;
$zent=$zent0;
	
	$fts=array();
	
	if ($fotos<>''){
	$fts=explode("*",$fotos);
	$img=$fts[0];
	
	
	}else{$img="catalog/nofoto.jpg";}
	
	if ($i==0){echo $tt8;}
echo "<div class='tov2'>
<div class='top2'></div>
<div class='cont2'>";

//$vkor="<div class='vkor'><input type='text' style='width:33px;' value='1' maxlength=4 id='inp_".$id1."'/><div class='kor2' onclick=\"fires('".$id1."',0);makeRequest22('add_kor.php?id=".$id1."&kol='+document.getElementById('inp_".$id1."').value,'0');\"></div></div><br><br>";
$vkor="";
$kolo="";
//if ($kolo<=0){$kolo="<font color='#DD5555' size=1> ќжидаетс€!</font><br><br>";$vkor="";}else{$kolo="";}
echo "<a href='cart.php?name=$str'><div style='height:60px;'><h3>".$name."</h3></div><img src='".$img."' width=160px height=160px/></a>";
//<br><span class='zen'>$zen</span>руб.".$vkor;

echo $kolo."</div>
<div class='down2'></div>";
if ($i==($k-1)){echo "<br>".$tt8;}
echo "</div>";
}

?>