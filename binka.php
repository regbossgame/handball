<?

if ($_SESSION['err']!=""){
echo "<h2><span style='color:#DD3333'>Ошибки:<br>".str_replace('!','.<br>',$_SESSION['err'])."</span></h2>";
$_SESSION['err']="";
}


$sql="SELECT id,code,fotos,zent,zen,zenz,name,str,kol FROM kor WHERE seso LIKE '$seso'";
$result = @mysql_query("$sql",$db);
$k=@mysql_num_rows($result);
$per= "<div class=\"tov3\">
<div class=\"top3\"></div>
<div class=\"zag3\">
<h1><img src='res/top1/accept.png' width=15px/> Корзина Вашего заказа</h1>
</div>
<div class=\"cont3\">";


$per.="<table class='bintab'>\n";

$akol=0;
$zeno=0;
$dosz="Бесплатно";

if (($_GET['dos']=="")||($_GET['dos']=="-1")){$_GET['dos']="-1";$dos="-1";}
if (($_GET['dos']*1)==0){$dos="0";$dosz="50.00";}
if ($_GET['dos']==1){$dos="1";}
if ($_GET['dos']==2){$dos="2";}
$tt="Корзина пуста";
if ($_GET['msg']=="ok"){$tt="Ваша заявка принята в обработку!";}
if ($k<=0){$per.="<tr><td style='text-align:center;'><h2><a href='catalog.php'>$tt</a></h2></td></tr>";}else{$per.="<tr class='tdb' style='font-size:0.8em;font-weight:bold;'><td>Фото</td><td>Наименование товара</td><td width=60px>Код</td><td width=160px>Количество</td><td width=70px>Цена (руб)</td><td width=90px>Итого (руб)</td></tr>";}

for($i=0;$i<$k;$i++){


	$id1=@mysql_result($result, $i,"id");
	$code1=@mysql_result($result, $i,"code");
	$fotos=@mysql_result($result, $i,"fotos");
	$name=@mysql_result($result, $i,"name");
	$zent=@mysql_result($result, $i,"zent");
	$zen=@mysql_result($result, $i,"zen");
	$zenz=@mysql_result($result, $i,"zenz");
	$str=@mysql_result($result, $i,"str");
	$kol=@mysql_result($result, $i,"kol");

	$akol+=$kol;
	//$zen2=$zen;

$zen0=$zen;
$zenz0=$zenz;
include "zen.php";
$zen=$zent0;
//$zenz=$zenz0;
//$zent=$zent0;


$zen0=($kol*$zen);

$zeno+=$zen0;
	$zen0=round($zen0,2);
	if (strlen(end(explode(".",$zen0)))==1){$zen0.="0";}
	if (round($zen0)==$zen0){$zen0.=".00";}
//$zenz0=$zen0;
//include "zen.php";
	


	
	$fts=array();
	
	if ($fotos<>''){
	$fts=explode("*",$fotos);
	$img=$fts[0];
	
	
	}else{$img="catalog/nofoto.jpg";}
	
	
	$per.= "<tr>
	<td width=60px class='tdb'>\n";
	
$per.= "<img src='".$hostname."/".$img."' width=60px height=60px/>\n";
	
	$per.= "</td><td class='tdb'>\n";
	
	$per.= "<a href='cart.php?name=".$str."'>".$name."</a>\n";
	
	$per.= "</td><td class='tdb'>\n";
	
	
	$per.= $code1."\n";
	
	
	$per.= "</td><td class='tdb' width=150px>\n";
	
	$vkor="<div style='height:10px;width:100px;clear:both;' title='Установить количество данного товара!'></div><input type='text' style='width:50px;font-size:12pt;' onkeyup=\"usl(".$code1.")\" value='".$kol."' maxlength=5 id='inp_".$code1."'/>
	<div onclick=\"self.location='add_kor.php?id=".$code1."&set=1&kol=0'\" class='kor31'></div>
	<div style='width:10px;height:10px;float:right;border:0px solid'></div>
	<div onclick=\"self.location='add_kor.php?id=".$code1."&set=1&kol='+document.getElementById('inp_".$code1."').value\" class='kor3'></div>";
	
	$per.= $vkor;
	
	$per.= "</td><td class='tdb'>\n";
	
$per.= "$zen\n";

$per.= "</td><td class='tdb'>\n";
	
	$per.= "<span style='color:#008700'>".($zen0)."</span>\n";


$per.= "</td>\n";

$per.= "</tr>\n";
	
/*	
echo "<div class='tov2'>
<div class='top2'></div>
<div class='cont2'>";

$vkor="";//"<div class='vkor'><input type='text' style='width:33px;' value='1' id='inp_".$id1."'/><div class='kor2' onclick=\"makeRequest22('add_kor.php?id=".$id1."&kol='+document.getElementById('inp_".$id1."').value,'0');\"></div></div><br><br>";

echo "<a href='cart.php?name=$str'><div style='height:60px;'><h3>".$name."</h3></div><img src='".$img."' width=160px height=160px/></a><br><span class='zen'>$zent</span>руб.".$vkor;

echo "</div>
<div class='down2'></div>
</div>";
*/

}
	
	$zeno+=($dosz*1);
	
	$zeno=round($zeno,2);
	if (strlen(end(explode(".",$zeno)))==1){$zeno.="0";}
	if (round($zeno)==$zeno){$zeno.=".00";}
	
