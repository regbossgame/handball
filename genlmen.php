<?

//include "conf.php";
$mtime = microtime();        //Считываем текущее время

$mtime = explode(" ",$mtime);    //Разделяем секунды и миллисекунды

$tstart = $mtime[1] + $mtime[0];
//echo $tstart;


$per='<div class="step2" onclick="tree_toggle(arguments[0])">
<ul class="Container">';

$per.="\n";


$sql="SELECT id,name,str FROM cat WHERE rod LIKE '0' AND prod LIKE '0' ORDER BY str";
$result = @mysql_query("$sql",$db);
$k=@mysql_num_rows($result);

for($i=0;$i<$k;$i++){
	$id1=@mysql_result($result, $i,"id");
	$name1=@mysql_result($result, $i,"name");
	$str1=@mysql_result($result, $i,"str");

$sql2="SELECT name,str,id FROM cat WHERE rod LIKE '$id1' AND prod LIKE '0' ORDER BY str";
$result2 = @mysql_query("$sql2",$db);
$k2=@mysql_num_rows($result2);

$sql02="SELECT id FROM tov WHERE catid LIKE '$id1' ORDER BY str";
$result02 = @mysql_query("$sql02",$db);
$kol=@mysql_num_rows($result02);


if ($k2<=0){
$t3="";
if ($str1==$_GET['scat']){$t3=" style=\"color:DF5555;\"";}
$per.='  <li class="Node isRoot ExpandLast">
            <a href="catalog.php?scat='.$str1.'" title=\''.$name1.'\'>
			<div class="Expand"></div>
            <div class="Content"'.$t3.' id="ncat_'.$id1.'">'.obrez($name1,30).' <div class="menal">[ '.$kol.' ]</div></div>
			</a>
         </li>';


}else{

$scat=$_GET['scat'];
$t2='ExpandClosed';
$t3="";
$t4="";

if ($str1==$_GET['scat']){$t2='ExpandOpen';$t3=" style=\"color:DF5555;\"";}

for($i2=0;$i2<$k2;$i2++){
	$str2=@mysql_result($result2, $i2,"str");
	if ($str2==$_GET['scat']){$t2='ExpandOpen';$t4=" style=\"color:DF5555;\"";}
}

	$per.= '  <li class="Node IsRoot '.$t2.'" id="cat_'.$id1.'">
    <div class="Expand"></div>
    <a href="catalog.php?scat='.$str1.'" title=\''.$name1.'\'><div class="Content"'.$t3.' id="ncat_'.$id1.'">'.obrez($name1,33).'</div></a>';
//<div class="menal">[ '.$k2.' ]</div>

for($i2=0;$i2<$k2;$i2++){
	$name2=@mysql_result($result2, $i2,"name");
	$str2=@mysql_result($result2, $i2,"str");
	$id2=@mysql_result($result2, $i2,"id");

    
$sql3="SELECT name,str,id FROM cat WHERE rod LIKE '$id1' AND prod ORDER BY str";
$result3 = @mysql_query("$sql3",$db);
$k3=@mysql_num_rows($result3);

$sql02="SELECT id FROM tov WHERE catid LIKE '$id2' ORDER BY str";
$result02 = @mysql_query("$sql02",$db);
$kol=@mysql_num_rows($result02);

if ($str2==$_GET['scat']){$t4=" style=\"color:DF5555;\"";}else{$t4="";}
if ($k3<=0){	
	
	$per.='<ul class="Container">
      <li class="Node ExpandLeaf IsLast">
       <a href="catalog.php?scat='.$str2.'" title=\''.$name2.'\'>
	   <div class="Expand"></div>
        <div class="Content"'.$t4.' id="ncat_'.$id2.'">'.obrez($name2,27).' <div class="menal">[ '.$kol.' ]</div></div>
      </a>
	  </li>
    </ul>';
	}else{
	for($i3=0;$i3<$k3;$i3++){
	$name2=@mysql_result($result3, $i3,"name");
	$str2=@mysql_result($result3, $i3,"str");
	$id2=@mysql_result($result3, $i3,"id2");

	echo $name;
	
	}
	
	}
	
	$per.="\n";
}
  
  
  $per.='</li>';
}
  $per.="\n";
	
}


$per.='</ul>
</div>';


/*


$per= '<div class="step2" onclick="tree_toggle(arguments[0])">
        <ul class="Container">
          <li class="Node ExpandLeaf IsLast">
            <div class="Expand"></div>
            <div class="Content">Item 1.1.2</div>
          </li>
        </ul>

<ul class="Container">
  <li class="Node IsRoot ExpandClosed">
    <div class="Expand"></div>
    <div class="Content">Папка 1</div>
    <ul class="Container">
      <li class="Node ExpandClosed">
        <div class="Expand"></div>
        <div class="Content">Item 1.1</div>
        <ul class="Container">
          <li class="Node ExpandLeaf IsLast">
            <div class="Expand"></div>
            <div class="Content">Item 1.1.2</div>
          </li>
        </ul>
      </li>
      <li class="Node ExpandLeaf IsLast">
        <div class="Expand"></div>
        <div class="Content">Item 1.2</div>
      </li>
    </ul>
  </li>
  <li class="Node IsRoot ExpandClosed">
    <div class="Expand"></div>
    <div class="Content">Папка 2</div>
    <ul class="Container">
      <li class="Node ExpandLeaf IsLast">
        <div class="Expand"></div>
        <div class="Content">Item 2.1</div>
        <div class="Expand"></div>
        <div class="Content"><a href="#">а здесь ссылка</a></div>
      </li>
    </ul>
  </li>
  <li class="Node ExpandOpen IsRoot IsLast">
    <div class="Expand"></div>
    <div class="Content">Папка 3</div>
    <ul class="Container">
      <li class="Node ExpandLeaf IsLast">
        <div class="Expand"></div>
        <div class="Content">Item 3.1</div>
      </li>
    </ul>
  </li>
</ul>
</div>';
*/

$per='<div class="step2" onclick="tree_toggle(arguments[0])">
<ul class="Container">';
$sql02="SELECT * FROM tov ORDER BY str";
$result3 = @mysql_query("$sql02",$db);
$kol=@mysql_num_rows($result3);
for($i3=0;$i3<$kol;$i3++){
	$name2=@mysql_result($result3, $i3,"name");
	$str2=@mysql_result($result3, $i3,"str");
	$id2=@mysql_result($result3, $i3,"id");

$per.='<li class="Node isRoot ExpandLast">
            <a href="cart.php?name='.$str2.'" title=\''.$name2.'\'>
			<div class="Expand"></div>
            <div class="Content"'.$t3.' id="ncat_'.$id2.'">'.obrez($name2,30).'</div>
			</a>
         </li>';
}
$per.='</ul></div>';

file_put_contents("lmen.php",$per);

// Делаем все то же самое, чтобы получить текущее время

$mtime = microtime();

$mtime = explode(" ",$mtime);

$mtime = $mtime[1] + $mtime[0];

$totaltime = ($mtime - $tstart);//Вычисляем разницу

// Выводим не экран

//printf ("Страница сгенерирована за %f секунд !", $totaltime);

//echo $per;
//echo "|".trans('АКБ "EURO"')."|";


?>