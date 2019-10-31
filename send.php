<?
include "cook_life.php";
include "conf.php";

if ($_SESSION['seso']==""){$_SESSION['seso']=time().'_'.rand(1000000,9999999);}
$seso=$_SESSION['seso'];

include "genid3.php";


$sql="SELECT id,code,fotos,zent,zen,zenz,name,str,kol FROM kor WHERE seso LIKE '$seso'";
$result = @mysql_query("$sql",$db);
$k=@mysql_num_rows($result);

if ($k>0){
$per="<div style='width:780px;margin:9px;'>
<div style='height:5px;background: url(".$hostname."/res/content/header.gif) no-repeat;'></div>
<div style='background: url(".$hostname."/res/content/zag.gif);'>
.<strong> <img src='".$hostname."/res/top1/accept.png' width=15px/> Заказ №".$id22."</strong>
</div>
<div style='background: url(".$hostname."/res/content/cont.gif);text-align:center;'>

<table cellspacing=0 border=1 align='center' width=780px style='border-color:#d4e7f1;padding:0px;border-width:1px;spacing:0;border-collapse:collapse;'>\n";
$akol=0;
$zeno=0;
$z1=0;
$z2=0;
$z3=0;
$sme="<table border=1 cellspacing=0 cellpadding=0 width=780px>
<tr><td>Код</td><td>Наименование</td><td>Кол-во</td><td>Цена</td><td>Всего</td></tr>\n";
//$check="<table border=1 cellspacing=0 cellpadding=0>\n";
$per.="<tr class='tdb' style='font-size:0.8em;font-weight:bold;'><td>Фото</td><td>Наименование товара</td>
<td width=80px>Код</td><td>Количество</td><td width=110px>Цена (руб)</td>
<td width=110px>Итого (руб)</td></tr>";

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

	$z1+=$zen*$kol;
	$z2+=$zenz*$kol;
	$z3=$zen;
	
	$z3=round($z3,2);
	if (strlen(end(explode(".",$z3)))==1){$z3.="0";}
	if (round($z3)==$z3){$z3.=".00";}

	
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

	$z15=($z3*$kol);
	$z15=round($z15,2);
	if (strlen(end(explode(".",$z15)))==1){$z15.="0";}
	if (round($z15)==$z15){$z15.=".00";}


$sme.="<tr align='center'>
<td>$code1</td>
<td>$name</td>
<td>$kol</td>
<td>$z3</td>
<td>".$z15."</td>
</tr>\n";


	
	$fts=array();
	
	if ($fotos<>''){
	$fts=explode("*",$fotos);
	$img=$fts[0];
	
	
	}else{$img="catalog/nofoto.jpg";}
	
	
	$per.= "<tr align='center'>
	<td width=60px class='tdb'>\n";
	
$per.= "<img src='".$hostname."/".$img."' width=60px height=60px/>\n";
	
	$per.= "</td><td class='tdb'>\n";
	
	$per.= "<a href='".$hostname."/cart.php?name=".$str."'>".$name."</a>\n";
	
	$per.= "</td><td class='tdb'>\n";
	
	
	$per.= $code1."\n";
	
	
	$per.= "</td><td class='tdb' width=150px>\n";
	
	$vkor=$kol;	
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

$vkor="";//"<div class='vkor'><input type='text' style='width:33px;' value='1' id='inp_".$id1."'/><div class='kor2' onclick='makeRequest22('add_kor.php?id=".$id1."&kol='+document.getElementById('inp_".$id1."').value,'0');\"></div></div><br><br>";

echo "<a href='cart.php?name=$str'><div style='height:60px;'><h3>".$name."</h3></div><img src='".$img."' width=160px height=160px/></a><br><span class='zen'>$zent</span>руб.".$vkor;

echo "</div>
<div class='down2'></div>
</div>";
*/

}



$dos=$_SESSION['dos'];
$dost=$_SESSION['dost'];
$dosz=$_SESSION['dosz'];
$zena=$_SESSION['zena'];


	$zen9=$zeno;
	$zeno+=($dosz*1);
	$zenit=$zeno;
	$z4=$z1;
	$z5=$z4+($dosz*1);
	$zeno=round($zeno,2);
	if (strlen(end(explode(".",$zeno)))==1){$zeno.="0";}
	if (round($zeno)==$zeno){$zeno.=".00";}

	$z5=round($z5,2);
	if (strlen(end(explode(".",$z5)))==1){$z5.="0";}
	if (round($z5)==$z5){$z5.=".00";}