if ($k<=0){

}else{
$per.="<tr><td colspan=6 class='tdb'><br></td></tr>\n";

$per.="<tr><td colspan=3 class='tdb' >Доставка 
<select onchange=\"self.location='bin.php?dos='+this.value\"";

if ($dos=="-1"){$per.=" style='background:#FFBBBB;'";}

$per.=">\n";
$t34="style='background:#DFEFFF;'";
if ($dos=="-1"){$tt=" selected";$dost="Не выбрана";}else{$tt="";}
$per.= "<option value='-1'$tt>Выберите вариант доставки</option>\n";

if ($dos=="0"){$tt=" selected";$dost="Курьером";}else{$tt="";}
$per.= "<option value='0'$tt $t34>Курьером (Таганрог) «50 рублей»</option>\n";
if ($dos=="1"){$tt=" selected";$dost="Самовывоз";}else{$tt="";}
$per.= "<option value='1'$tt $t34>Самовывоз (Из Таганрога) «бесплатно»</option>\n";
if ($dos=="2"){$tt=" selected";$dost="Почтой";}else{$tt="";}
$per.= "<option value='2'$tt $t34>Почтой (Россия и СНГ) «при получении»</option>\n";
$per.= "</select>
</td><td class='tdb'></td><td></td><td class='tdb'><span style='color:#008700'>".$dosz."</span></td></tr>\n";


$per.="<tr><td colspan=3 class='tdb'>
</td><td class='tdb'><strong>$akol</strong></td><td></td><td class='tdb'><span style='color:#008700'><strong>$zeno</strong></span></td></tr>";
}
$per.= "</table>\n";

$per.="</div>
<div class=\"down3\"></div>
</div>";


$_SESSION['dos']=$dos;
$_SESSION['dost']=$dost;
$_SESSION['dosz']=$dosz;
$_SESSION['zena']=$zeno;

//$_SESSION['mail']="to363999@mail.ru";

echo $per;