$sme.="<tr align='center' height=35px>
<td>Доставка</td>
<td>$dost</td>
<td></td>
<td></td>
<td>$dosz</td>

</tr>\n";


$sme.="<tr align='center'>
<td>Всего</td>
<td></td>
<td>$akol</td>
<td></td>
<td><strong>$z5</strong></td>
</tr>
</table><br>";

$ty7=round(round($zenit-$z5,2)-round((($zenit-$z5)/100)*3,2),2);

$sme.="\n<hr>
Разница: ($zenit - $z5) = <b>".round($zenit-$z5,2)."</b> руб.<br>
Коммисия: ".round($zenit-$z5,2)." - 3% (".round((($zenit-$z5)/100)*3,2).") = <b>".$ty7."</b> руб.<br>
Выплата сайт: $ty7 / 2 = <b>".(round($ty7/2,2))."</b> руб.<br>
Выплата магазин: $z5 + ".(round($ty7/2,2))." = <b><u>".(round($z5+($ty7/2),2))."</u></b> руб.<br>

";

//$sme.="Разница:(Сайт-Таганрог)=".($zen9-$z1)."<br>\n";
//$sme.="Разница:(Сайт-Закупка)=".($zen9-$z2)."\n";
	

$per.="<tr><td colspan=6 class='tdb'><br></td></tr>\n";




$per.="<tr><td colspan=3 class='tdb' >Доставка ";

$per.= "«".$dost."»";
$per.= "</td><td class='tdb' align='center'></td><td></td><td class='tdb' align='center'><span style='color:#008700'>".$dosz."</span></td></tr>\n";


$per.="<tr><td colspan=3 class='tdb'>
</td><td class='tdb' align='center'><strong>$akol</strong></td><td></td><td class='tdb' align='center'><span style='color:#008700;'><strong>$zeno</strong></span></td></tr>";


$per.= "</table><br>\n";

$per.="</div>
<div style='height:5px;background: url(".$hostname."/res/content/footer.gif) no-repeat;'></div>
</div>";

$tat5="";
	$treg=time();
	$tbb=1;