if ($k>0){
$tt6=$_SESSION['log'];
if ($tt6==""){$tt6=$_SESSION['par0'];}
echo "<br>
	<a href='clear_bin.php'><input type='button' class='subm2' value='Отчистить корзину'/></a><br>";
	
		
	echo "<div class=\"tov1\" style='clear:none;margin-left:250px;'>
<div class=\"top1\"></div>
<div class=\"zag1\">
<h1 title='Выберите вид доставки'><img src='res/top1/accept.png' width=15px/> Вид доставки</h1>
</div>
<div class=\"cont1\" style=\"padding:5px;\">\n";
	
	echo "<table border=0>
	<tr>	
	<td width=90px>
	Доставка 
	</td><td>
	<select onchange=\"self.location='bin.php?dos='+this.value\"";
	
	if ($dos=="-1"){echo " style='background:#FFBBBB;'";}
	
	echo ">\n";
$t34="style='background:#DFEFFF;'";
if ($dos=="-1"){$tt=" selected";$dost="Не выбрана";}else{$tt="";}
echo "<option value='-1'$tt>Выберите доставку</option>\n";

if ($dos=="0"){$tt=" selected";$dost="Курьером";}else{$tt="";}
echo "<option value='0'$tt $t34>Курьером (Таганрог)</option>\n";
if ($dos=="1"){$tt=" selected";$dost="Самовывоз";}else{$tt="";}
echo "<option value='1'$tt $t34>Самовывоз (Таганрог)</option>\n";
if ($dos=="2"){$tt=" selected";$dost="Почтой";}else{$tt="";}
echo "<option value='2'$tt $t34>Почтой (Россия и СНГ)</option>\n";
echo "</select></td></tr>
<tr><td colspan=2 height=10px><div class='line2'></div></td></tr>
</table>\n";
echo "<div style='text-align:justify;'>* Если не один из вариантов Вам не подходит, оставьте комментарий в конце заявки<br> (перед кодом с картинки).</div>";
echo "</div>
<div class=\"down1\"></div>
</div><br>";
		
	echo "<div class=\"tov1\" style='clear:none;margin-left:250px;";
	if ($dos=="-1"){echo "display:none;";}
	echo"'>
<div class=\"top1\"></div>
<div class=\"zag1\">
<h1 title='Введите контактные данные для доставки'><img src='res/top1/accept.png' width=15px/> Контактные данные</h1>
</div>
<div class=\"cont1\" style=\"padding:5px;\">
	
	<form action='pre_opl.php' method='POST'>
	<table border=0>\n
	<tr>
		<td>E-mail</td><td><input type='text' name='par0' value='".$tt6."'></td>
	</tr>
	<tr><td colspan=2 height=10px><div class='line2'></div></td></tr>
	<tr>
		<td>ФИО</td><td><input type='text' name='par1' value='".$_SESSION['par1']."'></td>
	</tr><tr><td colspan=2 height=10px><div class='line2'></div></td></tr><tr>
		<td>Регион</td><td>";
		
		include "region.php";
		echo "
		</td>
	</tr>
	<tr><td colspan=2 height=10px><div class='line2'></div></td></tr>
	<tr>
		<td>Город/Село</td><td>
		<input type='text' name='par3' value='".$_SESSION['par3']."'></td>
	</tr>
	<tr><td colspan=2 height=10px><div class='line2'></div></td></tr>
	<tr>
		<td>Адрес</td><td><input type='text' name='par4' value='".$_SESSION['par4']."'></td>
	</tr>
	<tr><td colspan=2 height=10px><div class='line2'></div></td></tr>
	<tr>
		<td>Телефон с кодом</td><td><input type='text'  name='par5' value='".$_SESSION['par5']."'></td>
	</tr><tr><td colspan=2 height=10px><div class='line2'></div></td></tr>
	<tr>
		<td>Комментарии и пожелания к заказу<br>(если есть)</td><td><textarea maxlength=350 name='par6' style='width:153px;height:80px;'>".$_SESSION['par6']."</textarea></td>
	</tr>
	
	<tr><td colspan=2 height=10px><div class='line2'></div></td></tr>
	
	<tr>
		<td>Код с картинки</td><td>
		<img src='genimg.php' border=1 width=100px height=34px onmousedown=\"this.src='genimg.php?random='+Math.random(10000,99999);\" style='cursor:pointer;' title='Нажмите если код не понятен!' alt=\"У вас оключены картинки, это плохо!\">
	    <br> <input type='text' name='par7' value=''></td>
	</tr>
	<tr><td colspan=2 height=10px><div class='line2'></div></td></tr>
	</table><br>
	<input type='submit' class='subm2' style='margin-left:75px;' value='Оформить заявку'/>
	</form>
	
	
	</div>
<div class=\"down1\"></div>
</div>";


}

?>