if (($_SESSION['par0']!="")&&($_SESSION['log']=="")){
	$tbb=0;
	$sql="SELECT log FROM users WHERE log LIKE '".strtolower($_SESSION['par0'])."'";
        $result = @mysql_query($sql,$db);
        $k=@mysql_num_rows($result);
	if ($k<=0){
	$tt5="";
	$tt4="";
	for($i1=1;$i1<7;$i1++){
		$tt5.="'".$_SESSION['par'.$i1]."',";
		$tt4.="par".$i1.",";
	}
	$pas2=rand(100000,999999);
	$sql = "INSERT INTO users (log,pas,".$tt4."adm,act,treg) VALUES('".strtolower($_SESSION['par0'])."','$pas2',".$tt5."'0','0','$treg')";
	$result = @mysql_query($sql,$db);

	if ($result!=""){$tat5="<h3>Для Вас создан пользователь!</h3>
	Логин: <strong>".$_SESSION['par0']."</strong><br>
	Пароль: <strong>".$pas2."</strong><br>
	Подтвердите свою почту и активируйте пользователя просто авторизовавшись на сайте, по ссылке: <a href='".$hostname."/loginka.php'>".$hostname."/loginka.php</a><br>
	<strong>Если не подтвердить пользователя, то через месяц он автоматически удалится!</strong>";}
//	echo $tat5."|res=".$result."|sql=".$sql;
}
}

if (($_SESSION['log']!="")&&($tbb==1)){
$tt5="";
	for($i1=1;$i1<7;$i1++){
		if ($_SESSION['par'.$i1]!=""){$tt5.="par".$i1."='".$_SESSION['par'.$i1]."', ";}
	}
	
	$sql = "UPDATE users SET ".$tt5."par7='33' WHERE log LIKE '".$_SESSION['log']."'";
	if ($tt5!=""){$result = @mysql_query($sql,$db);}

	//echo $result."-SQL=".$sql."|";
}


$tema="Заявка N ".$id22." - ".$comp_name2;
$tema = '=?koi8-r?B?'.base64_encode(convert_cyr_string($tema, "w","k")).'?='; // делаем тему понятной почтовым серверам koi-8



$msg="<HTML>
<head>
<title>Заявка №".$id22." - ".$comp_name."</title>
</head>
<body>
На сайте www.$hostname0 был сделан заказ, скоро с Вами свяжутся наши специалисты!<br>
Данные доставки:<br>\n";

$j=0;
$msg2="E-mail заказчика: <b>".$_SESSION['par'.$j]."</b><br>\n";
$j=1;
$msg2.="ФИО заказчика: <b>".$_SESSION['par'.$j]."</b><br>\n";
$j=2;
$msg2.="Регион: <b>".$_SESSION['par'.$j]."</b><br>\n";
$j=3;
$msg2.="Город: <b>".$_SESSION['par'.$j]."</b><br>\n";
$j=4;
$msg2.="Адрес: <b>".$_SESSION['par'.$j]."</b><br>\n";
$j=5;
$msg2.="Телефон: <b>".$_SESSION['par'.$j]."</b><br>\n";
$j=6;
$msg2.="Комментарий: <b>".$_SESSION['par'.$j]."</b><br>\n";


$msg.=$msg2."\n<br>\n".$tat5."\n<br>".$per."\n

Дата заказа: <b>".date('d.m.Y [H:i]',time())."</b><br>С уважением $comp_name \n";

$from=$adminmail;
$mail=$_SESSION['par0'];
	$r7=mail($mail, $tema, $msg."</body></HTML>", "Content-type: text/html; charset=\"windows-1251\" \r\n Reply-To: $from \r\n", "-f$from");

$from=$_SESSION['par0'];
$mail=$adminmail;
	$r7=mail($mail, $tema, $msg."<h3>Заявка №".$id22."</h3>".$sme."\n</body></HTML>", "Content-type: text/html; charset=\"windows-1251\" \r\n Reply-To: $from \r\n", "-f$from");
	
	
	
$sql = "INSERT INTO zak (id,seso,kol,zent,zen,zenz,stat,log,treg) VALUES('$id22','$seso','$akol','$zenit','$z1','$z2','".($dos+1)."','".strtolower($_SESSION['par0'])."','$treg')";
$result = @mysql_query($sql,$db);

$mes=$per;//."<br>".$sme;
$mes=str_replace('"',"'",$mes);
	
$sql = "UPDATE zak SET msg=\"".$mes."\" WHERE id LIKE '$id22'";
$result1 = @mysql_query($sql,$db);

$mes=$msg2."<br>\n".$tat5;
$mes=str_replace('"',"'",$mes);


$sql = "UPDATE zak SET pers=\"".$mes."\" WHERE id LIKE '$id22'";
$result2 = @mysql_query($sql,$db);

$msg2=str_replace('"',"'",$msg2);
$sme=str_replace('"',"'",$sme);
$sql = "UPDATE zak SET chek=\"".$msg2."<br>".$sme."\" WHERE id LIKE '$id22'";
$result3 = @mysql_query($sql,$db);
//echo $result3."|SQL=".$sql."<br>".$sme;
//file_put_contents('1.txt',$sme);

$sql = "UPDATE tov,kor SET tov.stat=tov.stat+1 WHERE kor.code LIKE tov.id AND kor.seso LIKE '$seso'";
$result = @mysql_query($sql,$db);

	
if (($result1!="")&&($result2!="")){
			$sql = "DELETE FROM kor WHERE seso LIKE '$seso'";
			$result = @mysql_query("$sql",$db);
				
				for ($j=0;$j<=7;$j++){
						$_SESSION['par'.$j]="";
					}

				
}else{echo "<h3>Ошибка, обратитесь к администратору ".$adminmail." и обязательно укажите номер заказа - №".$id22."</h3>";}

}

$_SESSION['seso']="";
unset($_SESSION["seso"]);


HEADER('LOCATION: bin.php?msg=ok');
//echo $msg;
?>